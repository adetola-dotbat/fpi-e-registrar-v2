<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StaffActingAppointment\StoreRequest;
use App\Http\Requests\StaffActingAppointment\UpdateRequest;
use App\Services\StaffActingAppointmentService;
use App\Services\StaffService;
use Illuminate\Http\Request;

class StaffActingAppointmentController extends Controller
{
    public function __construct(protected StaffService $staffService, protected StaffActingAppointmentService $staffActingAppointmentService) {}

    public function index()
    {
        $data = [
            'pageTitle' => 'Acting Appointments',
            'actingAppointments' => $this->staffActingAppointmentService->actingAppointments(),
        ];
        return view('pages.staffs.actingAppointment.appointments', $data);
    }
    public function view($id)
    {
        $data = [
            'pageTitle' => 'Staff Acting Appointment',
            'user' => $this->staffService->getStaff($id),
            'actingAppointments' => $this->staffActingAppointmentService->allStaffActingAppointments($id),
        ];
        return view('pages.staffs.actingAppointment.index', $data);
    }

    public function store(StoreRequest $request)
    {

        try {
            $this->staffActingAppointmentService->store($request->validated());

            return redirect()->back()->with("success", value: "Acting appointment details saved successfully");
        } catch (\Exception $ex) {
            return redirect()->back()->with("error", "Not successful," . $ex->getMessage());
        }
    }

    public function update(UpdateRequest $request)
    {
        try {
            $this->staffActingAppointmentService->update($request->validated());

            return redirect()->back()->with("success", value: "Acting appointment details updated successfully");
        } catch (\Exception $ex) {
            return redirect()->back()->with("error", "Not successful," . $ex->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            $this->staffActingAppointmentService->destroy($id);

            return redirect()->back()->with("success", value: "Transfer deleted successfully");
        } catch (\Exception $ex) {
            return redirect()->back()->with("error", "Not successful," . $ex->getMessage());
        }
    }
}
