@extends('admin.layouts.master')

@section('main_content')
    <section class="abg-light">
        <div class="container vh-100 d-flex justify-content-center align-items-center p-4">
            <div class="row">
                <!-- Start Right Side -->
                <div class="neumorphic-card forget-box">
                    <!-- Start Login Header -->
                        <div class="col-12">
                            <div class="login-header text-center">
                                <img src="{{ asset('dist-admin/img/user.png') }}" alt="Logo" width="60" class="mb-2 rounded-circle shadow" />
                                <h2 class="fw-bold">Admin Forget Password</h2>
                                <p class="text-secondary">You forgot your password? Here you can easily retrieve a new password.</p>
                            </div>
                        </div>
                    <!-- End Login Header -->
                    <!-- Start Login Form -->
                        <div class="col-12">
                            <form action="{{ route('admin.forget.password.submit') }}" method="post">
                                @csrf
                                <div class="mb-4">
                                    <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                                    <input type="email" name="email" id="email" class="form-control neumorphic-input" placeholder="Enter Your Email" required>
                                </div>
                                <div class="col-12 mb-4">
                                    <button type="submit" class="btn neumorphic-btn w-100">Send Password Reset Link</button>
                                </div>
                                <div class="sign-up-link text-center">
                                    <p class="m-0">
                                        Don't Have an Account? <a href="registration.html" class="text-decoration-none fw-bold">Sign Up</a>
                                    </p>
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
                <!-- End Right Side -->
            </div>
        </div>
    </section>
@endsection