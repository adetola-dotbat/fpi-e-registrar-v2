<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use App\Services\StaffService;
use Illuminate\Http\Request;
use App\Services\StaffPromotionService;

class PromotionController extends Controller
{
    public function __construct(protected StaffService $staffService, protected StaffPromotionService $staffPromotionService) {}

    public function index()
    {
        $data = [
            'pageTitle' => 'Promotions',
            'promotions' => $this->staffPromotionService->promotions(),
        ];
        return view('pages.staffs.promotion.promotions', $data);
    }
}
