<?php

namespace App\Services;

use App\Models\PreviousEmployment;
use Illuminate\Database\Eloquent\ModelNotFoundException;


class StaffPreviousEmploymentService extends UserService
{
    public function __construct(protected PreviousEmployment $previousEmployment) {}


    public function getStaffPreviousEmployments($id)
    {
        return $this->previousEmployment->where('user_id', $id)->get();
    }

    public function getStaffPreviousEmployment($id)
    {
        if (!$this->previousEmployment->whereId($id)->exists()) {
            throw new ModelNotFoundException("Previous employment record not found.");
        }

        return $this->previousEmployment->find($id);
    }
    public function store($data)
    {
        return $this->previousEmployment->create($data);
    }

    public function update($data)
    {
        $id = $data['id'];
        unset($data['id']);

        return $this->previousEmployment->whereId($id)->update($data);
    }

    public function destroy($id)
    {
        if (!$this->previousEmployment->whereId($id)->exists()) {
            throw new ModelNotFoundException("Previous employment record  not found.");
        }

        $this->previousEmployment->whereId($id)->delete();
    }
}
