<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use App\Services\StaffService;
use Illuminate\Http\Request;
use App\Services\StaffPublicServiceService;


class ServiceController extends Controller
{
    public function __construct(protected StaffService $staffService, protected StaffPublicServiceService $staffPublicServiceService) {}
    public function view($id)
    {
        $data = [
            'pageTitle' => 'Staff Service',
            'user' => $this->staffService->getStaff($id),
            'publicServices' => $this->staffPublicServiceService->getStaffPublicServices($id),
        ];
        return view('pages.staffs.publicService.index', $data);
    }
}
