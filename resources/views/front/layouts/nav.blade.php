<header id="header" class="header d-flex align-items-center fixed-top">
    <div class="header-container container-fluid container-xl position-relative d-flex align-items-center justify-content-between">

      <a href="index.html" class="logo d-flex align-items-center me-auto me-xl-0">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <!-- <img src="assets/img/logo.webp" alt=""> -->
        <h1 class="sitename">TheProperty</h1>
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="{{ route('front.home') }}" class="{{ Request::is('/') ? 'active' : '' }}">Home</a></li>
          <li><a href="{{ route('front.about') }}" class="{{ Request::is('about') ? 'active' : '' }}">About</a></li>
          <li><a href="properties.html">Properties</a></li>
          <li><a href="agents.html">Agents</a></li>
          <li><a href="{{ route('front.locations') }}" class="{{ Request::is('pricing') ? 'active' : '' }}">Locations</a></li>
          <li><a href="{{ route('front.pricing') }}" class="{{ Request::is('pricing') ? 'active' : '' }}">Pricing</a></li>
          <li><a href="blog.html">Blog</a></li>
          <li><a href="{{ route('front.contact') }}" class="{{ Request::is('contact') ? 'active' : '' }}">Contact</a></li>
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>

      @if(Auth::guard('web')->check())
      <a class="btn-getstarted" href="{{ route('dashboard') }}">Customer Dashboard</a>
      @elseif(Auth::guard('agent')->check())
      <a class="btn-getstarted" href="{{ route('agent.dashboard') }}">Agent Dashboard</a>
      @else
      <a class="btn-getstarted" href="{{ route('select.user') }}">Login</a>
      @endif
    </div>
</header>