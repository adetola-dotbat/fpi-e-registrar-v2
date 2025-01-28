<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use App\Services\StaffService;
use Illuminate\Http\Request;
use App\Services\StaffActingAppointmentService;

class ActingAppointmentController extends Controller
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
}
