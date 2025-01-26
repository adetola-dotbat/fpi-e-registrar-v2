<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Http\Requests\StaffTransfer\StoreRequest;
use App\Http\Requests\StaffTransfer\UpdateRequest;
use App\Services\StaffService;
use App\Services\StaffTransferService;
use Illuminate\Http\Request;

class StaffTransferController extends Controller
{
    public function __construct(protected StaffService $staffService, protected StaffTransferService $staffTransferService) {}

    public function view($id)
    {
        $data = [
            'pageTitle' => 'Staff Transfer',
            'user' => $this->staffService->getStaff($id),
            'transfers' => $this->staffTransferService->staffTransfers($id),
        ];
        return view('pages.staffs.transfer.index', $data);
    }

    public function store(StoreRequest $request)
    {
        try {
            $this->staffTransferService->store($request->validated());

            return redirect()->back()->with("success", value: "Transfer details saved successfully");
        } catch (\Exception $ex) {
            return redirect()->back()->with("error", "Not successful," . $ex->getMessage());
        }
    }

    public function update(UpdateRequest $request)
    {
        try {
            $this->staffTransferService->update($request->validated());

            return redirect()->back()->with("success", value: "Transfer details updated successfully");
        } catch (\Exception $ex) {
            return redirect()->back()->with("error", "Not successful," . $ex->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            $this->staffTransferService->destroy($id);

            return redirect()->back()->with("success", value: "Transfer deleted successfully");
        } catch (\Exception $ex) {
            return redirect()->back()->with("error", "Not successful," . $ex->getMessage());
        }
    }
}
