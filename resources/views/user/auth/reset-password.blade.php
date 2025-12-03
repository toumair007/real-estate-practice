@extends('front.layouts.master')

@section('main_content')
    <!-- Page Title -->
    <div class="page-title hero-image" style="background-image: url({{ asset('uploads/bg/abstract-bg-3.webp') }}), radial-gradient(#ddd, #ccc);">
        <div class="heading">
            <div class="container">
                <div class="row d-flex justify-content-center text-center">
                    <div class="col-lg-8">
                        <h1 class="heading-title text-light">Customer Reset Password</h1>
                        <p class="mb-0 text-light">
                            Odio et unde deleniti. Deserunt numquam exercitationem. Officiis quo
                            odio sint voluptas consequatur ut a odio voluptatem. Sit dolorum
                            debitis veritatis natus dolores. Quasi ratione sint. Sit quaerat
                            ipsum dolorem.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Page Title -->
    <section class="abg-light">
        <div class="container d-flex justify-content-center align-items-center">
            <div class="row">
                <!-- Start Right Side -->
                <div class="neumorphic-card forget-box">
                    <!-- Start Login Header -->
                        <div class="col-12">
                            <div class="login-header text-center">
                                <img src="{{ asset('uploads/user.png') }}" alt="Logo" width="60" class="mb-2 rounded-circle shadow" />
                                <h2 class="fw-bold">Reset Password</h2>
                                <p class="text-secondary">
                                    You are only one step a way from your new password, recover your password now.
                                </p>
                            </div>
                        </div>
                    <!-- End Login Header -->
                    <!-- Start Login Form -->
                        <div class="col-12">
                            <form action="{{ route('reset.password.submit', [$token, $email]) }}" method="post">
                                @csrf
                                <div class="mb-3">
                                    <label for="password" class="form-label">New Password <span class="text-danger">*</span></label>
                                    <input type="password" name="password" id="password" class="form-control neumorphic-input" placeholder="Enter Your New Password" required>
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
                </div>
                <!-- End Right Side -->
            </div>
        </div>
    </section>
@endsection