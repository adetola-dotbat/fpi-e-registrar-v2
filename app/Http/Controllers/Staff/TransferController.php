<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use App\Services\StaffService;
use App\Services\StaffPromotionService;
use App\Services\StaffTransferService;
use Illuminate\Http\Request;

class TransferController extends Controller
{
    public function __construct(protected StaffService $staffService, protected StaffTransferService $staffTransferService) {}

    public function index()
    {
        $data = [
            'pageTitle' => 'Transfer',
            'transfers' => $this->staffTransferService->transfers(),
        ];
        return view('pages.staffs.transfer.transfers', $data);
    }
}
