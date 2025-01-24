<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Http\Requests\StaffPublicService\StoreRequest;
use App\Services\StaffPublicServiceService;
use App\Services\StaffService;
use App\Services\StaffTransferService;
use Illuminate\Http\Request;

class StaffPublicServiceController extends Controller
{
    public function __construct(protected StaffService $staffService, protected StaffPublicServiceService $staffPublicServiceService) {}

    public function view($id)
    {
        $data = [
            'pageTitle' => 'Staff Service',
            'user' => $this->staffService->getStaff($id),
            'publicServices' => $this->staffPublicServiceService->getStaffPublicServices($id),
        ];
        return view('pages.staffs.publicService.index', $data);
    }

    public function store(StoreRequest $request)
    {
        try {
            $this->staffPublicServiceService->store($request->validated());

            return redirect()->back()->with("success", value: "Public service details saved successfully");
        } catch (\Exception $ex) {
            return redirect()->back()->with("error", "Not successful," . $ex->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            $this->staffPublicServiceService->destroy($id);

            return redirect()->back()->with("success", value: "Public service details deleted successfully");
        } catch (\Exception $ex) {
            return redirect()->back()->with("error", "Not successful," . $ex->getMessage());
        }
    }
}
