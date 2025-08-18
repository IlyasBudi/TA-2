<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Lupa Password</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{ asset('/penyewatemplate') }}/assets/img/baru2/icon-xyz.svg" rel="icon">
  <link href="{{ asset('/penyewatemplate') }}/assets/img/baru2/icon-xyz2.svg" rel="icon">

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

  <!-- Custom CSS for Modern Auth -->
  <style>
    .auth-card {
      border-radius: 15px;
      box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
      border: none;
      overflow: hidden;
    }
    
    .auth-card .card-body {
      padding: 3rem 2.5rem;
    }
    
    .auth-logo {
      margin-bottom: 2rem;
    }
    
    .auth-title {
      font-weight: 600;
      color: #2c3e50;
      margin-bottom: 0.5rem;
    }
    
    .auth-subtitle {
      color: #7f8c8d;
      margin-bottom: 2rem;
    }
    
    .form-control {
      border-radius: 10px;
      border: 2px solid #e9ecef;
      padding: 0.75rem 1rem;
      transition: all 0.3s ease;
    }
    
    .form-control:focus {
      border-color: #4154f1;
      box-shadow: 0 0 0 0.2rem rgba(65, 84, 241, 0.25);
    }
    
    .btn-primary {
      background: linear-gradient(135deg, #4154f1 0%, #2c3cdd 100%);
      border: none;
      border-radius: 10px;
      padding: 0.75rem 2rem;
      font-weight: 600;
      transition: all 0.3s ease;
    }
    
    .btn-primary:hover {
      transform: translateY(-2px);
      box-shadow: 0 8px 25px rgba(65, 84, 241, 0.3);
    }
    
    .auth-links a {
      color: #4154f1;
      text-decoration: none;
      transition: all 0.3s ease;
    }
    
    .auth-links a:hover {
      color: #2c3cdd;
      text-decoration: underline;
    }
    
    .section.register {
      background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
      min-height: 100vh;
    }
    
    .input-group-text {
      border-radius: 10px 0 0 10px;
    }
    
    .input-group .form-control:not(:last-child) {
      border-radius: 0 10px 10px 0;
    }
    
    @media (max-width: 768px) {
      .auth-card .card-body {
        padding: 2rem 1.5rem;
      }
    }
  </style>

  <!-- =======================================================
  * Template Name: NiceAdmin
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Updated: Apr 20 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <main>
    <div class="container">

      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

              <div class="d-flex justify-content-center py-4">
                <a href="index.html" class="logo d-flex align-items-center w-auto">
                  
                  
                </a>
              </div><!-- End Logo -->

              <div class="card mb-3 auth-card">

                <div class="card-body">

                  <div class="pt-4 text-center pb-2 auth-logo">
                    <img src="{{ asset('/penyewatemplate') }}/assets/img/baru2/logo-xyz.svg" alt="" class="mb-3">
                    <h5 class="auth-title">Lupa Password?</h5>
                    <p class="auth-subtitle">Masukan email Anda untuk mendapatkan link reset password</p>
                  </div>

                  @if ($errors->any())
                    <div class="alert alert-danger rounded-3">
                      <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                        @endforeach
                      </ul>
                    </div>
                  @endif
                  
                  @if (session()->has('status'))
                    <div class="alert alert-success rounded-3">
                      <i class="bi bi-check-circle me-2"></i>{{ session()->get('status') }}
                    </div>
                  @endif
                  
                  <form class="row g-3 needs-validation" method="POST" action="{{ route('password.email') }}">
                    @csrf
                    <div class="col-12">
                      <label for="email" class="form-label fw-semibold">Email</label>
                      <div class="input-group has-validation">
                        <span class="input-group-text border-end-0" style="background: transparent; border-right: none;"><i class="bi bi-envelope"></i></span>
                        <input type="email" name="email" class="form-control border-start-0 @error('email') is-invalid @enderror" id="email" placeholder="Masukkan alamat email Anda" value="{{ old('email') }}" required style="border-left: none;">
                        @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                      </div>
                    </div>

                    <div class="col-12 mt-4">
                      <button class="btn btn-primary w-100" type="submit">
                        <i class="bi bi-send me-2"></i>Kirim Link Reset
                      </button>
                    </div>
                    
                    <div class="col-12 text-center auth-links">
                      <a href="{{ route('login') }}">
                        <i class="bi bi-arrow-left me-1"></i>Kembali ke Login
                      </a>
                    </div>
                  </form>

                </div>
              </div>

              {{-- <div class="credits">
                <!-- All the links in the footer should remain intact. -->
                <!-- You can delete the links only if you purchased the pro version. -->
                <!-- Licensing information: https://bootstrapmade.com/license/ -->
                <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
                Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
              </div> --}}

            </div>
          </div>
        </div>

      </section>

    </div>
  </main><!-- End #main -->

  {{-- <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a> --}}

  <!-- Vendor JS Files -->
  <script src="{{ asset('/niceadmin') }}/assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="{{ asset('/niceadmin') }}/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="{{ asset('/niceadmin') }}/assets/vendor/chart.js/chart.umd.js"></script>
  <script src="{{ asset('/niceadmin') }}/assets/vendor/echarts/echarts.min.js"></script>
  <script src="{{ asset('/niceadmin') }}/assets/vendor/quill/quill.js"></script>
  <script src="{{ asset('/niceadmin') }}/assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="{{ asset('/niceadmin') }}/assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="{{ asset('/niceadmin') }}/assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="{{ asset('/niceadmin') }}/assets/js/main.js"></script>

</body>

</html>