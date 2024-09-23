<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Po Haryanto Pariwisata | @yield('title')</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <!-- Favicons -->
  <link href="{{ asset('/penyewatemplate') }}/assets/img/baru/icon-hr.svg" rel="icon">
  <link href="{{ asset('/penyewatemplate') }}/assets/img/baru/icon-hr2.svg" rel="icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('/penyewatemplate') }}/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="{{ asset('/penyewatemplate') }}/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="{{ asset('/penyewatemplate') }}/assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="{{ asset('/penyewatemplate') }}/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="{{ asset('/penyewatemplate') }}/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="{{ asset('/penyewatemplate') }}/assets/css/main.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Append
  * Template URL: https://bootstrapmade.com/append-bootstrap-website-template/
  * Updated: Jun 29 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->

  <link href="{{ asset('v1/vendor/jquery-nice-select/css/nice-select.css') }}" rel="stylesheet">
  @stack('before-style')
  <link href="{{ asset('v1/css/style.css') }}" rel="stylesheet">
  @stack('after-style')

  @yield('styles')

</head>

<body>

    <!-- ======= Navbar ======= -->
    @include('penyewa.layouts.navbar')

    <!-- ======= Main Content ======= -->
    <main class="main">
        @yield('content')
    </main>

    <!-- ======= Footer ======= -->
    @include('penyewa.layouts.footer')

    <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Preloader -->
  {{-- <div id="preloader"></div> --}}

  <!-- Vendor JS Files -->
  <script src="{{ asset('/penyewatemplate') }}/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="{{ asset('/penyewatemplate') }}/assets/vendor/php-email-form/validate.js"></script>
  <script src="{{ asset('/penyewatemplate') }}/assets/vendor/aos/aos.js"></script>
  <script src="{{ asset('/penyewatemplate') }}/assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="{{ asset('/penyewatemplate') }}/assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="{{ asset('/penyewatemplate') }}/assets/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
  <script src="{{ asset('/penyewatemplate') }}/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="{{ asset('/penyewatemplate') }}/assets/vendor/swiper/swiper-bundle.min.js"></script>

  <!-- Main JS File -->
  <script src="{{ asset('/penyewatemplate') }}/assets/js/main.js"></script>
  <script src="{{ asset('v1/vendor/global/global.min.js') }}"></script>
    <script src="{{ asset('v1/vendor/jquery-nice-select/js/jquery.nice-select.min.js') }}"></script>
    @stack('before-scripts')
    <script src="{{ asset('v1/js/custom.min.js') }}"></script>
    <script src="{{ asset('v1/js/dlabnav-init.js') }}"></script>
    @stack('after-scripts')
  {{-- <script src="https://code.jquery.com/jquery-3.6.4.slim.js"
        integrity="sha256-dWvV84T6BhzO4vG6gWhsWVKVoa4lVmLnpBOZh/CAHU4=" crossorigin="anonymous"></script> --}}

  <script>
    document.addEventListener('DOMContentLoaded', function() {
        var dropdownToggle = document.querySelector('.btn-getstarted.dropdown-toggle');
        var dropdownMenu = document.querySelector('.dropdown-menu');

        dropdownToggle.addEventListener('click', function(event) {
            event.preventDefault();
            var isDisplayed = window.getComputedStyle(dropdownMenu).display !== 'none';
            dropdownMenu.style.display = isDisplayed ? 'none' : 'block';
        });
    });
  </script>
  {{-- <script
    src="https://code.jquery.com/jquery-3.7.1.min.js"
    integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo="
    crossorigin="anonymous"></script> --}}
</body>