<?php

namespace App\Http\Controllers;

use App\Http\Requests\StaffLeave\StoreRequest;
use App\Services\ReviewService;
use App\Services\StaffService;
use App\Services\StaffTransferService;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function __construct(protected StaffService $staffService, protected ReviewService $reviewService) {}

    public function index()
    {
        $data = [
            'pageTitle' => 'Reviews',
            'reviews' => $this->reviewService->all(),
        ];
        return view('pages.staffs.review.index', $data);
    }
    // public function view($id)
    // {
    //     $data = [
    //         'pageTitle' => 'Staff Promotion',
    //         'user' => $this->staffService->getStaff($id),
    //         'promotions' => $this->reviewService->staffPromotions($id),
    //     ];
    //     return view('pages.staffs.promotion.index', $data);
    // }

    public function store(StoreRequest $request)
    {
        try {
            $this->reviewService->store($request->validated());

            return redirect()->back()->with("success", value: "Review saved successfully");
        } catch (\Exception $ex) {
            return redirect()->back()->with("error", "Not successful," . $ex->getMessage());
        }
    }

    public function update(UpdateRequest $request)
    {

        try {
            $this->reviewService->update($request->validated());

            return redirect()->back()->with("success", value: "Promotion details updated successfully");
        } catch (\Exception $ex) {
            return redirect()->back()->with("error", "Not successful," . $ex->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            $this->reviewService->destroy($id);

            return redirect()->back()->with("success", value: "Promotion deleted successfully");
        } catch (\Exception $ex) {
            return redirect()->back()->with("error", "Not successful," . $ex->getMessage());
        }
    }
}
