@extends('front.layouts.master')

@section('main_content')
<main class="main">
    <!-- Page Title -->
    <div class="page-title hero-image" style="background-image: url({{ asset('uploads/bg/abstract-bg-3.webp') }}), radial-gradient(#ddd, #ccc);">
      <div class="heading">
        <div class="container">
          <div class="row d-flex justify-content-center text-center text-light">
            <div class="col-lg-8">
              <h1 class="heading-title text-light">Agent Profile</h1>
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
            <li><a href="{{ route('agent.dashboard') }}">Agent Dashboard</a></li>
            <li class="current">Agent Profile</li>
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
                    @include('agent.sidebar')
                </div>
                <!-- End Left Side -->
                <!-- Start Right Side -->
                <div class="col-lg-9">
                    <div class="agent-profile shadow p-2 rounded-2">
                        <form action="{{ route('agent.profile.submit') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-12 col-md-8 mb-3">
                                    <h6 class="form-label">Existing Cover Photo</h6>
                                    @if(Auth::guard('agent')->user()->cover_photo == null)
                                        <img src="{{ asset('uploads/real-estate/property-exterior-4.webp') }}" alt="Photo"  class="img-fluid cover-img">
                                        @else
                                        <img src="{{ asset('uploads/'.Auth::guard('agent')->user()->cover_photo) }}" alt="Photo"  class="img-fluid cover-img">
                                    @endif
                                    <div class="mt-3">
                                        <label for="change-cover-photo" class="form-label">Change Cover Photo</label>
                                        <input class="form-control" type="file" name="cover_photo" id="change-cover-photo">
                                    </div>
                                </div>
                            {{-- </div>
                            <div class="row"> --}}
                                <div class="col-12 col-md-4 mb-3">
                                    <h6 class="form-label">Existing Profile Photo</h6>
                                    @if(Auth::guard('agent')->user()->photo == null)
                                        <img src="{{ asset('uploads/user.png') }}" alt="Photo"  class="img-fluid w-50">
                                        @else
                                        <img src="{{ asset('uploads/'.Auth::guard('agent')->user()->photo) }}" alt="Photo"  class="img-fluid w-50">
                                    @endif
                                    <div class="mt-3">
                                        <label for="change-pro-photo" class="form-label">Change Profile Photo</label>
                                        <input class="form-control" type="file" name="photo" id="change-pro-photo">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <label for="agent-name" class="form-label">Name <span>*</span></label>
                                    <input type="text" name="name" class="form-control" id="agent-name" value="{{ Auth::guard('agent')->user()->name }}">
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="agent-company" class="form-label">Company <span>*</span></label>
                                    <input type="text" name="company" class="form-control" id="agent-company" value="{{ Auth::guard('agent')->user()->company }}">
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="agent-designation" class="form-label">Designation <span>*</span></label>
                                    <input type="text" name="designation" class="form-control" id="agent-designation" value="{{ Auth::guard('agent')->user()->designation }}">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 mb-3">
                                    <label for="agent-biography" class="form-label">Biography <span>*</span></label>
                                    <textarea class="form-control" name="biography" id="agent-biography" rows="5">{{ Auth::guard('agent')->user()->biography }}</textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <label for="agent-email" class="form-label">Email <span>*</span></label>
                                    <input type="email" name="email" class="form-control" id="agent-email" value="{{ Auth::guard('agent')->user()->email }}">
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="agent-phone" class="form-label">Phone <span>*</span></label>
                                    <input type="phone" name="phone" class="form-control" id="agent-phone" value="{{ Auth::guard('agent')->user()->phone }}">
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="agent-address" class="form-label">Address <span>*</span></label>
                                    <input type="text" name="address" class="form-control" id="agent-address" value="{{ Auth::guard('agent')->user()->address }}">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <label for="agent-country" class="form-label">Country <span>*</span></label>
                                    <input type="text" name="country" class="form-control" id="agent-country" value="{{ Auth::guard('agent')->user()->country }}">
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="agent-city" class="form-label">City <span>*</span></label>
                                    <input type="text" name="city" class="form-control" id="agent-city" value="{{ Auth::guard('agent')->user()->city }}">
                                </div> 
                                <div class="col-md-4 mb-3">
                                    <label for="agent-state" class="form-label">State <span>*</span></label>
                                    <input type="text" name="state" class="form-control" id="agent-state" value="{{ Auth::guard('agent')->user()->state }}">
                                </div>                             
                            </div>
                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <label for="agent-zipcode" class="form-label">Zip Code <span>*</span></label>
                                    <input type="text" name="zip" class="form-control" id="agent-zipcode" value="{{ Auth::guard('agent')->user()->zip }}">
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="agent-website" class="form-label">Website <span>*</span></label>
                                    <input type="text" name="website" class="form-control" id="agent-website" value="{{ Auth::guard('agent')->user()->website }}">
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="agent-facebook" class="form-label">Facebook <span>*</span></label>
                                    <input type="text" name="facebook" class="form-control" id="agent-facebook" value="{{ Auth::guard('agent')->user()->facebook }}">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <label for="agent-linkedin" class="form-label">LinkedIn <span>*</span></label>
                                    <input type="text" name="linkedin" class="form-control" id="agent-linkedin" value="{{ Auth::guard('agent')->user()->linkedin }}">
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="agent-instagram" class="form-label">Instagram <span>*</span></label>
                                    <input type="text" name="instagram" class="form-control" id="agent-instagram" value="{{ Auth::guard('agent')->user()->instagram }}">
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="agent-youtube" class="form-label">Youtube <span>*</span></label>
                                    <input type="text" name="youtube" class="form-control" id="agent-youtube" value="{{ Auth::guard('agent')->user()->youtube }}">
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
                </div>
            </div>
        </div>
    </section>
@endsection