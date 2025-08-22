<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Reset Password - PO XYZ Pariwisata</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="min-h-screen bg-gradient-to-br from-cyan-50 via-blue-50 to-indigo-50 py-6">
  <!-- Background Decorations -->
  <div class="fixed inset-0 pointer-events-none">
    <div class="absolute top-20 right-20 w-32 h-32 bg-gradient-to-br from-cyan-400 to-blue-600 rounded-full opacity-10 animate-pulse"></div>
    <div class="absolute bottom-20 left-20 w-24 h-24 bg-gradient-to-br from-blue-400 to-indigo-600 rounded-full opacity-10 animate-pulse" style="animation-delay: 1s;"></div>
    <div class="absolute top-1/2 right-1/4 w-16 h-16 bg-gradient-to-br from-indigo-400 to-purple-600 rounded-full opacity-10 animate-pulse" style="animation-delay: 2s;"></div>
  </div>

  <div class="relative container mx-auto px-6">
    <div class="flex items-center justify-center min-h-screen">
      <div class="w-full max-w-md">
        <!-- Header -->
        <div class="text-center mb-8">
          <div class="mx-auto mb-6 w-20 h-20 bg-gradient-to-br from-indigo-600 to-purple-600 rounded-3xl flex items-center justify-center shadow-xl">
            <i class="fas fa-shield-alt text-white text-2xl"></i>
          </div>
          <h1 class="text-3xl font-bold text-gray-900 mb-2">
            Reset <span class="text-transparent bg-clip-text bg-gradient-to-r from-indigo-600 to-purple-600">Password</span>
          </h1>
          <p class="text-gray-600">Masukkan password baru untuk keamanan akun Anda</p>
        </div>

        <!-- Form Container -->
        <div class="bg-white/80 backdrop-blur-sm rounded-3xl shadow-2xl p-8 border border-white/20">
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

          @if (session('status'))
            <div class="mb-6 rounded-xl border border-emerald-200 bg-emerald-50 text-emerald-700 p-4">
              <div class="flex items-center">
                <i class="fas fa-check-circle mr-3 text-emerald-500"></i>
                <span>{{ session('status') }}</span>
              </div>
            </div>
          @endif

          <form method="POST" action="{{ route('password.update') }}" class="space-y-6">
            @csrf
            <input type="hidden" name="token" value="{{ $token }}"/>

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
                Password Baru
              </label>
              <input type="password" name="password" required
                     class="w-full rounded-xl border-2 border-gray-200 focus:border-indigo-500 focus:ring-0 px-4 py-3 transition-colors duration-300 bg-white/50"
                     placeholder="Masukkan password baru" />
              @error('password') <p class="text-sm text-rose-600 mt-2 flex items-center"><i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}</p> @enderror
            </div>

            <div>
              <label class="block text-sm font-semibold text-gray-700 mb-2">
                <i class="fas fa-lock mr-2 text-indigo-500"></i>
                Konfirmasi Password Baru
              </label>
              <input type="password" name="password_confirmation" required
                     class="w-full rounded-xl border-2 border-gray-200 focus:border-indigo-500 focus:ring-0 px-4 py-3 transition-colors duration-300 bg-white/50"
                     placeholder="Ulangi password baru" />
              @error('password_confirmation') <p class="text-sm text-rose-600 mt-2 flex items-center"><i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}</p> @enderror
            </div>

            <button type="submit"
              class="w-full rounded-xl bg-gradient-to-r from-indigo-600 to-purple-600 hover:from-indigo-700 hover:to-purple-700 text-white font-semibold py-3 px-4 transition-all duration-300 transform hover:scale-[1.02] shadow-lg hover:shadow-xl">
              <i class="fas fa-shield-alt mr-2"></i>
              Reset Password
            </button>
          </form>

          <div class="mt-8 text-center">
            <p class="text-sm text-gray-600">
              <a href="{{ route('login') }}" class="text-indigo-600 hover:text-indigo-800 font-semibold transition-colors duration-300">
                <i class="fas fa-arrow-left mr-1"></i>
                Kembali ke Login
              </a>
            </p>
          </div>
        </div>

        <!-- Password Requirements -->
        <div class="mt-6">
          <div class="bg-gray-50 rounded-xl p-4 border border-gray-200">
            <h4 class="text-sm font-semibold text-gray-700 mb-2 flex items-center">
              <i class="fas fa-info-circle text-blue-500 mr-2"></i>
              Persyaratan Password
            </h4>
            <ul class="text-xs text-gray-600 space-y-1">
              <li class="flex items-center"><i class="fas fa-check text-green-500 mr-2 text-xs"></i>Minimal 8 karakter</li>
              <li class="flex items-center"><i class="fas fa-check text-green-500 mr-2 text-xs"></i>Kombinasi huruf dan angka</li>
              <li class="flex items-center"><i class="fas fa-check text-green-500 mr-2 text-xs"></i>Hindari informasi pribadi</li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>