<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Daftar Staff - PO XYZ Pariwisata</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="min-h-screen bg-gradient-to-br from-blue-50 via-sky-50 to-cyan-50 py-6">
  <!-- Background Decorations -->
  <div class="fixed inset-0 pointer-events-none">
    <div class="absolute top-10 right-10 w-32 h-32 bg-gradient-to-br from-blue-400 to-sky-600 rounded-full opacity-10 animate-pulse"></div>
    <div class="absolute bottom-10 left-10 w-24 h-24 bg-gradient-to-br from-sky-400 to-cyan-600 rounded-full opacity-10 animate-pulse" style="animation-delay: 1s;"></div>
    <div class="absolute top-1/3 left-1/5 w-16 h-16 bg-gradient-to-br from-cyan-400 to-blue-600 rounded-full opacity-10 animate-pulse" style="animation-delay: 2s;"></div>
  </div>

  <div class="relative container mx-auto px-6">
    <div class="flex items-center justify-center min-h-screen">
      <div class="w-full max-w-4xl">
        <!-- Header -->
        <div class="text-center mb-8">
          <div class="mx-auto mb-6 w-20 h-20 bg-gradient-to-br from-blue-600 to-sky-600 rounded-3xl flex items-center justify-center shadow-xl">
            <i class="fas fa-user-tie text-white text-2xl"></i>
          </div>
          <h1 class="text-4xl font-bold text-gray-900 mb-2">
            Bergabung sebagai
            <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-600 to-sky-600">
              Staff PO XYZ
            </span>
          </h1>
          <p class="text-lg text-gray-600">Daftarkan akun staff untuk mengelola sistem pariwisata</p>
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

          <form method="POST" action="{{ route('do.staffregister') }}" class="grid lg:grid-cols-2 gap-6">
            @csrf
            
            <div class="lg:col-span-2">
              <label class="block text-sm font-semibold text-gray-700 mb-2">
                <i class="fas fa-user mr-2 text-blue-500"></i>
                Nama Lengkap
              </label>
              <input name="name" value="{{ old('name') }}" required
                     class="w-full rounded-xl border-2 border-gray-200 focus:border-blue-500 focus:ring-0 px-4 py-3 transition-colors duration-300 bg-white/50"
                     placeholder="Masukkan nama lengkap staff"/>
              @error('name') <p class="text-sm text-rose-600 mt-2 flex items-center"><i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}</p> @enderror
            </div>

            <div>
              <label class="block text-sm font-semibold text-gray-700 mb-2">
                <i class="fas fa-envelope mr-2 text-blue-500"></i>
                Email
              </label>
              <input type="email" name="email" value="{{ old('email') }}" required
                     class="w-full rounded-xl border-2 border-gray-200 focus:border-blue-500 focus:ring-0 px-4 py-3 transition-colors duration-300 bg-white/50"
                     placeholder="nama@email.com"/>
              @error('email') <p class="text-sm text-rose-600 mt-2 flex items-center"><i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}</p> @enderror
            </div>

            <div>
              <label class="block text-sm font-semibold text-gray-700 mb-2">
                <i class="fas fa-phone mr-2 text-blue-500"></i>
                Nomor Telepon
              </label>
              <input name="phone_number" value="{{ old('phone_number') }}" required
                     class="w-full rounded-xl border-2 border-gray-200 focus:border-blue-500 focus:ring-0 px-4 py-3 transition-colors duration-300 bg-white/50"
                     placeholder="08xxxxxxxxxx"/>
              @error('phone_number') <p class="text-sm text-rose-600 mt-2 flex items-center"><i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}</p> @enderror
            </div>

            <div class="lg:col-span-2">
              <label class="block text-sm font-semibold text-gray-700 mb-2">
                <i class="fas fa-map-marker-alt mr-2 text-blue-500"></i>
                Alamat
              </label>
              <input name="address" value="{{ old('address') }}" required
                     class="w-full rounded-xl border-2 border-gray-200 focus:border-blue-500 focus:ring-0 px-4 py-3 transition-colors duration-300 bg-white/50"
                     placeholder="Masukkan alamat lengkap staff"/>
              @error('address') <p class="text-sm text-rose-600 mt-2 flex items-center"><i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}</p> @enderror
            </div>

            <div>
              <label class="block text-sm font-semibold text-gray-700 mb-2">
                <i class="fas fa-lock mr-2 text-blue-500"></i>
                Password
              </label>
              <input type="password" name="password" required
                     class="w-full rounded-xl border-2 border-gray-200 focus:border-blue-500 focus:ring-0 px-4 py-3 transition-colors duration-300 bg-white/50"
                     placeholder="Minimal 8 karakter"/>
              @error('password') <p class="text-sm text-rose-600 mt-2 flex items-center"><i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}</p> @enderror
            </div>

            <div>
              <label class="block text-sm font-semibold text-gray-700 mb-2">
                <i class="fas fa-lock mr-2 text-blue-500"></i>
                Konfirmasi Password
              </label>
              <input type="password" name="password_confirmation" required
                     class="w-full rounded-xl border-2 border-gray-200 focus:border-blue-500 focus:ring-0 px-4 py-3 transition-colors duration-300 bg-white/50"
                     placeholder="Ulangi password staff"/>
              @error('password_confirmation') <p class="text-sm text-rose-600 mt-2 flex items-center"><i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}</p> @enderror
            </div>

            <div class="lg:col-span-2">
              <button type="submit"
                class="w-full rounded-xl bg-gradient-to-r from-blue-600 to-sky-600 hover:from-blue-700 hover:to-sky-700 text-white font-semibold py-4 px-6 transition-all duration-300 transform hover:scale-[1.02] shadow-lg hover:shadow-xl">
                <i class="fas fa-user-tie mr-2"></i>
                Daftar Staff Sekarang
              </button>
            </div>
          </form>

          <div class="mt-8 text-center">
            <p class="text-sm text-gray-600">
              Sudah punya akun?
              <a href="{{ route('login') }}" class="text-blue-600 hover:text-blue-800 font-semibold transition-colors duration-300 ml-1">
                Masuk sekarang
              </a>
            </p>
          </div>
        </div>

        <!-- Additional Information for Staff -->
        <div class="mt-6">
          <div class="bg-blue-50 rounded-xl p-4 border border-blue-200">
            <div class="flex items-start space-x-3">
              <i class="fas fa-info-circle text-blue-500 mt-0.5"></i>
              <div class="text-left">
                <p class="text-sm font-medium text-blue-800">Informasi Staff</p>
                <p class="text-xs text-blue-600 mt-1">Akun staff akan memiliki akses untuk mengelola sistem, booking, dan operasional PO XYZ Pariwisata</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>