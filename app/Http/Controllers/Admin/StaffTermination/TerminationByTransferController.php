<?php

namespace App\Http\Controllers\Admin\StaffTermination;

use App\Http\Controllers\Controller;
use App\Http\Requests\StaffTermination\TerminationByTransfer\StoreRequest;
use App\Services\StaffService;
use App\Services\StaffTermination\TerminationByTransferService;
use Illuminate\Http\Request;

class TerminationByTransferController extends Controller
{
    public function __construct(protected StaffService $staffService, protected TerminationByTransferService $terminationByTransferService) {}

    public function store(StoreRequest $request)
    {
        try {
            $this->terminationByTransferService->store($request->validated());

            return redirect()->back()->with("success", value: "Termination details saved successfully");
        } catch (\Exception $ex) {
            return redirect()->back()->with("error", "Not successful," . $ex->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            $this->terminationByTransferService->destroy($id);

            return redirect()->back()->with("success", value: "Termination details deleted successfully");
        } catch (\Exception $ex) {
            return redirect()->back()->with("error", "Not successful," . $ex->getMessage());
        }
    }
}
