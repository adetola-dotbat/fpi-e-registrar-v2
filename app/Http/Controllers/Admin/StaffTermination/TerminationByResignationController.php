<?php

namespace App\Http\Controllers\Admin\StaffTermination;

use App\Http\Controllers\Controller;
use App\Http\Requests\StaffTermination\TerminationByResignation\StoreRequest;
use App\Services\StaffService;
use App\Services\StaffTermination\TerminationByResignationService;
use Illuminate\Http\Request;

class TerminationByResignationController extends Controller
{
    public function __construct(protected StaffService $staffService, protected TerminationByResignationService $terminationByResignationService) {}


    public function store(StoreRequest $request)
    {
        try {
            $this->terminationByResignationService->store($request->validated());

            return redirect()->back()->with("success", value: "Termination details saved successfully");
        } catch (\Exception $ex) {
            return redirect()->back()->with("error", "Not successful," . $ex->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            $this->terminationByResignationService->destroy($id);

            return redirect()->back()->with("success", value: "Termination details deleted successfully");
        } catch (\Exception $ex) {
            return redirect()->back()->with("error", "Not successful," . $ex->getMessage());
        }
    }
}
