<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Http\Requests\StaffPromotion\StoreRequest;
use App\Http\Requests\StaffPromotion\UpdateRequest;
use App\Services\StaffPromotionService;
use App\Services\StaffService;
use App\Services\StaffTransferService;
use Illuminate\Http\Request;

class StaffPromotionController extends Controller
{
    public function __construct(protected StaffService $staffService, protected StaffPromotionService $staffPromotionService) {}

    public function index()
    {
        $data = [
            'pageTitle' => 'Staff Promotion',
            'promotions' => $this->staffPromotionService->promotions(),
        ];
        return view('pages.staffs.promotion.promotions', $data);
    }
    public function view($id)
    {
        $data = [
            'pageTitle' => 'Staff Promotion',
            'user' => $this->staffService->getStaff($id),
            'promotions' => $this->staffPromotionService->staffPromotions($id),
        ];
        return view('pages.staffs.promotion.index', $data);
    }

    public function store(StoreRequest $request)
    {
        try {
            $this->staffPromotionService->store($request->validated());

            return redirect()->back()->with("success", value: "Promotion details saved successfully");
        } catch (\Exception $ex) {
            return redirect()->back()->with("error", "Not successful," . $ex->getMessage());
        }
    }

    public function update(UpdateRequest $request)
    {

        try {
            $this->staffPromotionService->update($request->validated());

            return redirect()->back()->with("success", value: "Promotion details updated successfully");
        } catch (\Exception $ex) {
            return redirect()->back()->with("error", "Not successful," . $ex->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            $this->staffPromotionService->destroy($id);

            return redirect()->back()->with("success", value: "Promotion deleted successfully");
        } catch (\Exception $ex) {
            return redirect()->back()->with("error", "Not successful," . $ex->getMessage());
        }
    }
}
