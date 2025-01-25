<?php

namespace App\Http\Controllers\Admin;

use App\Enums\RelationshipEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\StaffNextOfKin\StoreRequest;
use App\Services\LeaveTypeService;
use App\Services\StaffNextOfKinService;
use App\Services\StaffService;
use Illuminate\Http\Request;


class StaffNextOfKinController extends Controller
{
    public function __construct(protected StaffService $staffService, protected StaffNextOfKinService $staffNextOfKinService) {}

    public function view($id)
    {
        $data = [
            'pageTitle' => 'Next of Kin',
            'user' => $this->staffService->getStaff($id),
            'relationships' => array_map(
                fn($case) => ucfirst(strtolower($case->name)),
                RelationshipEnum::cases()
            ),
            'nextOfKins' => $this->staffNextOfKinService->getNextOfKins($id),
        ];
        return view('pages.staffs.nextOfKin.index', $data);
    }

    public function store(StoreRequest $request)
    {
        try {

            $this->staffNextOfKinService->store($request->validated());

            return redirect()->back()->with("success", "Next of kin saved successfully");
        } catch (\Exception $ex) {
            return redirect()->back()->with("error", "Not successful, " . $ex->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            $this->staffNextOfKinService->destroy($id);

            return redirect()->back()->with("success", value: "Next of kin deleted successfully");
        } catch (\Exception $ex) {
            return redirect()->back()->with("error", "Not successful," . $ex->getMessage());
        }
    }
}
