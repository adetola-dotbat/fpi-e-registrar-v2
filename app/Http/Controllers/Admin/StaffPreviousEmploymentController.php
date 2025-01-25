<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StaffPreviousEmployment\StoreRequest;
use App\Http\Requests\StaffPreviousEmployment\UpdateRequest;
use App\Services\LeaveTypeService;
use App\Services\StaffLeaveService;
use App\Services\StaffPreviousEmploymentService;
use App\Services\StaffService;
use Illuminate\Http\Request;

class StaffPreviousEmploymentController extends Controller
{
    public function __construct(protected StaffService $staffService, protected StaffPreviousEmploymentService $staffPreviousEmploymentService) {}

    public function view($id)
    {
        $data = [
            'pageTitle' => 'Previous Employment',
            'user' => $this->staffService->getStaff($id),
            'previousEmployments' => $this->staffPreviousEmploymentService->getStaffPreviousEmployments($id),
        ];
        return view('pages.staffs.previousEmployment.index', $data);
    }

    public function store(StoreRequest $request)
    {
        try {

            $this->staffPreviousEmploymentService->store($request->validated());

            return redirect()->back()->with("success", "Previous employment saved successfully");
        } catch (\Exception $ex) {
            return redirect()->back()->with("error", "Not successful, " . $ex->getMessage());
        }
    }
    public function update(UpdateRequest $request)
    {
        try {
            $this->staffPreviousEmploymentService->update($request->validated());

            return redirect()->back()->with("success", value: "Previous employment updated successfully");
        } catch (\Exception $ex) {
            return redirect()->back()->with("error", "Not successful," . $ex->getMessage());
        }
    }
    public function destroy($id)
    {
        try {
            $this->staffPreviousEmploymentService->destroy($id);

            return redirect()->back()->with("success", value: "Previous employment deleted successfully");
        } catch (\Exception $ex) {
            return redirect()->back()->with("error", "Not successful," . $ex->getMessage());
        }
    }
}
