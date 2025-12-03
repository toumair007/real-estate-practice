@extends('front.layouts.master')

@section('main_content')
<main class="main">
    <!-- Page Title -->
    <div class="page-title hero-image" style="background-image: url({{ asset('uploads/bg/abstract-bg-3.webp') }}), radial-gradient(#ddd, #ccc);">
      <div class="heading">
        <div class="container">
          <div class="row d-flex justify-content-center text-center text-light">
            <div class="col-lg-8">
              <h1 class="heading-title text-light">User Dashboard</h1>
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
            <li class="current">User Dashboard</li>
          </ol>
        </div>
      </nav>
    </div>
    <!-- End Page Title -->

    <!-- Starter Section Section -->
    <section id="dashboard-section" class="dashboard-section section">
      <div class="container" data-aos="fade-up">
        <div class="row">
            <!-- Start Left Side -->
            <div class="col-lg-3">
                @include('user.sidebar')
            </div>
            <!-- End Left Side -->
            <!-- Start Right Side -->
            <div class="col-lg-9">
                <div class="user-top-section">
                  <h3>Hello, {{ Auth::guard('web')->user()->name }}</h3>
                  <p>
                    See all the statistics at a glance:
                  </p>
                </div>
                <!-- Start Card -->
                <div class="row">
                  <div class="col-4">
                    <div class="card bg-success mb-3 shadow">
                      <div class="card-body">
                        <h3 class="card-title fw-bold text-light">5</h3>
                        <p class="card-text fw-bold">Message</p>
                        <a href="#" class="btn btn-success bg-gradient">View All</a>
                      </div>
                    </div>
                  </div>
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