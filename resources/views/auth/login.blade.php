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

  <!-- Tailwind CSS CDN -->
  <script src="https://cdn.tailwindcss.com"></script>
  
  <!-- Bootstrap Icons -->
  <link href="{{ asset('/niceadmin') }}/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  
  <!-- Custom Tailwind Configuration -->
  <script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            primary: {
              50: '#f0f4ff',
              100: '#e0e8ff', 
              200: '#c7d2fe',
              300: '#a5b4fc',
              400: '#818cf8',
              500: '#4154f1',
              600: '#3730a3',
              700: '#312e81',
              800: '#1e1b4b',
              900: '#1e1a5c',
            }
          }
        }
      }
    }
  </script>
  
  <!-- Custom CSS -->
  <style>
    .auth-gradient-bg {
      background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
      min-height: 100vh;
    }
    
    .auth-card {
      background: rgba(255, 255, 255, 0.9);
      backdrop-filter: blur(16px);
      border: none;
      border-radius: 1rem;
      box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
    }
    
    .auth-input {
      width: 100%;
      padding: 0.75rem 1rem;
      border: 2px solid #e5e7eb;
      border-radius: 0.75rem;
      transition: all 0.3s ease;
      outline: none;
    }
    
    .auth-input:focus {
      border-color: #4154f1;
      box-shadow: 0 0 0 4px rgba(65, 84, 241, 0.1);
    }
    
    .auth-button {
      width: 100%;
      background: linear-gradient(135deg, #4154f1 0%, #2c3cdd 100%);
      color: white;
      font-weight: 600;
      padding: 0.75rem 1.5rem;
      border-radius: 0.75rem;
      border: none;
      transition: all 0.3s ease;
      transform: translateY(0);
    }
    
    .auth-button:hover {
      background: linear-gradient(135deg, #2c3cdd 0%, #1e2ab8 100%);
      transform: translateY(-2px);
      box-shadow: 0 8px 25px rgba(65, 84, 241, 0.3);
    }
    
    .auth-link {
      color: #4154f1;
      transition: color 0.3s ease;
      text-decoration: none;
    }
    
    .auth-link:hover {
      color: #2c3cdd;
      text-decoration: underline;
    }
    
    .auth-alert-error {
      background-color: #fef2f2;
      border: 1px solid #fecaca;
      color: #b91c1c;
      padding: 1rem;
      border-radius: 0.75rem;
      margin-bottom: 1rem;
    }
    
    .auth-alert-success {
      background-color: #f0fdf4;
      border: 1px solid #bbf7d0;
      color: #15803d;
      padding: 1rem;
      border-radius: 0.75rem;
      margin-bottom: 1rem;
    }
  </style>
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