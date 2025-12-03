@extends('admin.layouts.master')

@section('main_content')

<section class="container vh-100 d-flex justify-content-center align-items-center">
        <div class="row rounded-2 p-4 abg-light shadow">
            <!-- Start Left Side -->
            <div class="col-lg-6 align-self-center text-center d-none d-lg-block">
                <div class="login-info-left bg-dark text-white w-100 shadow pb-1 rounded-3">
                    <img src="{{ asset('uploads/04.jpg') }}" alt="" width="550px" class="img-fluid rounded-2" />
                     <h2 class="mt-2">Be Verified First.</h2>
                     <p class="fs-5">Join The Largest Result Management System in Bangladesh.</p>
                     <p>For any help.</p>
                     <p>Please Contact with Us 24/7.</p>
                     <p>+880-1512-101010</p>
                </div>
            </div>
            <!-- End Left Side -->
            <!-- Start Right Side -->
            <div class="col-lg-6 align-self-center">
                <div class="neumorphic-card mx-auto">
                    <!-- Start Login Header -->
                    <div class="row">
                        <div class="col-12">
                            <div class="login-header text-center">
                                <img src="{{ asset('uploads/user.png') }}" alt="Logo" width="60" class="mb-2 rounded-circle shadow" />
                                <h2 class="fw-bold">Admin Login</h2>
                                <p class="text-secondary">Get access to your account</p>
                            </div>
                        </div>
                    </div>
                    <!-- End Login Header -->
                    <!-- Start Social Login -->
                    <div class="row">
                        <div class="col-12 mb-4">
                            <div class="login-with google">
                                <a href="" class="btn neumorphic-btn w-100">
                                    <i class="bi bi-google text-danger me-2"></i>
                                    Login with Google
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 mb-4">
                            <div class="login-with facebook">
                                <a href="" class="btn neumorphic-btn w-100">
                                    <i class="bi bi-facebook text-primary me-2"></i>
                                    Login with Facebook
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- End Social Login -->
                    <!-- Start Divider -->
                    <div class="row">
                        <div class="col-12">
                            <div class="position-relative">
                                <hr class="text-secondary" />
                                <div class="divider-content abg-light position-absolute top-50 start-50 text-center px-2">or</div>
                            </div>
                        </div>
                    </div>
                    <!-- End Divider -->
                    <!-- Start Login Form -->
                    <div class="row">
                        <div class="col-12">
                            <form action="{{ route('admin.login.submit') }}" method="post">
                                @csrf

                                <div class="mb-4">
                                    <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                                    <input type="email" name="email" id="email" class="form-control neumorphic-input" placeholder="Enter Your Email" value="{{ old('email') }}" />
                                </div>
                                <div class="mb-3">
                                    <label for="password" class="form-label">Password <span class="text-danger">*</span></label>
                                    <input type="password" name="password" id="password" class="form-control neumorphic-input" placeholder="Enter Your Password" />
                                </div>
                                <div class="mb-4 d-flex justify-content-between">
                                    <div class="form-check">
                                        <input type="checkbox" name="remember" id="remember" class="form-check-input neumorphic-input-check">
                                        <label for="remember" class="form-check-label">Remember Me</label>
                                    </div>
                                    <div class="forget-pass">
                                        <a href="{{ route('admin.forget.password') }}" class="text-secondary text-decoration-none">Forget Password?</a>
                                    </div>
                                </div>
                                <div class="col-12 mb-4">
                                    <button type="submit" class="btn neumorphic-btn w-100">Login</button>
                                </div>
                                <div class="sign-up-link text-center">
                                    <p class="m-0">
                                        Don't Have an Account? <a href="" class="text-decoration-none fw-bold">Sign Up</a>
                                    </p>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- End Login Form -->
                </div>
            </div>
            <!-- End Right Side -->
        </div>
    </section>
@endsection