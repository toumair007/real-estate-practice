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
                        Create Location
                    </h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.package.index') }}">Location</a></li>
                    <li class="breadcrumb-item active">Create Location</li>
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
                    <a href="{{ route('admin.location.index') }}" class="btn btn-success mb-3 float-end">Back</a>
                </div>
                <!-- Table Start -->
                <div class="col-12 col-md-12">
                    <!-- Start Card -->
                    <div class="create-package abg-dark text-light shadow p-2 rounded-2">
                        <form action="{{ route('admin.location.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <label for="name" class="form-label">Location Name <span>*</span></label>
                                    <input type="text" name="name" class="form-control" id="name" value="{{ old('name') }}">
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="slug" class="form-label">Slug <span>*</span></label>
                                    <input type="text" name="slug"  class="form-control" id="slug" value="{{ old('slug') }}">
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="photo" class="form-label">Photo <span>*</span></label>
                                    <input type="file" name="photo" class="form-control" id="photo">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 mt-3 text-center">
                                    <button type="submit" class="btn btn-success">Submit</button>
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