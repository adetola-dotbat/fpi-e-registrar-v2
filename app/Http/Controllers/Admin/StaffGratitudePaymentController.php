<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StaffGratitudePayment\StoreRequest;
use App\Http\Requests\StaffGratitudePayment\UpdateRequest;
use App\Services\StaffGratitudePaymentService;
use App\Services\StaffService;
use Illuminate\Http\Request;

class StaffGratitudePaymentController extends Controller
{
    public function __construct(protected StaffService $staffService, protected StaffGratitudePaymentService $staffGratitudePaymentService) {}

    public function index()
    {
        $data = [
            'pageTitle' => 'Gratuity Payment',
            'gratitudePayments' => $this->staffGratitudePaymentService->gratitudePayments(),
        ];
        return view('pages.staffs.gratitudePayment.gratuities', $data);
    }
    public function view($id)
    {
        $data = [
            'pageTitle' => 'Staff Gratuity Payment',
            'user' => $this->staffService->getStaff($id),
            'gratitudePayments' => $this->staffGratitudePaymentService->allStaffGratitudePayments($id),
        ];
        return view('pages.staffs.gratitudePayment.index', $data);
    }

    public function store(StoreRequest $request)
    {
        try {
            $this->staffGratitudePaymentService->store($request->validated());

            return redirect()->back()->with("success", value: "Promotion details saved successfully");
        } catch (\Exception $ex) {
            return redirect()->back()->with("error", "Not successful," . $ex->getMessage());
        }
    }

    public function update(UpdateRequest $request)
    {
        try {
            $this->staffGratitudePaymentService->update($request->validated());

            return redirect()->back()->with("success", value: "Promotion details updated successfully");
        } catch (\Exception $ex) {
            return redirect()->back()->with("error", "Not successful," . $ex->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            $this->staffGratitudePaymentService->destroy($id);

            return redirect()->back()->with("success", value: "Gratuity deleted successfully");
        } catch (\Exception $ex) {
            return redirect()->back()->with("error", "Not successful," . $ex->getMessage());
        }
    }
}
