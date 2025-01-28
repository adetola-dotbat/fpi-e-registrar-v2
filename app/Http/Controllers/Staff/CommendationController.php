<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use App\Services\StaffService;
use Illuminate\Http\Request;
use App\Services\StaffCommendationService;

class CommendationController extends Controller
{
    public function __construct(protected StaffService $staffService, protected StaffCommendationService $staffCommendationService) {}

    public function index()
    {
        $data = [
            'pageTitle' => 'Commendations',
            'commendations' => $this->staffCommendationService->commendations(),
        ];
        return view('pages.staffs.commendation.commendations', $data);
    }
}
