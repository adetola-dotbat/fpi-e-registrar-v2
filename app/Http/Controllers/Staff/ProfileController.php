<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use App\Services\StaffService;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function __construct(protected StaffService $staffService) {}

    public function view($staffId)
    {
        $data = [
            'pageTitle' => 'My Profile',
            'user' => $this->staffService->getStaff($staffId),
        ];
        return view('pages.staffs.view', $data);
    }
}
