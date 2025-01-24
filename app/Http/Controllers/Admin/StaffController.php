<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\StaffService;
use Illuminate\Http\Request;

class StaffController extends Controller
{

    public function __construct(protected StaffService $staffService) {}

    public function index()
    {
        $data = [
            'users' => $this->staffService->all(),
        ];

        return view('pages.staffs.index', $data);
    }

    public function view($id)
    {
        $data = [
            'user' => $this->staffService->getStaff($id),
        ];

        // dd($data);
        return view('pages.staffs.view', $data);
    }

    public function transferStaff($id)
    {
        $data = [
            'user' => $this->staffService->getStaff($id),
        ];

        // dd($data);
        return view('pages.staffs.transfer', $data);
    }
}
