<?php

namespace App\Http\Controllers\Admin\StaffTermination;

use App\Http\Controllers\Controller;
use App\Http\Requests\StaffTermination\TerminationByDeath\StoreRequest;
use App\Services\StaffService;
use App\Services\StaffTermination\TerminationByDeathService;
use App\Services\StaffTermination\TerminationByResignationService;
use App\Services\StaffTermination\TerminationByTransferService;
use Illuminate\Http\Request;

class StaffTerminationController extends Controller
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
    public function view($id)
    {
        $data = [
            'pageTitle' => 'Staff Termination',
            'user' => $this->staffService->getStaff(id: $id),
            'terminationByDeath' => $this->terminationByDeathService->getStaffTerminationByDeaths($id),
            'terminationByResignation' => $this->terminationByResignationService->getStaffTerminationByResignations($id),
            'terminationByTransfer' => $this->terminationByTransferService->getStaffTerminationByTransfers($id),
        ];
        return view('pages.staffs.termination.index', $data);
    }

    public function store(StoreRequest $request)
    {
        try {
            $this->terminationByDeathService->store($request->validated());

            return redirect()->back()->with("success", value: "Termination details saved successfully");
        } catch (\Exception $ex) {
            return redirect()->back()->with("error", "Not successful," . $ex->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            $this->terminationByDeathService->destroy($id);

            return redirect()->back()->with("success", value: "Termination details deleted successfully");
        } catch (\Exception $ex) {
            return redirect()->back()->with("error", "Not successful," . $ex->getMessage());
        }
    }
}
