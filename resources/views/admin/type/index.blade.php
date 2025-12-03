@extends('admin.layouts.master')

@section('main_content')
@include('admin.layouts.nav')
@include('admin.layouts.sidebar')
<main class="main bg-dark text-light" id="main-content">
    <!-- Content Header Start -->
    <div class="content-header pt-4">
        <div class="container-fluid">
            <div class="row align-items-center shadow py-2">
                <div class="col-sm-6">
                    <h3 class="fw-bold fs-4">
                        Types
                    </h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item active">Types</li>
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
                    <a href="{{ route('admin.type.create') }}" class="btn btn-success mb-3 float-end">Add New</a>
                </div>
                <!-- Table Start -->
                <div class="col-12 col-md-12">
                    <table class="table table-dark table-bordered table-hover shadow" id="adminPackages">
                        <thead>
                            <tr>
                                <th scope="col">SL</th>
                                <th scope="col">Name</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($propertyTypes as $propertyType)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>{{ $propertyType->name }}</td>
                                    <td>
                                        <a href="{{ route('admin.type.edit', $propertyType->id) }}" class="bg-success text-light p-2 rounded-2"><i class="bi bi-pencil-square"></i></a>
                                        <a href="{{ route('admin.type.delete', $propertyType->id) }}" class="bg-danger text-light p-2 rounded-2" onclick="return confirm('Are you sure?');"><i class="bi bi-trash"></i></a>
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