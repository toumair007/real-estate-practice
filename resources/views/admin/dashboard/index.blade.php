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
                        Dashboard
                    </h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
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
                <div class="col-12 col-md-3">
                    <div class="card dash-card abg-dark text-light shadow">
                        <div class="card-body py-4">
                            <h6 class="mb-2 fw-bold">
                                Member Progress
                            </h6>
                            <p class="fw-bold mb-2">
                                $8900
                            </p>
                            <div class="mb-0">
                                <span class="bagde text-success me-2">+9.0%</span>
                                <span class="fw-blod">Since Last Month</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-3">
                    <div class="card dash-card abg-dark text-light shadow">
                        <div class="card-body py-4">
                            <h6 class="mb-2 fw-bold">
                                Member Progress
                            </h6>
                            <p class="fw-bold mb-2">
                                $8900
                            </p>
                            <div class="mb-0">
                                <span class="bagde text-success me-2">+9.0%</span>
                                <span class="fw-blod">Since Last Month</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-3">
                    <div class="card dash-card abg-dark text-light shadow">
                        <div class="card-body py-4">
                            <h6 class="mb-2 fw-bold">
                                Member Progress
                            </h6>
                            <p class="fw-bold mb-2">
                                $8900
                            </p>
                            <div class="mb-0">
                                <span class="bagde text-success me-2">+9.0%</span>
                                <span class="fw-blod">Since Last Month</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-3">
                    <div class="card dash-card abg-dark text-light shadow">
                        <div class="card-body py-4">
                            <h6 class="mb-2 fw-bold">
                                Member Progress
                            </h6>
                            <p class="fw-bold mb-2">
                                $8900
                            </p>
                            <div class="mb-0">
                                <span class="bagde text-success me-2">+9.0%</span>
                                <span class="fw-blod">Since Last Month</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Card End -->
            <!-- Table and Chart Start -->
            <div class="row">
                <!-- Table Start -->
                <div class="col-12 col-md-7">
                    <h3 class="fw-bold fs-4 my-3">Users</h3>
                    <table class="table table-dark table-bordered table-hover shadow">
                        <thead>
                            <tr>
                            <th scope="col">#</th>
                            <th scope="col">First</th>
                            <th scope="col">Last</th>
                            <th scope="col">Handle</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                            <th scope="row">1</th>
                            <td>Mark</td>
                            <td>Otto</td>
                            <td>@mdo</td>
                            </tr>
                            <tr>
                            <th scope="row">2</th>
                            <td>Jacob</td>
                            <td>Thornton</td>
                            <td>@fat</td>
                            </tr>
                            <tr>
                            <th scope="row">3</th>
                            <td>Larry</td>
                            <td>The Bird</td>
                            <td>@twitter</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <!-- Table End -->
                <!-- Chart Start -->
                <div class="col-12 col-md-5">
                    <h3 class="fw-bold fs-4 my-3">Reports Overview</h3>
                    <div class="shadow abg-dark">
                        <canvas id="myChart" width="800" height="450"></canvas>
                    </div>
                </div>
                <!-- Chart End -->
            </div>
            <!-- Table and Chart End -->
        </div>
    </div>
    <!-- Content End -->
</main>
@include('admin.layouts.footer')
@endsection