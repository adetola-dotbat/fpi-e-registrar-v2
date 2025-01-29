<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use App\Services\StaffService;
use Illuminate\Http\Request;
use App\Services\StaffProfessionalDetailsService;

class ProfessionalDetailsController extends Controller
{
    public function __construct(protected StaffService $staffService, protected StaffProfessionalDetailsService $staffProfessionalDetailsService) {}

    public function view($id)
    {
        $data = [
            'pageTitle' => 'Professional Body',
            'user' => $this->staffService->getStaff($id),
            'professionals' => $this->staffProfessionalDetailsService->getStaffProfessionalDetails($id),
        ];
        return view('pages.staffs.professionalDetails.index', $data);
    }
}
