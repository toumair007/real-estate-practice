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
                        Edit Packages
                    </h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.package.index') }}">Packages</a></li>
                    <li class="breadcrumb-item active">Edit Packages</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- Content Header End -->
    <!-- Content Start -->
    <div class="content py-4">
        <div class="container-fluid">
            <!-- Card Start -->
            <div class="row">
                <div class="col-12">
                    <a href="{{ route('admin.package.index') }}" class="btn btn-success mb-3 float-end">Back</a>
                </div>
                <!-- Table Start -->
                <div class="col-12 col-md-12">
                    <!-- Start Card -->
                    <div class="create-package abg-dark text-light shadow p-2 rounded-2">
                        <form action="{{ route('admin.package.update', $package->id) }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <label for="name" class="form-label">Name <span>*</span></label>
                                    <input type="text" name="name" class="form-control" id="name" value="{{ $package->name }}">
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="price" class="form-label">Price <span>*</span></label>
                                    <input type="number" name="price"  class="form-control" id="price" value="{{ $package->price }}">
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="days" class="form-label">Allowed Days <span>*</span></label>
                                    <input type="number" name="allowed_days" class="form-control" id="days" value="{{ $package->allowed_days }}">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="allowed_properties" class="form-label">Allowed Properties <span>*</span></label>
                                    <input type="number" name="allowed_properties" class="form-control" id="allowed_properties" value="{{ $package->allowed_properties }}">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="allowed_f_properties" class="form-label">Allowed Featured Properties <span>*</span></label>
                                    <input type="number" name="allowed_f_properties" placeholder="Allowed Featured Properties" class="form-control" id="allowed_f_properties" value="{{ $package->allowed_f_properties }}">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="allowed_photos" class="form-label">Allowed Photos <span>*</span></label>
                                    <input type="number" name="allowed_photos" placeholder="Allowed Photos" class="form-control" id="allowed_photos" value="{{ $package->allowed_photos }}">
                                </div>
                                <div class="col-12 col-md-6 mb-3">
                                    <label for="allowed_videos" class="form-label">Allowed Videos <span>*</span></label>
                                    <input type="number" name="allowed_videos" placeholder="Allowed Videos" class="form-control" id="allowed_videos" value="{{ $package->allowed_videos }}">
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
                <!-- Table End -->
            </div>
        </div>
    </div>
</main>
@include('admin.layouts.footer')
@endsection