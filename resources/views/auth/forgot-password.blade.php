<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Lupa Password - PO XYZ Pariwisata</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="min-h-screen bg-gradient-to-br from-rose-50 via-fuchsia-50 to-indigo-50 py-6">
  <!-- Background Decorations -->
  <div class="fixed inset-0 pointer-events-none">
    <div class="absolute top-20 right-20 w-32 h-32 bg-gradient-to-br from-rose-400 to-purple-600 rounded-full opacity-10 animate-pulse"></div>
    <div class="absolute bottom-20 left-20 w-24 h-24 bg-gradient-to-br from-fuchsia-400 to-indigo-600 rounded-full opacity-10 animate-pulse" style="animation-delay: 1s;"></div>
    <div class="absolute top-1/2 right-1/4 w-16 h-16 bg-gradient-to-br from-purple-400 to-pink-600 rounded-full opacity-10 animate-pulse" style="animation-delay: 2s;"></div>
  </div>

  <div class="relative container mx-auto px-6">
    <div class="flex items-center justify-center min-h-screen">
      <div class="w-full max-w-md">
        <!-- Header -->
        <div class="text-center mb-8">
          <div class="mx-auto mb-6 w-20 h-20 bg-gradient-to-br from-indigo-600 to-purple-600 rounded-3xl flex items-center justify-center shadow-xl">
            <i class="fas fa-key text-white text-2xl"></i>
          </div>
          <h1 class="text-3xl font-bold text-gray-900 mb-2">
            Lupa <span class="text-transparent bg-clip-text bg-gradient-to-r from-indigo-600 to-purple-600">Password?</span>
          </h1>
          <p class="text-gray-600">Jangan khawatir, kami akan mengirimkan link reset ke email Anda</p>
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

          <form method="POST" action="{{ route('password.email') }}" class="space-y-6">
            @csrf
            
            <div>
              <label class="block text-sm font-semibold text-gray-700 mb-2">
                <i class="fas fa-envelope mr-2 text-indigo-500"></i>
                Email
              </label>
              <input type="email" name="email" value="{{ old('email') }}" required
                     class="w-full rounded-xl border-2 border-gray-200 focus:border-indigo-500 focus:ring-0 px-4 py-3 transition-colors duration-300 bg-white/50"
                     placeholder="Masukkan email terdaftar Anda" />
            </div>

            <button type="submit"
              class="w-full rounded-xl bg-gradient-to-r from-indigo-600 to-purple-600 hover:from-indigo-700 hover:to-purple-700 text-white font-semibold py-3 px-4 transition-all duration-300 transform hover:scale-[1.02] shadow-lg hover:shadow-xl">
              <i class="fas fa-paper-plane mr-2"></i>
              Kirim Link Reset Password
            </button>
          </form>

          <div class="mt-8 text-center">
            <p class="text-sm text-gray-600">
              Ingat password?
              <a href="{{ route('login') }}" class="text-indigo-600 hover:text-indigo-800 font-semibold transition-colors duration-300 ml-1">
                <i class="fas fa-arrow-left mr-1"></i>
                Kembali ke login
              </a>
            </p>
          </div>
        </div>

        <!-- Additional Help -->
        <div class="mt-6 text-center">
          <div class="bg-blue-50 rounded-xl p-4 border border-blue-200">
            <div class="flex items-start space-x-3">
              <i class="fas fa-info-circle text-blue-500 mt-0.5"></i>
              <div class="text-left">
                <p class="text-sm font-medium text-blue-800">Bantuan Reset Password</p>
                <p class="text-xs text-blue-600 mt-1">Pastikan email yang Anda masukkan adalah email yang terdaftar pada akun PO XYZ Pariwisata</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>