<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Login</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{ asset('/penyewatemplate') }}/assets/img/baru/icon-xyz.svg" rel="icon">
  <link href="{{ asset('/penyewatemplate') }}/assets/img/baru/icon-xyz2.svg" rel="icon">

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
          <h1 class="text-2xl font-bold text-gray-800 mb-2">Selamat Datang Kembali</h1>
          <p class="text-gray-600">Masukan datamu untuk melanjutkan perjalananmu</p>
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

        <!-- Login Form -->
        <form method="POST" action="{{ route('login') }}" class="space-y-6">
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
              placeholder="Masukkan email Anda" 
              value="{{ old('email') }}"
              required 
              autofocus
            >
            @error('email')
              <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
          </div>

          <!-- Password Field -->
          <div>
            <label for="password" class="block text-sm font-semibold text-gray-700 mb-2">
              <i class="bi bi-lock mr-1"></i>
              Password
            </label>
            <input 
              type="password" 
              name="password" 
              id="password" 
              class="auth-input @error('password') border-red-300 @enderror" 
              placeholder="Masukkan password Anda" 
              required
            >
            @error('password')
              <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
          </div>

          <!-- Remember Me -->
          <div class="flex items-center">
            <input 
              type="checkbox" 
              name="remember" 
              id="remember" 
              class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded"
            >
            <label for="remember" class="ml-2 block text-sm text-gray-700">
              Ingat saya
            </label>
          </div>

          <!-- Submit Button -->
          <button type="submit" class="auth-button">
            <i class="bi bi-box-arrow-in-right mr-2"></i>
            Masuk
          </button>

          <!-- Links -->
          <div class="text-center space-y-2 mt-6">
            <div>
              <a href="{{ route('password.request') }}" class="auth-link text-sm">
                <i class="bi bi-question-circle mr-1"></i>
                Lupa Password?
              </a>
            </div>
            <p class="text-sm text-gray-600">
              Belum punya akun? 
              <a href="{{ route('penyewaregister') }}" class="auth-link font-semibold">
                Buat akun baru
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