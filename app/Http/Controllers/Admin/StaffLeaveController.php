<?php

namespace App\Http\Controllers\Admin;

use App\Helper\FileHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\StaffLeave\StoreRequest;
use App\Services\LeaveTypeService;
use App\Services\StaffLeaveService;
use App\Services\StaffService;
use Illuminate\Http\Request;

class StaffLeaveController extends Controller
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

    public function store(StoreRequest $request)
    {
        try {

            $this->staffLeaveService->store($request->validated());

            return redirect()->back()->with("success", "Leave saved successfully");
        } catch (\Exception $ex) {
            return redirect()->back()->with("error", "Not successful, " . $ex->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            $this->staffLeaveService->destroy($id);

            return redirect()->back()->with("success", value: "Leave deleted successfully");
        } catch (\Exception $ex) {
            return redirect()->back()->with("error", "Not successful," . $ex->getMessage());
        }
    }
}
