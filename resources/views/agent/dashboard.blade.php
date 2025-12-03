@extends('front.layouts.master')

@section('main_content')
<main class="main">
    <!-- Page Title -->
    <div class="page-title hero-image" style="background-image: url({{ asset('uploads/bg/abstract-bg-3.webp') }}), radial-gradient(#ddd, #ccc);">
      <div class="heading">
        <div class="container">
          <div class="row d-flex justify-content-center text-center text-light">
            <div class="col-lg-8">
              <h1 class="heading-title text-light">Agent Dashboard</h1>
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
            <li class="current">Agent Dashboard</li>
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
                  <h3>Hello, {{ Auth::guard('agent')->user()->name }}</h3>
                  <p>
                    See all the statistics at a glance:
                  </p>
                </div>
                <!-- Start Card -->
                <div class="row">
                  <div class="col-4">
                    <div class="card bg-primary mb-3 shadow">
                      <div class="card-body">
                        <h3 class="card-title fw-bold text-light">12</h3>
                        <p class="card-text fw-bold">Active Properties</p>
                        <a href="#" class="btn btn-primary bg-gradient">View All</a>
                      </div>
                    </div>
                  </div>
                  <div class="col-4">
                    <div class="card bg-secondary mb-3 shadow">
                      <div class="card-body">
                        <h3 class="card-title fw-bold text-light">3</h3>
                        <p class="card-text fw-bold">Pending Properties</p>
                        <a href="#" class="btn btn-secondary bg-gradient">View All</a>
                      </div>
                    </div>
                  </div>
                  <div class="col-4">
                    <div class="card bg-success mb-3 shadow">
                      <div class="card-body">
                        <h3 class="card-title fw-bold text-light">5</h3>
                        <p class="card-text fw-bold">Featured Properties</p>
                        <a href="#" class="btn btn-success bg-gradient">View All</a>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- End Card -->
                <!-- Start Recent Properties -->
                <div class="row">
                  <div class="col-12 mt-4">
                    <h3>Recent Properties</h3>
                    <div class="recent-properties shadow p-2 rounded-2">
                      <table class="table table-bordered">
                        <thead>
                          <tr>
                            <th scope="col">SL</th>
                            <th scope="col">Name</th>
                            <th scope="col">Category</th>
                            <th scope="col">Location</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <th scope="row">1</th>
                            <td>Mark</td>
                            <td>Otto</td>
                            <td>@mdo</td>
                            <td><span class="badge text-bg-success">Active</span></td>
                            <td>
                              <a href="#" class="bg-success text-light p-2 rounded-2"><i class="bi bi-pencil-square"></i></a>
                              <a href="#" class="bg-danger text-light p-2 rounded-2"><i class="bi bi-trash"></i></a>
                            </td>
                          </tr>
                          <tr>
                            <th scope="row">2</th>
                            <td>Jacob</td>
                            <td>Thornton</td>
                            <td>@fat</td>
                            <td><span class="badge text-bg-danger">Pending</span></td>
                            <td>
                              <a href="#" class="bg-success text-light p-2 rounded-2"><i class="bi bi-pencil-square"></i></a>
                              <a href="#" class="bg-danger text-light p-2 rounded-2"><i class="bi bi-trash"></i></a>
                            </td>
                          </tr>
                          <tr>
                            <th scope="row">3</th>
                            <td>John</td>
                            <td>Doe</td>
                            <td>@social</td>
                            <td><span class="badge text-bg-danger">Pending</span></td>
                            <td>
                              <a href="#" class="bg-success text-light p-2 rounded-2"><i class="bi bi-pencil-square"></i></a>
                              <a href="#" class="bg-danger text-light p-2 rounded-2"><i class="bi bi-trash"></i></a>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
                <!-- End Recent Properties -->
            </div>
            <!-- End Right Side -->
        </div>
      </div>
    </section>
    <!-- Starter Section Section -->
</main>
@endsection