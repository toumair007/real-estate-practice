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
                        Locations
                    </h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item active">Locations</li>
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
                    <a href="{{ route('admin.location.create') }}" class="btn btn-success mb-3 float-end">Add New</a>
                </div>
                <!-- Table Start -->
                <div class="col-12 col-md-12">
                    <table class="table table-dark table-bordered table-hover shadow" id="adminPackages">
                        <thead>
                            <tr>
                                <th scope="col">SL</th>
                                <th scope="col">Photo</th>
                                <th scope="col">Name</th>
                                <th scope="col">Slug</th>
                                <th scope="col">Total Properties</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($locations as $location)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>
                                        <img src="{{ asset('uploads/location/'.$location->photo) }}" alt="" class="img-fluid w-50">
                                    </td>
                                    <td>{{ $location->name }}</td>
                                    <td><span></span>{{ $location->slug }}</td>
                                    <td>{{ $location->totalProperties }}</td>
                                    <td>
                                        <a href="{{ route('admin.location.edit', $location->id) }}" class="bg-success text-light p-2 rounded-2"><i class="bi bi-pencil-square"></i></a>
                                        <a href="{{ route('admin.location.delete', $location->id) }}" class="bg-danger text-light p-2 rounded-2" onclick="return confirm('Are you sure?');"><i class="bi bi-trash"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- Table End -->
            </div>
        </div>
    </div>
</main>
@include('admin.layouts.footer')
@endsection