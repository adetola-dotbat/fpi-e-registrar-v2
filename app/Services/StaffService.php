<?php

namespace App\Services;

use Illuminate\Database\Eloquent\ModelNotFoundException;

class StaffService extends UserService
{

    public function all($staffType = null)
    {
        $query = $this->user->query();

        if ($staffType) {
            $query->whereHas('staffDetail', function ($q) use ($staffType) {
                $q->where('staff_type', $staffType);
            });
        }

        return $query->where(function ($query) {
            $query->where('employee_file_no', '!=', null)
                ->where('employee_file_no', '!=', 'NULL');
        })->with([
            'staffDetail',
            'previousEmployments',
            'nextOfKins',
            'emergencies',
            'staffBankDetails',
            'staffInstitutionsAttended' => function ($query) {
                $query->where('approved_status', 'approved');
            },
            'staffProfessionalDetails' => function ($query) {
                $query->where('status', 'approved');
            }
        ])->get();
    }

    public function getStaff($id)
    {
        return $this->getUser($id);
    }

    public function destroy($id)
    {
        if (!$this->user->whereId($id)->exists()) {
            throw new ModelNotFoundException("Staff record  not found.");
        }
        $this->user->whereId($id)->delete();
    }
}
