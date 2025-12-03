<nav class="top-nav navbar navbar-expand p-3 bg-dark text-light shadow" id="topnav">
    <form action="" method="post" class="d-none d-sm-inline-block">
        <div class="input-group input-group-navbar">
            <input type="text" name="search" id="search" class="form-control border-0 rounded-0 pe-0" placeholder="Search..." aria-label="Search">
            <button type="button" class="btn border-0 rounded-0">
                <i class="bi bi-search"></i>    
            </button>
        </div>
    </form>
    <div class="navbar-collapse collapse">
        <ul class="navbar-nav ms-auto">
            <li class="nav-item">
                <a href="{{ route('front.home') }}" target="_blank" class="btn btn-success me-3">
                    <i class="bi bi-globe"></i>
                    <span>Front End</span>
                </a>
            </li>
            <li class="nav-item dropdown">
                <a href="#" data-bs-toggle="dropdown" class="toggle-nav-btn pe-md-0">
                    @if(Auth::guard('admin')->user()->photo == null)
                        <img src="{{ asset('uploads/user.png') }}" alt="User Profile Photo" class="avatar img-fluid rounded-circle" width="40px" />
                        @else
                        <img src="{{ asset('uploads/'.Auth::guard('admin')->user()->photo) }}" alt="User Photo" class="avatar img-fluid rounded-circle" width="40px" />
                    @endif
                    <span class="text-light fs-6 ps-1">
                        <i id="nav-icon" class="bi bi-chevron-down"></i>
                    </span>
                </a>
                <div class="dropdown-menu dropdown-menu-end rounded-0 border-0 bg-dark shadow mt-3">
                    <a href="{{ route('admin.profile') }}" class="dropdown-item text-light">
                        <i class="bi bi-person-square"></i>
                        <span>Profile</span>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="{{ route('admin.logout') }}" class="dropdown-item text-light">
                        <i class="bi bi-box-arrow-left"></i>
                        <span>Logout</span>
                    </a>
                    <a href="#" class="dropdown-item text-light">
                        <i class="bi bi-question-circle"></i>
                        <span>Help Center</span>
                    </a>
                </div>
            </li>
        </ul>
    </div>
</nav>