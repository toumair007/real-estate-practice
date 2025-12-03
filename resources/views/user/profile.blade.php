@extends('front.layouts.master')

@section('main_content')
    <main class="main">
        <!-- Page Title -->
        <div class="page-title hero-image" style="background-image: url({{ asset('uploads/bg/abstract-bg-3.webp') }}), radial-gradient(#ddd, #ccc);">
        <div class="heading">
            <div class="container">
            <div class="row d-flex justify-content-center text-center text-light">
                <div class="col-lg-8">
                <h1 class="heading-title text-light">User Profile</h1>
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
                <li><a href="{{ route('dashboard') }}">User Dashboard</a></li>
                <li class="current">Profile</li>
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
            <div class="col-lg-3">
                @include('user.sidebar')
            </div>
            <!-- End Left Side -->
            <!-- Start Right Side -->
            <div class="col-lg-9">
                <!-- Start Card -->
                <div class="agent-profile shadow p-2 rounded-2">
                    <form action="{{ route('profile.submit') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-12 col-md-2 mb-3">
                                <label for="existing-photo" class="form-label">Existing Profile Photo</label>
                                @if(Auth::guard('web')->user()->photo == null)
                                    <img src="{{ asset('uploads/user.png') }}" alt="Photo"  class="img-fluid">
                                    @else
                                    <img src="{{ asset('uploads/'.Auth::guard('web')->user()->photo) }}" alt="Photo"  class="img-fluid">
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-md-4 mb-3">
                                <label for="change-photo" class="form-label">Change Photo</label>
                                <input class="form-control" type="file" name="photo" id="change-photo">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="agent-name" class="form-label">Name <span>*</span></label>
                                <input type="text" name="name" class="form-control" id="agent-name" value="{{ Auth::guard('web')->user()->name }}">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="agent-email" class="form-label">Email <span>*</span></label>
                                <input type="email" name="email"  class="form-control" id="agent-email" value="{{ Auth::guard('web')->user()->email }}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="phone" class="form-label">Phone <span>*</span></label>
                                <input type="phone" name="phone" class="form-control" id="phone" value="{{ Auth::guard('web')->user()->phone }}">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="address" class="form-label">Address <span>*</span></label>
                                <input type="text" name="address" class="form-control" id="address" value="{{ Auth::guard('web')->user()->address }}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="password" class="form-label">Password <span>*</span></label>
                                <input type="password" name="password" placeholder="Password" class="form-control" id="password">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="confirm-password" class="form-label">Confirm Password <span>*</span></label>
                                <input type="password" name="confirmPassword" placeholder="Confirm Password" class="form-control" id="confirm-password">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 mt-3 text-center">
                                <button type="submit" class="btn btn-success">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- End Card -->
            </div>
            <!-- End Right Side -->
            </div>
        </div>
        </section>
        <!-- Starter Section Section -->
    </main>
@endsection