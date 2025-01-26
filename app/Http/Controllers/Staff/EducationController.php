<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use App\Services\StaffService;
use Illuminate\Http\Request;
use App\Services\StaffInstitutionAttendedService;

class EducationController extends Controller
{
    public function __construct(protected StaffService $staffService, protected StaffInstitutionAttendedService $staffInstitutionAttendedService) {}
    public function view($id)
    {
        $data = [
            'pageTitle' => 'Institution Attended',
            'user' => $this->staffService->getStaff($id),
            'institutions' => $this->staffInstitutionAttendedService->getStaffInstitutionAttends($id),
        ];
        return view('pages.staffs.institutionAttended.index', $data);
    }
}
