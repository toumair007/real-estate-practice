@extends('front.layouts.master')

@section('main_content')
<main class="main">

    <!-- Page Title -->
    <div class="page-title" style="background-image: url({{ asset('uploads/bg/abstract-bg-3.webp') }}), radial-gradient(#ddd, #ccc);">
      <div class="heading">
        <div class="container">
          <div class="row d-flex justify-content-center text-center">
            <div class="col-lg-8">
              <h1 class="heading-title">Locations</h1>
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
      <nav class="breadcrumbs">
        <div class="container">
          <ol>
            <li><a href="{{ route('front.home') }}">Home</a></li>
            <li class="current">Locations</li>
          </ol>
        </div>
      </nav>
    </div>
    <!-- End Page Title -->

    <!-- Start Location Section -->
    <section id="featured-agents" class="featured-agents section">
      <div class="container" data-aos="fade-up" data-aos-delay="100">
        <div class="row gy-5 justify-content-center">
          <!-- Start Agent Card -->
          <div class="col-lg-6 col-xl-4" data-aos="fade-up" data-aos-delay="100">
            <div class="agent-card">
              <div class="agent-image">
                <img src="assets/img/real-estate/agent-5.webp" alt="Top Agent" class="img-fluid">
              </div>
              <div class="agent-info">
                <div class="agent-meta">
                  <h3 class="agent-name">Boston</h3>
                  <p class="agent-title">(10 Properties)</p>
                </div>
                <a href="location.html" class="profile-link">View All Properties</a>
              </div>
            </div>
          </div>
          <!-- End Agent Card -->

          <!-- Start Agent Card -->
          <div class="col-lg-6 col-xl-4" data-aos="fade-up" data-aos-delay="100">
            <div class="agent-card">
              <div class="agent-image">
                <img src="assets/img/real-estate/agent-4.webp" alt="Top Agent" class="img-fluid">
              </div>
              <div class="agent-info">
                <div class="agent-meta">
                  <h3 class="agent-name">California</h3>
                  <p class="agent-title">(10 Properties)</p>
                </div>
                <a href="location.html" class="profile-link">View All Properties</a>
              </div>
            </div>
          </div>
          <!-- End Agent Card -->

          <!-- Start Agent Card -->
          <div class="col-lg-6 col-xl-4" data-aos="fade-up" data-aos-delay="100">
            <div class="agent-card">
              <div class="agent-image">
                <img src="assets/img/real-estate/agent-7.webp" alt="Top Agent" class="img-fluid">
              </div>
              <div class="agent-info">
                <div class="agent-meta">
                  <h3 class="agent-name">Chicago</h3>
                  <p class="agent-title">(10 Properties)</p>
                </div>
                <a href="location.html" class="profile-link">View All Properties</a>
              </div>
            </div>
          </div>
          <!-- End Agent Card -->
        </div>
      </div>
    </section>
    <!-- End Location Section -->
</main>
@endsection