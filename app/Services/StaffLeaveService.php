<?php

namespace App\Services;

use App\Enums\ApproveStatusEnum;
use App\Models\StaffLeave;
use App\Models\User;
use App\Notifications\SendLeaveApprovalNotification;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class StaffLeaveService extends UserService
{
    public function __construct(protected StaffLeave $staffLeave) {}
    public function leaves()
    {
        return $this->staffLeave->latest()->get();
    }
    public function getStaffLeaves($id)
    {
        return $this->staffLeave->where('user_id', $id)->get();
    }
    public function getStaffLeave($id)
    {
        if (!$this->staffLeave->whereId($id)->exists()) {
            throw new ModelNotFoundException("Leave not found.");
        }
        return $this->staffLeave->find($id);
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
                        $admin->notify(new SendLeaveApprovalNotification($user, 'Leave'));
                    }
                }

                return $this->staffLeave->create($data);
            } catch (\Exception $ex) {
                DB::rollBack();
                Log::error($ex->getMessage());
            }
        });
    }

    public function update($data)
    {
        $id = $data['id'];
        unset($data['id']);

        return $this->staffLeave->whereId($id)->update($data);
    }
    public function destroy($id)
    {
        if (!$this->staffLeave->whereId($id)->exists()) {
            throw new ModelNotFoundException("Leave not found.");
        }
        $this->staffLeave->whereId($id)->delete();
    }
}
