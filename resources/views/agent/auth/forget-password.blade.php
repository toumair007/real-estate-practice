@extends('front.layouts.master')

@section('main_content')
    <!-- Page Title -->
    <div class="page-title hero-image" style="background-image: url({{ asset('uploads/bg/abstract-bg-3.webp') }}), radial-gradient(#ddd, #ccc);">
        <div class="heading">
            <div class="container">
                <div class="row d-flex justify-content-center text-center">
                    <div class="col-lg-8">
                        <h1 class="heading-title text-light">Agent Forget Password</h1>
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
        <nav class="breadcrumbs shadow">
            <div class="container">
            <ol>
                <li><a href="{{ route('front.home') }}">Home</a></li>
                <li><a href="{{ route('select.user') }}">Select User</a></li>
                <li><a href="{{ route('agent.login') }}">Agent Login</a></li>
                <li class="current">Forget Password</li>
            </ol>
            </div>
        </nav>
    </div>
    <!-- End Page Title -->

    <section class="abg-light">
        <div class="container d-flex justify-content-center align-items-center">
            <div class="row">
                <div class="neumorphic-card forget-box">
                    <!-- Start Login Header -->
                    <div class="col-12">
                        <div class="login-header text-center">
                            <img src="{{ asset('uploads/user.png') }}" alt="Logo" width="60" class="mb-2 rounded-circle shadow" />
                            <h2 class="fw-bold">Forget Password</h2>
                            <p class="text-secondary">You forgot your password? Here you can easily retrieve a new password.</p>
                        </div>
                    </div>
                    <!-- End Login Header -->
                    <!-- Start Login Form -->
                    <div class="col-12">
                        <form action="{{ route('agent.forget.password.submit') }}" method="post">
                            @csrf
                            <div class="mb-4">
                                <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                                <input type="email" name="email" id="email" class="form-control neumorphic-input" placeholder="Enter Your Email" value="{{ old('email') }}">
                            </div>
                            <div class="col-12 mb-4">
                                <button type="submit" class="btn neumorphic-btn w-100">Send Password Reset Link</button>
                            </div>
                            <div class="sign-up-link text-center">
                                <p class="m-0">
                                    Don't Have an Account? <a href="{{ route('agent.registration') }}" class="text-decoration-none fw-bold">Sign Up</a>
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
                        <a href="{{ route('agent.login') }}" class="btn neumorphic-btn w-100">
                            Back to Login Page
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection