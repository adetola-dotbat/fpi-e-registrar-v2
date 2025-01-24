<?php

namespace App\Services;

use App\Models\StaffProfessionalDetail;
use App\Models\StaffPublicService;
use Illuminate\Database\Eloquent\ModelNotFoundException;


class StaffProfessionalDetailService extends UserService
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
        return $this->staffInstitutionAttended->create($data);
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
