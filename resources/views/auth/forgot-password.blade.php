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

  <!-- Bootstrap Icons -->
  <link href="{{ asset('/niceadmin') }}/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">

  <!-- Vite CSS -->
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="auth-gradient-bg">
  <main class="flex items-center justify-center min-h-screen p-4">
    <div class="w-full max-w-md">
      <!-- Logo Section -->
      <div class="text-center mb-8">
        <img src="{{ asset('/penyewatemplate') }}/assets/img/baru2/logo-xyz.svg" alt="Logo" class="mx-auto mb-4 h-16">
      </div>

      <!-- Auth Card -->
      <div class="auth-card p-8">
        <!-- Header -->
        <div class="text-center mb-8">
          <div class="mb-4">
            <i class="bi bi-key text-5xl text-gray-400"></i>
          </div>
          <h1 class="text-2xl font-bold text-gray-800 mb-2">Lupa Password?</h1>
          <p class="text-gray-600">Masukan emailmu untuk perbarui password</p>
        </div>

        <!-- Error Messages -->
        @if ($errors->any())
          <div class="auth-alert-error">
            <ul class="list-none m-0 p-0">
              @foreach ($errors->all() as $error)
                <li class="flex items-center">
                  <i class="bi bi-exclamation-circle mr-2"></i>
                  {{ $error }}
                </li>
              @endforeach
            </ul>
          </div>
        @endif

        <!-- Success Messages -->
        @if (session()->has('status'))
          <div class="auth-alert-success">
            <div class="flex items-center">
              <i class="bi bi-check-circle mr-2"></i>
              {{ session()->get('status') }}
            </div>
          </div>
        @endif

        <!-- Forgot Password Form -->
        <form method="POST" action="{{ route('password.email') }}" class="space-y-6">
          @csrf
          
          <!-- Email Field -->
          <div>
            <label for="email" class="block text-sm font-semibold text-gray-700 mb-2">
              <i class="bi bi-envelope mr-1"></i>
              Email
            </label>
            <input 
              type="email" 
              name="email" 
              id="email" 
              class="auth-input @error('email') border-red-300 @enderror" 
              placeholder="Masukkan alamat email Anda" 
              value="{{ old('email') }}"
              required 
              autofocus
            >
            @error('email')
              <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
          </div>

          <!-- Submit Button -->
          <button type="submit" class="auth-button">
            <i class="bi bi-send mr-2"></i>
            Kirim Link Reset Password
          </button>

          <!-- Links -->
          <div class="text-center mt-6">
            <p class="text-sm text-gray-600">
              Ingat password Anda? 
              <a href="{{ route('login') }}" class="auth-link font-semibold">
                <i class="bi bi-arrow-left mr-1"></i>
                Kembali ke Login
              </a>
            </p>
          </div>
        </form>
      </div>

      <!-- Footer -->
      <div class="text-center mt-8">
        <p class="text-white text-sm opacity-75">
          © {{ date('Y') }} PT. XYZ. All rights reserved.
        </p>
      </div>
    </div>
  </main>
</body>

</html>