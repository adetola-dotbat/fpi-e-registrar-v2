<?php

namespace App\Http\Controllers\Staff;

use App\Helper\FileHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\StaffLeave\StoreRequest;
use App\Services\LeaveTypeService;
use App\Services\StaffLeaveService;
use App\Services\StaffService;
use Illuminate\Http\Request;


class LeaveController extends Controller
{
    public function __construct(protected StaffService $staffService, protected StaffLeaveService $staffLeaveService, protected LeaveTypeService $leaveTypeService) {}
    public function view($id)
    {
        $data = [
            'pageTitle' => 'Leave',
            'user' => $this->staffService->getStaff($id),
            'leaveTypes' => $this->leaveTypeService->all(),
            'leaves' => $this->staffLeaveService->getStaffLeaves($id),
        ];
        return view('pages.staffs.leave.index', $data);
    }
}
