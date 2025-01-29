<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use App\Services\StaffService;
use App\Services\StaffTermination\TerminationByDeathService;
use App\Services\StaffTermination\TerminationByResignationService;
use App\Services\StaffTermination\TerminationByTransferService;
use Illuminate\Http\Request;

class TerminationController extends Controller
{
    public function __construct(
        protected StaffService $staffService,
        protected TerminationByDeathService $terminationByDeathService,
        protected TerminationByResignationService $terminationByResignationService,
        protected TerminationByTransferService $terminationByTransferService
    ) {}
    public function index()
    {
        $data = [
            'pageTitle' => 'Terminations',
            'terminationByDeaths' => $this->terminationByDeathService->terminationByDeaths(),
            'terminationByResignations' => $this->terminationByResignationService->terminationByResignations(),
            'terminationByTransfers' => $this->terminationByTransferService->terminationByTransfers(),
        ];
        return view('pages.staffs.termination.terminations', $data);
    }
}
