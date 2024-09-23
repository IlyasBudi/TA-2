<header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid position-relative d-flex align-items-center justify-content-between">

      <a href="index.html" class="logo d-flex align-items-center me-auto me-xl-0">
        <!-- Uncomment the line below if you also wish to use an image logo -->
         <img src="{{ asset('/penyewatemplate') }}/assets/img/baru/logo-hr.svg" alt=""> 
        {{-- <h1 class="sitename">Append</h1><span>.</span> --}}
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="/" class="active">Home</a></li>
          <li><a href="/bookingpage">Booking</a></li>
          <li><a href="/about">About Us</a></li>
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>

      {{-- <a class="btn-getstarted" href="index.html#about">Get Started</a> --}}
      @auth
      <a class="btn-getstarted dropdown-toggle" href="#" type="button" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
        {{ Auth::user()->name }}
      </a>
      
      <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
        <a class="dropdown-item" href="/profile/{{ Auth::user()->id }}">Profile</a>
        <a class="dropdown-item" href="/logout">Logout</a>
      </div>
      @endauth
      @guest
      <a class="btn-getstarted" href="/login" type="button">
        Login
      </a>
      @endguest
    </div>
</header>