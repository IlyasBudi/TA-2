<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Masuk - PO XYZ Pariwisata</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="min-h-screen bg-gradient-to-br from-indigo-50 via-purple-50 to-rose-50">
  <!-- Background Decorations -->
  <div class="fixed inset-0 pointer-events-none">
    <div class="absolute top-20 right-20 w-32 h-32 bg-gradient-to-br from-indigo-400 to-purple-600 rounded-full opacity-10 animate-pulse"></div>
    <div class="absolute bottom-20 left-20 w-24 h-24 bg-gradient-to-br from-purple-400 to-pink-600 rounded-full opacity-10 animate-pulse" style="animation-delay: 1s;"></div>
    <div class="absolute top-1/2 left-1/4 w-16 h-16 bg-gradient-to-br from-blue-400 to-indigo-600 rounded-full opacity-10 animate-pulse" style="animation-delay: 2s;"></div>
  </div>

  <div class="relative grid md:grid-cols-2 min-h-screen">
    <!-- Left / Brand -->
    <div class="hidden md:flex items-center justify-center p-10">
      <div class="max-w-md text-center">
        <div class="mx-auto mb-8 w-20 h-20 bg-gradient-to-br from-indigo-600 to-purple-600 rounded-3xl flex items-center justify-center shadow-xl">
          <i class="fas fa-bus text-white text-2xl"></i>
        </div>
        <h1 class="text-4xl font-bold text-gray-900 mb-4">
          Selamat Datang di
          <span class="block text-transparent bg-clip-text bg-gradient-to-r from-indigo-600 to-purple-600">
            PO XYZ Pariwisata
          </span>
        </h1>
        <p class="text-lg text-gray-600 leading-relaxed">Masuk untuk melanjutkan perjalanan wisata terbaik Anda bersama kami.</p>
        
        <!-- Decorative illustration placeholder -->
        <!-- <div class="mt-8 relative">
          <div class="w-full h-64 bg-gradient-to-br from-indigo-100 to-purple-100 rounded-3xl flex items-center justify-center shadow-lg">
            <div class="text-center">
              <i class="fas fa-route text-indigo-400 text-6xl mb-4"></i>
              <p class="text-indigo-600 font-medium">Perjalanan Menanti</p>
            </div>
          </div>
        </div> -->
      </div>
    </div>

    <!-- Right / Form -->
    <div class="flex items-center justify-center p-6 sm:p-10">
      <div class="w-full max-w-md">
        <!-- Mobile Header -->
        <div class="md:hidden text-center mb-8">
          <div class="mx-auto mb-4 w-16 h-16 bg-gradient-to-br from-indigo-600 to-purple-600 rounded-2xl flex items-center justify-center">
            <i class="fas fa-bus text-white text-xl"></i>
          </div>
          <h1 class="text-2xl font-bold text-gray-900">
            Masuk ke <span class="text-transparent bg-clip-text bg-gradient-to-r from-indigo-600 to-purple-600">PO XYZ</span>
          </h1>
        </div>

        <!-- Form Container -->
        <div class="bg-white/80 backdrop-blur-sm rounded-3xl shadow-2xl p-8 border border-white/20">
          @if (session('status'))
            <div class="mb-6 rounded-xl border border-emerald-200 bg-emerald-50 text-emerald-700 p-4">
              <div class="flex items-center">
                <i class="fas fa-check-circle mr-3 text-emerald-500"></i>
                <span>{{ session('status') }}</span>
              </div>
            </div>
          @endif

          @if ($errors->any())
            <div class="mb-6 rounded-xl border border-rose-200 bg-rose-50 text-rose-700 p-4">
              <div class="flex items-start">
                <i class="fas fa-exclamation-triangle mr-3 text-rose-500 mt-0.5"></i>
                <ul class="list-disc list-inside space-y-1">
                  @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                  @endforeach
                </ul>
              </div>
            </div>
          @endif

          <form method="POST" action="{{ url('/login') }}" class="space-y-6">
            @csrf

            <div>
              <label class="block text-sm font-semibold text-gray-700 mb-2">
                <i class="fas fa-envelope mr-2 text-indigo-500"></i>
                Email
              </label>
              <input type="email" name="email" value="{{ old('email') }}" required
                class="w-full rounded-xl border-2 border-gray-200 focus:border-indigo-500 focus:ring-0 px-4 py-3 transition-colors duration-300 bg-white/50" 
                placeholder="Masukkan email Anda" />
              @error('email') <p class="text-sm text-rose-600 mt-2 flex items-center"><i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}</p> @enderror
            </div>

            <div>
              <label class="block text-sm font-semibold text-gray-700 mb-2">
                <i class="fas fa-lock mr-2 text-indigo-500"></i>
                Password
              </label>
              <input type="password" name="password" required
                class="w-full rounded-xl border-2 border-gray-200 focus:border-indigo-500 focus:ring-0 px-4 py-3 transition-colors duration-300 bg-white/50" 
                placeholder="Masukkan password Anda" />
              @error('password') <p class="text-sm text-rose-600 mt-2 flex items-center"><i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}</p> @enderror
            </div>

            <div class="flex items-center justify-between">
              <label class="inline-flex items-center gap-2 text-sm text-gray-600 cursor-pointer">
                <input type="checkbox" name="remember" class="rounded border-gray-300 text-indigo-600 focus:ring-indigo-500" />
                <span>Ingat saya</span>
              </label>
              <a href="{{ route('password.request') }}" class="text-sm text-indigo-600 hover:text-indigo-800 font-medium transition-colors duration-300">
                Lupa password?
              </a>
            </div>

            <button type="submit"
              class="w-full rounded-xl bg-gradient-to-r from-indigo-600 to-purple-600 hover:from-indigo-700 hover:to-purple-700 text-white font-semibold py-3 px-4 transition-all duration-300 transform hover:scale-[1.02] shadow-lg hover:shadow-xl">
              <i class="fas fa-sign-in-alt mr-2"></i>
              Masuk
            </button>
          </form>

          <div class="mt-8 text-center">
            <p class="text-sm text-gray-600">
              Belum punya akun?
              <a href="{{ route('penyewaregister') }}" class="text-indigo-600 hover:text-indigo-800 font-semibold transition-colors duration-300 ml-1">
                Buat akun baru
              </a>
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>