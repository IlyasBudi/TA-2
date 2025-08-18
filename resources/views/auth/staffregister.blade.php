<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Daftar Staff</title>
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
    <div class="w-full max-w-lg">
      <!-- Logo Section -->
      <div class="text-center mb-8">
        <img src="{{ asset('/penyewatemplate') }}/assets/img/baru2/logo-xyz.svg" alt="Logo" class="mx-auto mb-4 h-16">
      </div>

      <!-- Auth Card -->
      <div class="auth-card p-8">
        <!-- Header -->
        <div class="text-center mb-8">
          <div class="mb-4">
            <i class="bi bi-person-badge text-5xl text-gray-400"></i>
          </div>
          <h1 class="text-2xl font-bold text-gray-800 mb-2">Daftar Staff</h1>
          <p class="text-gray-600">Daftarkan akun staff baru</p>
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

        <!-- Registration Form -->
        <form method="POST" action="{{ route('do.staffregister') }}" class="space-y-6">
          @csrf
          
          <!-- Name Field -->
          <div>
            <label for="name" class="block text-sm font-semibold text-gray-700 mb-2">
              <i class="bi bi-person mr-1"></i>
              Nama Lengkap
            </label>
            <input 
              type="text" 
              name="name" 
              id="name" 
              class="auth-input @error('name') border-red-300 @enderror" 
              placeholder="Masukkan nama lengkap" 
              value="{{ old('name') }}"
              required 
              autofocus
            >
            @error('name')
              <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
          </div>

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
              placeholder="Masukkan alamat email" 
              value="{{ old('email') }}"
              required
            >
            @error('email')
              <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
          </div>

          <!-- Phone Number Field -->
          <div>
            <label for="phone_number" class="block text-sm font-semibold text-gray-700 mb-2">
              <i class="bi bi-telephone mr-1"></i>
              Nomor Telepon
            </label>
            <input 
              type="text" 
              name="phone_number" 
              id="phone_number" 
              class="auth-input @error('phone_number') border-red-300 @enderror" 
              placeholder="Masukkan nomor telepon" 
              value="{{ old('phone_number') }}"
              required
            >
            @error('phone_number')
              <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
          </div>

          <!-- Address Field -->
          <div>
            <label for="address" class="block text-sm font-semibold text-gray-700 mb-2">
              <i class="bi bi-geo-alt mr-1"></i>
              Alamat
            </label>
            <input 
              type="text" 
              name="address" 
              id="address" 
              class="auth-input @error('address') border-red-300 @enderror" 
              placeholder="Masukkan alamat lengkap" 
              value="{{ old('address') }}"
              required
            >
            @error('address')
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
              placeholder="Masukkan password" 
              required
            >
            @error('password')
              <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
          </div>

          <!-- Confirm Password Field -->
          <div>
            <label for="password_confirmation" class="block text-sm font-semibold text-gray-700 mb-2">
              <i class="bi bi-lock-fill mr-1"></i>
              Konfirmasi Password
            </label>
            <input 
              type="password" 
              name="password_confirmation" 
              id="password_confirmation" 
              class="auth-input @error('password_confirmation') border-red-300 @enderror" 
              placeholder="Ulangi password" 
              required
            >
            @error('password_confirmation')
              <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
          </div>

          <!-- Submit Button -->
          <button type="submit" class="auth-button">
            <i class="bi bi-person-plus mr-2"></i>
            Daftar Staff
          </button>

          <!-- Links -->
          <div class="text-center mt-6">
            <p class="text-sm text-gray-600">
              Sudah punya akun? 
              <a href="{{ route('login') }}" class="auth-link font-semibold">
                Masuk di sini
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