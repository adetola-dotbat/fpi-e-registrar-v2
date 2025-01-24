<?php

namespace App\Http\Controllers\Admin\StaffTermination;

use App\Http\Controllers\Controller;
use App\Http\Requests\StaffTermination\TerminationByDeath\StoreRequest;
use App\Services\StaffService;
use App\Services\StaffTermination\TerminationByDeathService;
use Illuminate\Http\Request;

class TerminationByDeathController extends Controller
{
    public function __construct(protected StaffService $staffService, protected TerminationByDeathService $terminationByDeathService) {}

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
