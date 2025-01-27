<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = auth()->user();
        if ($user->account_type !== 'management' && $user->reset_password != true) {
            return redirect()->route('staff.reset.password');
        }
        $data = [
            'pageTitle' => 'Dashboard',
            'countNonAcademicStaff' => User::whereHas('staffDetail', function ($query) {
                $query->where('staff_type', 'Non Teaching');
            })->count(),
            'countAcademicStaff' => User::whereHas('staffDetail', function ($query) {
                $query->where('staff_type', 'Academic');
            })->count(),
            'totalStaff' => User::whereHas('staffDetail', function ($query) {
                $query->where('staff_type', 'Academic')
                    ->orWhere('staff_type', 'Non Teaching');
            })->count(),
        ];
        return view('home', $data);
    }
}
