@extends('front.layouts.master')

@section('main_content')
    <main class="main">
        <!-- Page Title -->
        <div class="page-title hero-image" style="background-image: url({{ asset('uploads/bg/abstract-bg-3.webp') }}), radial-gradient(#ddd, #ccc);">
        <div class="heading">
            <div class="container">
            <div class="row d-flex justify-content-center text-center text-light">
                <div class="col-lg-8">
                <h1 class="heading-title text-light">Select User</h1>
                <p class="mb-0">
                    Odio et unde deleniti. Deserunt numquam exercitationem. Officiis quo
                    odio sint voluptas consequatur ut a odio voluptatem. Sit dolorum
                    debitis veritatis natus dolores. Quasi ratione sint. Sit quaerat
                    ipsum dolorem.
                </p>
                </div>
            </div>
            </div>
        </div>
        <nav class="breadcrumbs abg-light">
            <div class="container">
            <ol>
                <li><a href="{{ route('front.home') }}">Home</a></li>
                <li class="current">Select User</li>
            </ol>
            </div>
        </nav>
        </div>
        <!-- End Page Title -->

        <!-- Starter Section Section -->
        <section id="login-section" class="login-section section">
            <div class="container" data-aos="fade-up">
                <div class="row">
                    <!-- Start Left Side -->
                    <div class="col-12 d-flex justify-content-center">
                        <div class="select-customer me-4 p-4 shadow">
                            <h3 class="text-center">Customer</h3>
                            <div class="shadow mb-3">
                                <a href="{{ route('registration') }}" class="d-block p-3 text-center">Customer Registration</a>
                            </div>
                            <div class="shadow">
                                <a href="{{ route('login') }}" class="d-block p-3 text-center">Customer Login</a>
                            </div>
                        </div>
                        <!-- End Left Side -->
                        <!-- Start Right Side -->
                        <div class="select-agent p-4 shadow">
                            <h3 class="text-center">Agent</h3>
                            <div class="shadow mb-3">
                                <a href="{{ route('agent.registration') }}" class="d-block p-3 text-center">Agent Registration</a>
                            </div>
                            <div class="shadow">
                                <a href="{{ route('agent.login') }}" class="d-block p-3 text-center">Agent Login</a>
                            </div>
                        </div>
                    </div>
                    <!-- End Right Side -->
                </div>
            </div>
        </section>
        <!-- Starter Section Section -->
    </main>
@endsection