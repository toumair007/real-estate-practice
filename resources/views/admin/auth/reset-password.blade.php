@extends('admin.layouts.master')

@section('main_content')
    <section class="abg-light">
        <div class="container vh-100 d-flex justify-content-center align-items-center p-4">
            <div class="row">
                <div class="neumorphic-card forget-box">
                    <!-- Start Login Header -->
                    <div class="col-12">
                        <div class="login-header text-center">
                            <img src="{{ asset('dist-admin/img/user.png') }}" alt="Logo" width="60" class="mb-2 rounded-circle shadow" />
                            <h2 class="fw-bold">Admin Reset Password</h2>
                            <p class="text-secondary">
                                You are only one step a way from your new password, recover your password now.
                            </p>
                        </div>
                    </div>
                    <!-- End Login Header -->
                    <!-- Start Login Form -->
                    <div class="col-12">
                        <form action="{{ route('admin.reset.password.submit', [$token, $email]) }}" method="post">
                            @csrf
                            <div class="mb-3">
                                <label for="password" class="form-label">Password <span class="text-danger">*</span></label>
                                <input type="password" name="password" id="password" class="form-control neumorphic-input" placeholder="Enter Your Password" required>
                            </div>
                            <div class="mb-4">
                                <label for="confirmPassword" class="form-label">Confirm Password <span class="text-danger">*</span></label>
                                <input type="password" name="confirmPassword" id="confirmPassword" class="form-control neumorphic-input" placeholder="Enter Your Password Again" required>
                            </div>
                            <div class="col-12 mb-4">
                                <button type="submit" class="btn neumorphic-btn w-100">Change Password</button>
                            </div>
                        </form>
                    </div>
                    <!-- End Login Form -->
                    <!-- Start Divider -->
                    <div class="col-12 mb-4">
                        <div class="position-relative">
                            <hr class="text-secondary" />
                            <div class="divider-content abg-light position-absolute top-50 start-50 text-center px-2">or</div>
                        </div>
                    </div>
                    <!-- End Divider -->
                    <div class="col-12">
                        <a href="{{ route('admin.login') }}" class="btn neumorphic-btn w-100">
                            Back to Login Page
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection