@extends('front.layouts.master')

@section('main_content')
    <main class="main">
        <!-- Page Title -->
        <div class="page-title hero-image" style="background-image: url({{ asset('uploads/bg/abstract-bg-3.webp') }}), radial-gradient(#ddd, #ccc);">
            <div class="heading">
                <div class="container">
                    <div class="row d-flex justify-content-center text-center">
                        <div class="col-lg-8">
                            <h1 class="heading-title text-light">Agent Registration</h1>
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
                    <li class="current">Agent Registration</li>
                </ol>
                </div>
            </nav>
        </div>
        <!-- End Page Title -->

        <!-- Starter Section Section -->
        <section id="login-section" class="login-section section abg-light">
            <div class="container d-flex justify-content-center align-items-center" data-aos="fade-up">
                <div class="row rounded-2 px-4 py-5 abg-light shadow">
                    <!-- Start Left Side -->
                    <div class="col-lg-6 align-self-center text-center d-none d-lg-block">
                        <div class="login-info-left abg-dark text-white w-100 shadow pb-1 rounded-3">
                            <img src="{{ asset('uploads/real-estate/property-exterior-1.webp') }}" alt="" width="550px" class="img-fluid rounded-2" />
                            <h2 class="mt-2 text-white">Be Verified First.</h2>
                            <p class="fs-5">Join The Largest Real Estate Listing Portal in Bangladesh.</p>
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
                                <div class="col-12 mb-4">
                                    <div class="login-header text-center">
                                        <img src="{{ asset('uploads/logo.webp') }}" alt="Logo" width="60" class="mb-2 rounded-circle shadow" />
                                        <h2 class="fw-bold">Sign Up</h2>
                                        <p class="text-secondary">Register your account</p>
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
                                            Sign Up with Google
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 mb-4">
                                    <div class="login-with facebook">
                                        <a href="" class="btn neumorphic-btn w-100">
                                            <i class="bi bi-facebook text-primary me-2"></i>
                                            Sign Up with Facebook
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
                                    <form action="{{ route('agent.registration.submit') }}" method="post" autocomplete="off">
                                        @csrf

                                        <div class="mb-4">
                                            <label for="name" class="form-label">Name <span class="text-danger">*</span></label>
                                            <input type="text" name="name" class="form-control neumorphic-input" id="name" placeholder="Enter Your Name" value="{{ old('name') }}">
                                        </div>
                                        <div class="mb-4">
                                            <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                                            <input type="email" name="email" id="email" class="form-control neumorphic-input" placeholder="Enter Your Email" value="{{ old('email') }}">
                                        </div>
                                        <div class="mb-4">
                                            <label for="company" class="form-label">Company Name <span class="text-danger">*</span></label>
                                            <input type="text" name="company" class="form-control neumorphic-input" id="company" placeholder="Enter Your Name" value="{{ old('company') }}">
                                        </div>
                                        <div class="mb-4">
                                            <label for="designation" class="form-label">Designation <span class="text-danger">*</span></label>
                                            <input type="text" name="designation" class="form-control neumorphic-input" id="designation" placeholder="Enter Your Name" value="{{ old('designation') }}">
                                        </div>
                                        <div class="mb-4">
                                            <label for="password" class="form-label">Password <span class="text-danger">*</span></label>
                                            <input type="password" name="password" id="password" class="form-control neumorphic-input" placeholder="Enter Your Password" value="{{ old('password') }}">
                                        </div>
                                        <div class="mb-4">
                                            <label for="confirmPassword" class="form-label">Confirm Password <span class="text-danger">*</span></label>
                                            <input type="password" name="confirmPassword" id="confirmPassword" class="form-control neumorphic-input" placeholder="Enter Your Password Again">
                                        </div>
                                        <div class="col-12 mb-4">
                                            <button type="submit" class="btn neumorphic-btn w-100">Sign Up</button>
                                        </div>
                                        <div class="sign-up-link text-center">
                                            <p class="m-0">
                                                Already have an account? Please
                                                <a href="{{ route('agent.login') }}" class="text-decoration-none fw-bold">Login</a>
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
            </div>
        </section>
        <!-- /Starter Section Section -->
    </main>
@endsection