<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StaffCommendation\StoreRequest;
use App\Services\StaffCommendationService;
use App\Services\StaffService;

class StaffCommendationController extends Controller
{
    public function __construct(protected StaffService $staffService, protected StaffCommendationService $staffCommendationService) {}

    public function view($id)
    {
        $data = [
            'pageTitle' => 'Staff Service',
            'user' => $this->staffService->getStaff($id),
            'commendations' => $this->staffCommendationService->getStaffCommendations($id),
        ];
        return view('pages.staffs.commendation.index', $data);
    }

    public function store(StoreRequest $request)
    {
        try {
            $this->staffCommendationService->store($request->validated());

            return redirect()->back()->with("success", value: "Commendation details saved successfully");
        } catch (\Exception $ex) {
            return redirect()->back()->with("error", "Not successful," . $ex->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            $this->staffCommendationService->destroy($id);

            return redirect()->back()->with("success", value: "Commendation details deleted successfully");
        } catch (\Exception $ex) {
            return redirect()->back()->with("error", "Not successful," . $ex->getMessage());
        }
    }
}
