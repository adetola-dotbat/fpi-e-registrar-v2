<?php

namespace App\Services;

use App\Enums\ApproveStatusEnum;
use App\Models\StaffInstitutionAttended;
use App\Models\User;
use App\Notifications\DocumentApprovedNotification;
use App\Notifications\DocumentDeclinedNotification;
use App\Notifications\SendDocumentApprovalNotification;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class StaffInstitutionAttendedService extends UserService
{
    public function __construct(protected StaffInstitutionAttended $staffInstitutionAttended) {}
    public function getStaffInstitutionAttends($id)
    {
        return $this->staffInstitutionAttended->where('user_id', $id)->get();
    }
    public function getStaffInstitutionAttended($id)
    {
        if (!$this->staffInstitutionAttended->whereId($id)->exists()) {
            throw new ModelNotFoundException("Institution Attended record not found.");
        }
        return $this->staffInstitutionAttended->find($id);
    }

    public function store($data)
    {
        return DB::transaction(function () use ($data) {
            try {
                $user = auth()->user();

                if ($user->hasAnyRole(['admin', 'subadmin'])) {
                    $data['approved_status'] = ApproveStatusEnum::APPROVED->value;
                } else {

                    $admins = User::role(['admin', 'subadmin'])->get();
                    foreach ($admins as $admin) {
                        $admin->notify(new SendDocumentApprovalNotification($user, 'institution attended'));
                    }
                }

                return $this->staffInstitutionAttended->create($data);
            } catch (\Exception $ex) {
                DB::rollBack();
                Log::error($ex->getMessage());
            }
        });
    }

    public function approve($id)
    {
        return DB::transaction(function () use ($id) {
            try {
                if (!$this->staffInstitutionAttended->whereId($id)->exists()) {
                    throw new ModelNotFoundException("Institution Attended record  not found.");
                }
                $institution = $this->staffInstitutionAttended->whereId($id)->first();

                $institution->approved_status = ApproveStatusEnum::APPROVED->value;
                $institution->save();

                $user = $institution->user; // Assuming the relationship exists
                $user->notify(new DocumentApprovedNotification('Institution attended'));
            } catch (\Exception $e) {
                DB::rollBack();
                Log::error($e->getMessage());
            }
        });
    }

    public function decline($id)
    {
        return DB::transaction(function () use ($id) {
            try {
                if (!$this->staffInstitutionAttended->whereId($id)->exists()) {
                    throw new ModelNotFoundException("Institution Attended record  not found.");
                }

                $institution = $this->staffInstitutionAttended->whereId($id)->first();

                $institution->approved_status = ApproveStatusEnum::DECLINED->value;
                $institution->save();

                $user = $institution->user;
                $user->notify(new DocumentDeclinedNotification('Institution attended'));
            } catch (\Exception $e) {
                DB::rollBack();
                Log::error($e->getMessage());
            }
        });
    }
    public function update($data)
    {
        $id = $data['id'];
        unset($data['id']);

        return $this->staffInstitutionAttended->whereId($id)->update($data);
    }
    public function destroy($id)
    {
        if (!$this->staffInstitutionAttended->whereId($id)->exists()) {
            throw new ModelNotFoundException("Institution Attended record  not found.");
        }
        $this->staffInstitutionAttended->whereId($id)->delete();
    }
}
