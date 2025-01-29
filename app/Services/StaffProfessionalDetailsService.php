<?php

namespace App\Services;

use App\Enums\ApproveStatusEnum;
use App\Models\StaffProfessionalDetails;
use App\Models\StaffPublicService;
use App\Models\User;
use App\Notifications\DocumentApprovedNotification;
use App\Notifications\DocumentDeclinedNotification;
use App\Notifications\SendDocumentApprovalNotification;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class StaffProfessionalDetailsService extends UserService
{
    public function __construct(protected StaffProfessionalDetails $staffProfessionalDetails) {}
    public function getStaffProfessionalDetails($id)
    {
        return $this->staffProfessionalDetails->where('user_id', $id)->get();
    }
    public function getStaffProfessionalDetail($id)
    {
        if (!$this->staffProfessionalDetails->whereId($id)->exists()) {
            throw new ModelNotFoundException("Professional details not found.");
        }
        return $this->staffProfessionalDetails->find($id);
    }
    public function store($data)
    {
        return DB::transaction(function () use ($data) {
            try {
                $user = auth()->user();

                if ($user->hasAnyRole(['admin', 'subadmin'])) {
                    $data['status'] = ApproveStatusEnum::APPROVED->value;
                } else {

                    $admins = User::role(['admin', 'subadmin'])->get();
                    foreach ($admins as $admin) {
                        $admin->notify(new SendDocumentApprovalNotification($user, 'Professional details'));
                    }
                }

                return $this->staffProfessionalDetails->create($data);
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
                if (!$this->staffProfessionalDetails->whereId($id)->exists()) {
                    throw new ModelNotFoundException("Professional details  not found.");
                }
                $profession = $this->staffProfessionalDetails->whereId($id)->first();

                $profession->status = ApproveStatusEnum::APPROVED->value;
                $profession->save();

                $user = $profession->user; // Assuming the relationship exists
                $user->notify(new DocumentApprovedNotification('Professional details'));
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
                if (!$this->staffProfessionalDetails->whereId($id)->exists()) {
                    throw new ModelNotFoundException("Professional details  not found.");
                }
                $profession = $this->staffProfessionalDetails->whereId($id)->first();

                $profession->status = ApproveStatusEnum::DECLINED->value;
                $profession->save();

                $user = $profession->user; // Assuming the relationship exists
                $user->notify(new DocumentDeclinedNotification('Professional details'));
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

        return $this->staffProfessionalDetails->whereId($id)->update($data);
    }
    public function destroy($id)
    {
        if (!$this->staffProfessionalDetails->whereId($id)->exists()) {
            throw new ModelNotFoundException("Professional details not found.");
        }
        $this->staffProfessionalDetails->whereId($id)->delete();
    }
}
