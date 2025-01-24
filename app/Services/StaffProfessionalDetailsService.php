<?php

namespace App\Services;

use App\Models\StaffProfessionalDetails;
use App\Models\StaffPublicService;
use Illuminate\Database\Eloquent\ModelNotFoundException;


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
        return $this->staffProfessionalDetails->create($data);
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
