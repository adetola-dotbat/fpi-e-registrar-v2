<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\StaffService;
use Illuminate\Http\Request;

class StaffController extends Controller
{

    public function __construct(protected StaffService $staffService) {}


    public function index(Request $request)
    {
        $staffType = $request->query('type');

        $data = [
            'pageTitle' => 'Staff List',
            'users' => $this->staffService->all($staffType),
        ];

        return view('pages.staffs.index', $data);
    }

    public function view($id)
    {
        $data = [
            'pageTitle' => 'Staff Profile',
            'user' => $this->staffService->getStaff($id),
        ];
        return view('pages.staffs.view', $data);
    }

    public function report()
    {
        $data = [
            'pageTitle' => 'Staff List',
            'users' => $this->staffService->all(),
        ];

        return view('pages.staffs.index', $data);
    }

    public function transferStaff($id)
    {
        $data = [
            'user' => $this->staffService->getStaff($id),
        ];
        return view('pages.staffs.transfer', $data);
    }
    public function destroy($id)
    {
        try {
            $this->staffService->destroy($id);

            return redirect()->back()->with("success", value: "User deleted successfully");
        } catch (\Exception $ex) {
            return redirect()->back()->with("error", "Not successful," . $ex->getMessage());
        }
    }
}
