<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
      
        <title>Po. Haryanto Pariwisata | @yield('title')</title>
        <meta content="" name="description">
        <meta content="" name="keywords">
      
        <!-- Favicons -->
        <link href="{{ asset('/penyewatemplate') }}/assets/img/baru/icon-hr.svg" rel="icon">
        <link href="{{ asset('/penyewatemplate') }}/assets/img/baru/icon-hr2.svg" rel="icon">
      
        <!-- Google Fonts -->
        <link href="https://fonts.gstatic.com" rel="preconnect">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
      
        <!-- Vendor CSS Files -->
        <link href="{{ asset('/niceadmin') }}/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="{{ asset('/niceadmin') }}/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
        <link href="{{ asset('/niceadmin') }}/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
        <link href="{{ asset('/niceadmin') }}/assets/vendor/quill/quill.snow.css" rel="stylesheet">
        <link href="{{ asset('/niceadmin') }}/assets/vendor/quill/quill.bubble.css" rel="stylesheet">
        <link href="{{ asset('/niceadmin') }}/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
        <link href="{{ asset('/niceadmin') }}/assets/vendor/simple-datatables/style.css" rel="stylesheet">
      
        <!-- Template Main CSS File -->
        <link href="{{ asset('/niceadmin') }}/assets/css/style.css" rel="stylesheet">

        <link href="{{ asset('v1/vendor/jquery-nice-select/css/nice-select.css') }}" rel="stylesheet">
        @stack('before-style')
        <link href="{{ asset('v1/css/style.css') }}" rel="stylesheet">
        @stack('after-style')


      </head>

      <body>

        <div class="wrapper">
            <!-- Header -->
            @include('staff.layouts.navbar')
            <!-- End Header -->

            <!-- Sidebar -->
            @include('staff.layouts.sidebar')
            <!-- End Sidebar -->

            <main id="main" class="main">
                <div class="content-wrapper">
                    <!-- Content Header (Page header) -->
                    <div class="content-header">
                        <div class="container-fluid">
                            @yield('header')
                        </div><!-- /.container-fluid -->
                    </div>
                    <!-- /.content-header -->

                    <!-- Main content -->
                    <section class="content">
                        <div class="container-fluid">
                            <!-- Info boxes -->
                            @yield('content')
                        </div><!--/. container-fluid -->
                    </section>
                    <!-- /.content -->
                </div>
            </main>

            <!-- Footer -->
            @include('staff.layouts.footer')
            <!-- End Footer -->
        </div>
        
        <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

        <!-- Vendor JS Files -->
        <script src="{{ asset('/niceadmin') }}/ssets/vendor/apexcharts/apexcharts.min.js"></script>
        <script src="{{ asset('/niceadmin') }}/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="{{ asset('/niceadmin') }}/assets/vendor/chart.js/chart.umd.js"></script>
        <script src="{{ asset('/niceadmin') }}/assets/vendor/echarts/echarts.min.js"></script>
        <script src="{{ asset('/niceadmin') }}/assets/vendor/quill/quill.js"></script>
        <script src="{{ asset('/niceadmin') }}/assets/vendor/simple-datatables/simple-datatables.js"></script>
        <script src="{{ asset('/niceadmin') }}/assets/vendor/tinymce/tinymce.min.js"></script>
        <script src="{{ asset('/niceadmin') }}/assets/vendor/php-email-form/validate.js"></script>

        <!-- Template Main JS File -->
        <script src="{{ asset('/niceadmin') }}/assets/js/main.js"></script>

        <script src="{{ asset('v1/vendor/global/global.min.js') }}"></script>
        <script src="{{ asset('v1/vendor/jquery-nice-select/js/jquery.nice-select.min.js') }}"></script>
        @stack('before-scripts')
        <script src="{{ asset('v1/js/custom.min.js') }}"></script>
        <script src="{{ asset('v1/js/dlabnav-init.js') }}"></script>
        @stack('after-scripts')
      </body>
</html>