<?php

namespace App\Http\Controllers\Admin;

use App\Enums\ApproveStatusEnum;
use App\Helper\FileHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\StaffLeave\StoreRequest;
use App\Models\StaffLeave;
use App\Notifications\LeaveApprovedNotification;
use App\Notifications\LeaveDeclinedNotification;
use App\Services\LeaveTypeService;
use App\Services\StaffLeaveService;
use App\Services\StaffService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StaffLeaveController extends Controller
{
    public function __construct(protected StaffService $staffService, protected StaffLeaveService $staffLeaveService, protected LeaveTypeService $leaveTypeService) {}

    public function index()
    {
        $data = [
            'pageTitle' => 'Leaves',
            'leaves' => $this->staffLeaveService->leaves(),
        ];
        return view('pages.staffs.leave.leaves', $data);
    }

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


    public function approve($id)
    {
        DB::beginTransaction();

        try {
            $leave = StaffLeave::findOrFail($id);
            $leave->status = ApproveStatusEnum::APPROVED->value;
            $leave->save();
            $user = $leave->user;

            if ($user) {
                $user->notify(new LeaveApprovedNotification($leave));
            } else {
                throw new Exception('User not found for this leave.');
            }

            DB::commit();

            return redirect()->back()->with('success', 'Leave status updated to approved, and the user has been notified.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Failed to approve leave: ' . $e->getMessage());
        }
    }

    public function decline($id)
    {
        DB::beginTransaction();

        try {
            $leave = StaffLeave::findOrFail($id);
            $leave->status = ApproveStatusEnum::DECLINED->value;
            $leave->save();
            $user = $leave->user;

            if ($user) {
                $user->notify(new LeaveDeclinedNotification($leave));
            } else {
                throw new Exception('User not found for this leave.');
            }
            DB::commit();

            return redirect()->back()->with('success', 'Leave status updated to declined, and the user has been notified.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Failed to decline leave: ' . $e->getMessage());
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
