<?php

namespace App\Services;

use App\Models\StaffBankDetail;
use Illuminate\Database\Eloquent\ModelNotFoundException;


class StaffBankDetailService extends UserService
{
    public function __construct(protected StaffBankDetail $staffBankDetail) {}


    public function getStaffBankDetails($id)
    {
        return $this->staffBankDetail->where('user_id', $id)->get();
    }

    public function getStaffBankDetail($id)
    {
        if (!$this->staffBankDetail->whereId($id)->exists()) {
            throw new ModelNotFoundException("Staff bank details record not found.");
        }

        return $this->staffBankDetail->find($id);
    }
    public function store($data)
    {
        return $this->staffBankDetail->create($data);
    }

    public function destroy($id)
    {
        if (!$this->staffBankDetail->whereId($id)->exists()) {
            throw new ModelNotFoundException("Staff bank details record  not found.");
        }

        $this->staffBankDetail->whereId($id)->delete();
    }
}
