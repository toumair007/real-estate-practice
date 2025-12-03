@extends('front.layouts.master')

@section('main_content')
<main class="main">
    <!-- Page Title -->
    <div class="page-title hero-image" style="background-image: url({{ asset('uploads/bg/abstract-bg-3.webp') }}), radial-gradient(#ddd, #ccc);">
        <div class="heading">
            <div class="container">
                <div class="row d-flex justify-content-center text-center text-light">
                    <div class="col-lg-8">
                        <h1 class="heading-title text-light">Agent Payment</h1>
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
                    <li class="current">Agent Payment</li>
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
                    <div class="user-top-section">
                        <h3>Current Plan</h3>
                    </div>
                    <!-- Start Card -->
                    <div class="row">
                        <div class="col-4">
                            <div class="card bg-primary mb-3 shadow">
                                <div class="card-body">
                                    <h3 class="card-title fw-bold text-light"><span>$</span>19</h3>
                                    <p class="card-text fw-bold">Basic</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Card -->
                    <!-- Start Recent Properties -->
                    <div class="recent-properties mt-4">
                        <h3>Upgrade Plan (Make Payment)</h3>
                        <table class="table table-bordered shadow">
                            <tbody>
                                <tr>
                                    <form action="" method="POST">
                                        @csrf
                                        <td>
                                            <select name="package_id" class="form-select">
                                                @foreach ($packages as $package)
                                                    <option value="{{ $package->id }}">{{ $package->name }} ( ${{ $package->price }} )</option>
                                                @endforeach
                                            </select>
                                        </td>
                                        <td>
                                            <button type="submit" class="btn btn-secondary">Pay with Paypal</button>
                                        </td>
                                    </form>
                                </tr>
                                <tr>
                                    <form action="" method="POST">
                                        @csrf
                                        <td>
                                            <select name="package_id" class="form-select">
                                                @foreach ($packages as $package)
                                                    <option value="{{ $package->id }}">{{ $package->name }} ( ${{ $package->price }} )</option>
                                                @endforeach
                                            </select>
                                        </td>
                                        <td>
                                            <button type="submit" class="btn btn-secondary">Pay with Card</button>
                                        </td>
                                    </form>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <!-- End Recent Properties -->
                </div>
                <!-- End Right Side -->
            </div>
        </div>
    </section>
@endsection