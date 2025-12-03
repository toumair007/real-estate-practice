@extends('admin.layouts.master')

@section('main_content')
@include('admin.layouts.nav')
@include('admin.layouts.sidebar')
<main class="main bg-dark text-light" id="main-content">
    <!-- Content Header Start -->
    <div class="content-header pt-4">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-sm-6">
                    <h3 class="fw-bold fs-4">
                        Edit Profile
                    </h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.profile') }}">User Profile</a></li>
                    <li class="breadcrumb-item active">Profile Edit</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- Content Header End -->
    <!-- Content Start -->
    <div class="content py-4">
        <div class="container-fluid">
            <div class="row">
                <!-- Profile Image and Info Start -->
                <div class="col-md-3">
                    <div class="card user-profile-card-left abg-dark text-light">
                        <div class="card-body">
                            <div class="text-center mb-3">
                                @if(Auth::guard('admin')->user()->photo == null)
                                    <img src="{{ asset('uploads/user.png') }}" alt="User Profile Photo" class="img-fluid rounded-circle user-profile-img">
                                    @else
                                    <img src="{{ asset('uploads/'.Auth::guard('admin')->user()->photo) }}" alt="User Profile Photo"  class="img-fluid rounded-circle user-profile-img">
                                @endif
                            </div>
                            <h5 class="card-title text-center mb-2">{{ Auth::guard('admin')->user()->name }}</h5>
                            <p class="card-text text-center text-light-low">Computer Lab Operator</p>
                            <ul class="list-group unboardered-list-group my-3">
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <b>Total Class</b>
                                    <span class="badge text-bg-primary rounded-pill">14</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <b>Weakly Class</b>
                                    <span class="badge text-bg-primary rounded-pill">2</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <b>Monthly Class</b>
                                    <span class="badge text-bg-primary rounded-pill">1</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- Profile Image and Info End -->
                <!-- Profile Details Start -->
                <div class="col-md-9">
                    <div class="card user-profile-card-right abg-dark text-light">
                        <h5 class="card-header">Details</h5>
                        <div class="card-body">
                            <form action="{{ route('admin.profile.submit') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3 row">
                                    <label for="staticName" class="col-sm-2 col-form-label">Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="name" class="form-control" id="staticName" value="{{ Auth::guard('admin')->user()->name }}">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="staticEmail" class="col-sm-2 col-form-label">Email</label>
                                    <div class="col-sm-10">
                                        <input type="email" name="email" class="form-control" id="staticEmail" value="{{ Auth::guard('admin')->user()->email }}">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="staticExperience" class="col-sm-2 col-form-label">Experience</label>
                                    <div class="col-sm-10">
                                        <input type="text" readonly class="form-control-plaintext" id="staticExperience" value="Experience Details">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="staticSkills" class="col-sm-2 col-form-label">Skills</label>
                                    <div class="col-sm-10">
                                        <input type="text" readonly class="form-control-plaintext" id="staticSkills" value="Skills Details">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="staticAddress" class="col-sm-2 col-form-label">Address</label>
                                    <div class="col-sm-10">
                                        <input type="text" readonly class="form-control-plaintext" id="staticAddress" value="Keshabpur, Jashore, Khulna">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="staticMobile" class="col-sm-2 col-form-label">Mobile</label>
                                    <div class="col-sm-10">
                                        <input type="text" readonly class="form-control-plaintext" id="staticMobile" value="01512-101010">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="password" class="col-sm-2 col-form-label">Password</label>
                                    <div class="col-sm-10">
                                        <input type="password" name="password" class="form-control" id="password" placeholder="Password" value="{{ old('password') }}">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="password" class="col-sm-2 col-form-label">Confirm Password</label>
                                    <div class="col-sm-10">
                                        <input type="password" name="confirmPassword" class="form-control" id="password" placeholder="Confirm Password" value="{{ old('confirmPassword') }}">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="userPhoto" class="col-sm-2 col-form-label">Change Photo</label>
                                    <div class="col-sm-10">
                                        <input type="file" name="photo" class="form-control" id="userPhoto">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <div class="col-sm-10">
                                        <button type="submit" class="btn btn-success">Update</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- Profile Details End -->
            </div>
        </div>
    </div>
    <!-- Content End -->
</main>
@include('admin.layouts.footer')
@endsection