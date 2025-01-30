@extends('auth.layouts.app')
@section('pageTitle', 'Reset Password')
@section('content')

    <div class="col-md-6 col-12 fxt-bg-color">
        <div class="fxt-content">
            <div class="fxt-form">
                <form method="POST" action="{{ route('staff.password.update') }}">
                    @csrf
                    <h5>Create a new password and confirm your password</h5>
                    <input type="hidden" id="email" class="form-control" name="email"
                        placeholder="demo@federalpolyilaro.edu.ng" value="{{ auth()->user()->email }}" required="required">

                    <div class="form-group">
                        <label for="password" class="input-label">Password</label>
                        <input id="password" type="password" class="form-control" name="password" placeholder="********"
                            required="required">
                        <i toggle="#password" class="fa fa-fw fa-eye toggle-password field-icon"></i>
                    </div>
                    <div class="form-group">
                        <label for="password" class="input-label">Confirm Password</label>
                        <input id="password_confirmation" type="password" class="form-control" name="password_confirmation"
                            placeholder="********" required="required">
                        <i toggle="#password_confirmation" class="fa fa-fw fa-eye toggle-password field-icon"></i>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="fxt-btn-fill">Reset Password</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
