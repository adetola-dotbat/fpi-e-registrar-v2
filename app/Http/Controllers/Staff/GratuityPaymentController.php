<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use App\Services\StaffService;
use Illuminate\Http\Request;
use App\Services\StaffGratitudePaymentService;

class GratuityPaymentController extends Controller
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
}
