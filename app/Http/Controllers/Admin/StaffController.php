<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Services\StaffService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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

    public function registerForm()
    {
        $data = [
            'pageTitle' => 'Register Staff',
        ];
        return view('pages.staffs.register-staff', $data);
    }

    public function registerStaff(Request $request)
    {
        try {
            // Validate the form data
            $validated = $request->validate([
                'title' => 'required|string',
                'surname' => 'required|string',
                'first_name' => 'required|string',
                'other_name' => 'nullable|string',
                'email' => 'required|email|unique:users,email',
                'gender' => 'nullable|string',
                'dob' => 'nullable|date',
                'marital_status' => 'nullable|string|in:single,married,divorced,widowed',
                'nationality' => 'nullable|string',
                'gpz' => 'nullable|string',
                'state_of_origin' => 'nullable|string',
                'local_government' => 'nullable|string',
                'home_address' => 'nullable|string',
                'postal_address' => 'nullable|string',
                'phone_no' => 'nullable|string',
                'employee_file_no' => 'nullable|string',
            ]);
            $validated['password'] = Hash::make('password');

            $user =  User::create($validated);

            return redirect()->back()->with('success', 'User has been registered successfully.');
        } catch (\Exception $ex) {
            return redirect()->back()->with("error", "Not successful," . $ex->getMessage());
        }
    }

    public function view($id)
    {
        $data = [
            'pageTitle' => 'Staff Profile',
            'user' => $this->staffService->getStaff($id),
        ];
        return view('pages.staffs.view', $data);
    }

    public function resetPassword($id)
    {
        $user = User::findOrFail($id);

        $user->update([
            'password' => Hash::make('password'),
            'reset_password' => false,
        ]);

        return redirect()->back()->with('success', 'Password has been reset successfully.');
    }

    public function report()
    {
        $data = [
            'pageTitle' => 'Staff List',
            'users' => $this->staffService->all(),
        ];

        return view('pages.staffs.reports', $data);
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
