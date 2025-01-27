<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;

class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    protected function resetPassword($user, $password)
    {
        dd($user);
        // Call the original method to reset the password
        $user->password = bcrypt($password);

        // Update the reset_password field to true
        $user->reset_password = true;

        // Save the updated user details
        $user->save();

        // Log the user in after password reset
        $this->guard()->login($user);
    }
}
