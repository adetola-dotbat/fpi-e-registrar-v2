<?php

namespace App\Http\Controllers\Staff;

use App\Helper\FileHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\StaffLeave\StoreRequest;
use App\Services\LeaveTypeService;
use App\Services\StaffLeaveService;
use App\Services\StaffService;
use Illuminate\Http\Request;


class AppraisalController extends Controller
{
    public function __construct(protected StaffService $staffService, protected StaffLeaveService $staffLeaveService, protected LeaveTypeService $leaveTypeService) {}
    public function view()
    {
        $data = [
            'pageTitle' => 'Appraisal',
            // 'user' => $this->staffService->getStaff($id),
        ];
        return view('pages.staffs.appraisal.index', $data);
    }
}
