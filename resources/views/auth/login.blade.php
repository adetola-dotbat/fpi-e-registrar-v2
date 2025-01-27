@extends('auth.layouts.app')
@section('pageTitle', 'Login')
@section('content')

    <div class="col-md-6 col-12 fxt-bg-color">
        <div class="fxt-content">
            <div class="fxt-form">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="form-group">
                        <label for="email" class="input-label">Email Address</label>
                        <input type="email" id="email" class="form-control" name="email" placeholder="demo@gmail.com"
                            required="required">
                    </div>
                    <div class="form-group">
                        <label for="password" class="input-label">Password</label>
                        <input id="password" type="password" class="form-control" name="password" placeholder="********"
                            required="required">
                        <i toggle="#password" class="fa fa-fw fa-eye toggle-password field-icon"></i>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="fxt-btn-fill">Log in</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
