@extends('front.layouts.master')

@section('main_content')
    <main class="main">
        <!-- Page Title -->
        <div class="page-title" style="background-image: url({{ asset('uploads/bg/abstract-bg-3.webp') }}), radial-gradient(#ddd, #ccc);">
            <div class="heading">
                <div class="container">
                    <div class="row d-flex justify-content-center text-center">
                        <div class="col-lg-8">
                            <h1 class="heading-title">Price List</h1>
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
                        <li class="current">Price List</li>
                    </ol>
                </div>
            </nav>
        </div>
        <!-- End Page Title -->

        <!-- Services Section -->
        <section class="real-estate-services-3 services section" id="services">
            <div class="container" data-aos="fade-up" data-aos-delay="100">
                <div class="row gy-4">
                    <div class="col-lg-6 col-md-12">
                        <div class="service-block" data-aos="fade-right" data-aos-delay="200">
                            <div class="service-content">
                                <div class="icon">
                                    <i class="bi bi-house-door"></i>
                                </div>
                                <h3>Buy Your Dream Home</h3>
                                <p>Lorem ipsum dolor sit amet consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam quis nostrud exercitation.</p>
                                <div class="stats">
                                    <div class="stat-item">
                                        <span class="number">2,500+</span>
                                        <span class="label">Properties Sold</span>
                                    </div>
                                    <div class="stat-item">
                                        <span class="number">98%</span>
                                        <span class="label">Client Satisfaction</span>
                                    </div>
                                </div>
                                <a href="service-details.html" class="btn-service">Learn More <i class="bi bi-arrow-right"></i></a>
                            </div>
                            <div class="service-image">
                                <img src="{{ asset('uploads/real-estate/property-exterior-3.webp') }}" alt="Buy Property" class="img-fluid">
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-12">
                        <div class="service-block" data-aos="fade-left" data-aos-delay="200">
                            <div class="service-content">
                                <div class="icon">
                                    <i class="bi bi-currency-dollar"></i>
                                </div>
                                <h3>Sell Your Property</h3>
                                <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam eaque ipsa quae ab illo inventore veritatis.</p>
                                <div class="stats">
                                    <div class="stat-item">
                                        <span class="number">45</span>
                                        <span class="label">Days Average Sale</span>
                                    </div>
                                    <div class="stat-item">
                                        <span class="number">$2.5M+</span>
                                        <span class="label">Highest Sale Price</span>
                                    </div>
                                </div>
                                <a href="service-details.html" class="btn-service">Get Valuation <i class="bi bi-arrow-right"></i></a>
                            </div>
                            <div class="service-image">
                                <img src="{{ asset('uploads/real-estate/property-exterior-7.webp') }}" alt="Sell Property" class="img-fluid">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="container featured-services" data-aos="fade-up" data-aos-delay="100">
                    <div class="row g-4 mt-4 justify-content-center">
                        @foreach ($packages as $package)
                            <!-- Start Service Item -->
                            @php
                                if ($package->allowed_properties == 0) {
                                    $allowed_properties_icon = 'bi bi-x';
                                    $allowed_properties = 'No';
                                } elseif ($package->allowed_properties == -1) {
                                    $allowed_properties_icon = 'bi bi-check2';
                                    $allowed_properties = 'Unlimited';
                                } else {
                                    $allowed_properties_icon = 'bi bi-check2';
                                    $allowed_properties = $package->allowed_properties;
                                }

                                if ($package->allowed_f_properties == 0) {
                                    $allowed_f_properties_icon = 'bi bi-x';
                                    $allowed_f_properties = 'No';
                                } elseif ($package->allowed_f_properties == -1) {
                                    $allowed_f_properties_icon = 'bi bi-check2';
                                    $allowed_f_properties = 'Unlimited';
                                } else {
                                    $allowed_f_properties_icon = 'bi bi-check2';
                                    $allowed_f_properties = $package->allowed_f_properties;
                                }

                                if ($package->allowed_photos == 0) {
                                    $allowed_photos_icon = 'bi bi-x';
                                    $allowed_photos = 'No';
                                } elseif ($package->allowed_photos == -1) {
                                    $allowed_photos_icon = 'bi bi-check2';
                                    $allowed_photos = 'Unlimited';
                                } else {
                                    $allowed_photos_icon = 'bi bi-check2';
                                    $allowed_photos = $package->allowed_photos;
                                }

                                if ($package->allowed_videos == 0) {
                                    $allowed_videos_icon = 'bi bi-x';
                                    $allowed_videos = 'No';
                                } elseif ($package->allowed_videos == -1) {
                                    $allowed_videos_icon = 'bi bi-check2';
                                    $allowed_videos = 'Unlimited';
                                } else {
                                    $allowed_videos_icon = 'bi bi-check2';
                                    $allowed_videos = $package->allowed_videos;
                                }
                            @endphp
                            <div class="col-lg-3 col-md-6" data-aos="zoom-in" data-aos-delay="200">
                                <div class="service-card featured">
                                    <div class="service-header">
                                        <div class="service-icon">
                                            <i class="bi bi-search"></i>
                                        </div>
                                        <div class="service-number">{{ $loop->iteration }}</div>
                                    </div>
                                    <div class="service-content">
                                        <h3>{{ $package->name }}</h3>
                                        <h4>${{ $package->price }}</h4>
                                        <h4>({{ $package->allowed_days }} days)</h4>
                                        <ul class="service-features">
                                            <li><i class="{{ $allowed_properties_icon }}"></i> {{ $allowed_properties }} Properties Allowed</li>
                                            <li><i class="{{ $allowed_f_properties_icon }}"></i> {{ $allowed_f_properties }} Featured Property</li>
                                            <li><i class="{{ $allowed_photos_icon }}"></i> {{ $allowed_photos }} Photos Per roperty</li>
                                            <li><i class="{{ $allowed_videos_icon }}"></i> {{ $allowed_videos }} Videos Per roperty</li>
                                        </ul>
                                    </div>
                                    <div class="service-action">
                                        <a href="{{ route('agent.payment') }}" class="service-btn">
                                            <span>Choose Plan</span>
                                            <i class="bi bi-arrow-right"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <!-- End Service Item -->
                        @endforeach
                    </div>
                    <div class="cta-section" data-aos="fade-up" data-aos-delay="400">
                        <div class="row align-items-center">
                            <div class="col-lg-8">
                                <h3>Ready to Take the Next Step?</h3>
                                <p>Lorem ipsum dolor sit amet consectetur adipiscing elit sed do eiusmod tempor incididunt ut labore et dolore magna aliqua enim ad minim veniam.</p>
                            </div>
                            <div class="col-lg-4 text-lg-end">
                                <a href="{{ route('front.contact') }}" class="btn btn-cta">Get Free Consultation</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section><!-- /Services Section -->
    </main>
@endsection