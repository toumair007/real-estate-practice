<aside class="abg-dark" id="sidebar">
    <!-- Brand Logo -->
    <div class="d-flex justify-content-between p-4">
        <div class="brand-logo">
            <a href="{{ route('admin.dashboard') }}">Admin</a>
        </div>
        <button class="toggle-btn border-0" type="button">
            <i id="icon" class="bi bi-chevron-double-left"></i>
        </button>
    </div>
    <!-- Start Sidebar Menu -->
    <ul class="sidebar-nav" id="sidebarMenu">
        <li class="sidebar-item">
            <a href="{{ route('admin.dashboard') }}" class="{{ Request::is('admin/dashboard') ? 'active' : '' }} sidebar-link">
                <i class="bi bi-house-door"></i>
                <span>Dashboard</span>
            </a>
        </li>
        <li class="sidebar-item">
            <a href="{{ route('admin.package.index') }}" class="{{ request()->routeIs('admin.package.*') ? 'active' : '' }} sidebar-link">
                <i class="bi bi-card-list"></i>
                <span>Package</span>
            </a>
        </li>
        <li class="sidebar-item">
            <a href="{{ route('admin.profile') }}" class="{{ Request::is('admin/profile') ? 'active' : '' }} sidebar-link">
                <i class="bi bi-person-square"></i>
                <span>Profile</span>
            </a>
        </li>
        <li class="sidebar-item">
            <a href="#" class="{{ request()->routeIs('admin.location.*') || request()->routeIs('admin.type.*') || request()->routeIs('admin.amenity.*') ? 'collapsed active' : '' }} sidebar-link has-dropdown" data-bs-toggle="collapse" data-bs-target="#auth" aria-expanded="{{ request()->routeIs('admin.location.*') || request()->routeIs('admin.type.*') || request()->routeIs('admin.amenity.*') ? 'true' : 'false' }}" aria-controls="auth">
                <i class="bi bi-bug-fill"></i>
                <span>Property</span>
            </a>
            <ul id="auth" class="sidebar-dropdown list-unstyled collapse {{ request()->routeIs('admin.location.*') || request()->routeIs('admin.type.*') || request()->routeIs('admin.amenity.*') ? 'show' : '' }}" data-bs-parent="#sidebar">
                <li class="sidebar-item">
                    <a href="{{ route('admin.location.index') }}" class="{{ request()->routeIs('admin.location.index') ? 'active' : '' }} sidebar-link">
                        <i class="bi bi-circle"></i>
                        <span>Location</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="{{ route('admin.type.index') }}" class="{{ request()->routeIs('admin.type.index') ? 'active' : '' }} sidebar-link">
                        <i class="bi bi-circle"></i>
                        <span>Type</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="{{ route('admin.amenity.index') }}" class="{{ request()->routeIs('admin.amenity.index') ? 'active' : '' }} sidebar-link">
                        <i class="bi bi-circle"></i>
                        <span>Amenity</span>
                    </a>
                </li>
            </ul>
        </li>
        {{-- <li class="sidebar-item">
            <a href="#" class="sidebar-link">
                <i class="bi bi-list-task"></i>
                <span>Task</span>
            </a>
        </li>
        <li class="sidebar-item">
            <a href="#" class="sidebar-link collapsed has-dropdown" data-bs-toggle="collapse" data-bs-target="#forms" aria-expanded="false" aria-controls="forms">
                <i class="bi bi-pencil-square"></i>
                <span>Forms</span>
            </a>
            <ul id="forms" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                <li class="sidebar-item">
                    <a href="general.html" class="sidebar-link">
                        <i class="bi bi-circle"></i>
                        <span>General Elements</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="validation.html" class="sidebar-link">
                        <i class="bi bi-circle"></i>
                        <span>Validation</span>
                    </a>
                </li>
            </ul>
        </li>
        <li class="sidebar-item">
            <a href="#" class="sidebar-link collapsed has-dropdown" data-bs-toggle="collapse" data-bs-target="#pages" aria-expanded="false" aria-controls="pages">
                <i class="bi bi-pencil-square"></i>
                <span>Pages</span>
            </a>
            <ul id="pages" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                <li class="sidebar-item">
                    <a href="profile.html" class="sidebar-link">
                        <i class="bi bi-circle"></i>
                        <span>Profile</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="invoice.html" class="sidebar-link">
                        <i class="bi bi-circle"></i>
                        <span>Invoice</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="404.html" class="sidebar-link">
                        <i class="bi bi-circle"></i>
                        <span>404</span>
                    </a>
                </li>
            </ul>
        </li>
        <li class="sidebar-item">
            <a href="#" class="sidebar-link">
                <i class="bi bi-bell-fill"></i>
                <span>Notification</span>
            </a>
        </li>
        <li class="sidebar-item">
            <a href="#" class="sidebar-link">
                <i class="bi bi-gear"></i>
                <span>Settings</span>
            </a>
        </li> --}}
    </ul>
    <!-- End Sidebar Menu -->
    <div class="sidebar-footer">
        <a href="{{ route('admin.logout') }}" class="sidebar-link">
            <i class="bi bi-box-arrow-left"></i>
            <span>Log Out</span>
        </a>
    </div>
</aside>