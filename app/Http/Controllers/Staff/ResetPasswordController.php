<?php

namespace App\Http\Controllers\Staff;

use App\Helper\FileHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\StaffLeave\StoreRequest;
use App\Services\LeaveTypeService;
use App\Services\StaffLeaveService;
use App\Services\StaffService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\User;


class ResetPasswordController extends Controller
{
    public function __construct(protected StaffService $staffService, protected StaffLeaveService $staffLeaveService, protected LeaveTypeService $leaveTypeService) {}
    public function index()
    {
        $data = [
            'pageTitle' => 'Reset Password',
        ];
        return view('auth.passwords.reset', $data);
    }

    /**
     * Update the user's password.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updatePassword(Request $request)
    {
        // Validate the form data
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|exists:users,email',
            'password' => 'required|string|confirmed|min:8',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        // Find the user by email
        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return back()->with('error', 'No user found with this email address.');
        }

        // Update the password
        $user->password = Hash::make($request->password);
        $user->reset_password = true; // Optional: If you track password resets
        $user->save();

        return redirect()->route('login')->with('success', 'Password has been updated successfully.');
    }
}
