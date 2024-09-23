<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Pages / Register - NiceAdmin Bootstrap Template</title>
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
                  <img src="{{ asset('/penyewatemplate') }}/assets/img/baru/logo-hr.svg" alt="">
                  
                </a>
              </div><!-- End Logo -->

              <div class="card mb-3">

                <div class="card-body">

                  <div class="pt-4 pb-2">
                    {{-- <img src="{{ asset('/landingpagetemplate') }}/assets/images/baru/logo-hr.svg" alt=""> --}}
                    <h5 class="card-title text-center pb-0 fs-4">Buat Akun Baru</h5>
                    <p class="text-center small">Masukan datamu untuk buat akun baru</p>
                  </div>

                  <form class="row g-3 needs-validation" method="POST" action="{{ route('do.penyewaregister') }}">
                    @csrf
                    <div class="col-12">
                      <label for="name" class="form-label">Nama</label>
                      <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="yourName" required>
                      @error('name')
                      <div id="nameHelp" class="form-text">{{ $message }}</div>
                      @enderror
                    </div>

                    <div class="col-12">
                      <label for="email" class="form-label">Email</label>
                      <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="yourEmail" required>
                      {{-- <div class="invalid-feedback">Please enter a valid Email adddress!</div> --}}
                      @error('email')
                      <div id="emailHelp" class="form-text">{{ $message }}</div>
                      @enderror
                    </div>

                    <div class="col-12">
                      <label for="phone_number" class="form-label">Nomor Telepon</label>
                      <div class="input-group has-validation">
                        
                        <input type="text" name="phone_number" class="form-control @error('phone_number') is-invalid @enderror" id="phone_number" required>
                        {{-- <div class="invalid-feedback">Please input phone number.</div> --}}
                        @error('phone_number')
                        <div id="phone_numberHelp" class="form-text">{{ $message }}</div>
                        @enderror
                      </div>
                    </div>

                    <div class="col-12">
                        <label for="address" class="form-label">Alamat</label>
                          
                          <input type="text" name="address" class="form-control @error('address') is-invalid @enderror" id="address" required>
                          {{-- <div class="invalid-feedback">Please input address.</div> --}}
                          @error('address')
                          <div id="addressHelp" class="form-text">{{ $message }}</div>
                          @enderror
                       
                    </div>

                    <div class="col-12">
                      <label for="yourPassword" class="form-label">Password</label>
                      <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="yourPassword" required>
                      {{-- <div class="invalid-feedback">Please enter your password!</div> --}}
                      @error('password')
                      <div id="passwordHelp" class="form-text">{{ $message }}</div>
                      @enderror
                    </div>

                    <div class="col-12">
                        <label for="yourPassword" class="form-label">Confirm Password</label>
                        <input type="password" name="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror" id="password_confirmation" required>
                        {{-- <div class="invalid-feedback">Please enter your password!</div> --}}
                        @error('password_confirmation')
                        <div id="passwordConfirmationHelp" class="form-text">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- <div class="col-12">
                      <div class="form-check">
                        <input class="form-check-input" name="terms" type="checkbox" value="" id="acceptTerms" required>
                        <label class="form-check-label" for="acceptTerms">I agree and accept the <a href="#">terms and conditions</a></label>
                        <div class="invalid-feedback">You must agree before submitting.</div>
                      </div>
                    </div> --}}
                    <div class="col-12">
                      <button class="btn btn-primary w-100" type="submit">Daftar</button>
                    </div>
                    <div class="col-12">
                      <p class="small mb-0">Sudah punya akun? <a href="{{ route('login') }}">Log in</a></p>
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