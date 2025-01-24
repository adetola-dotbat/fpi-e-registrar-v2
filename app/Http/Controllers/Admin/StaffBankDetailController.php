<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StaffBankDetails\StoreRequest;
use App\Services\StaffBankDetailService;
use App\Services\StaffService;
use Illuminate\Http\Request;

class StaffBankDetailController extends Controller
{
    public function __construct(protected StaffService $staffService, protected StaffBankDetailService $staffBankDetailService) {}

    public function view($id)
    {
        $data = [
            'pageTitle' => 'Staff Service',
            'user' => $this->staffService->getStaff($id),
            'bankDetails' => $this->staffBankDetailService->getStaffBankDetails($id),
        ];
        return view('pages.staffs.bankDetails.index', $data);
    }

    public function store(StoreRequest $request)
    {
        try {
            $this->staffBankDetailService->store($request->validated());

            return redirect()->back()->with("success", value: "Bank details saved successfully");
        } catch (\Exception $ex) {
            return redirect()->back()->with("error", "Not successful," . $ex->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            $this->staffBankDetailService->destroy($id);

            return redirect()->back()->with("success", value: "Bank details deleted successfully");
        } catch (\Exception $ex) {
            return redirect()->back()->with("error", "Not successful," . $ex->getMessage());
        }
    }
}
