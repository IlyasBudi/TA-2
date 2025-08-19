<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Masuk</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen bg-gradient-to-br from-indigo-50 via-purple-50 to-rose-50">
  <div class="grid md:grid-cols-2 min-h-screen">
    <!-- Left / Brand -->
    <div class="hidden md:flex items-center justify-center p-10">
      <div class="max-w-md text-center">
        <div class="mx-auto mb-8 w-16 h-16 rounded-2xl bg-indigo-600/10 flex items-center justify-center">
          <span class="text-2xl font-bold text-indigo-600">TA</span>
        </div>
        <h1 class="text-3xl font-bold text-gray-900">Selamat Datang Kembali</h1>
        <p class="mt-3 text-gray-600">Masuk untuk melanjutkan perjalananmu.</p>
        <img class="mt-8 rounded-2xl shadow-xl"
             src="{{ asset('images/auth-illustration.png') }}"
             alt="Illustration"
             onerror="this.style.display='none'"/>
      </div>
    </div>

    <!-- Right / Form -->
    <div class="flex items-center justify-center p-6 sm:p-10">
      <div class="w-full max-w-md bg-white/80 backdrop-blur rounded-2xl shadow-xl p-8">
        @if (session('status'))
          <div class="mb-4 rounded-lg border border-emerald-200 bg-emerald-50 text-emerald-700 p-3">
            {{ session('status') }}
          </div>
        @endif

        @if ($errors->any())
          <div class="mb-4 rounded-lg border border-rose-200 bg-rose-50 text-rose-700 p-3">
            <ul class="list-disc ms-5">
              @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
        @endif

        <form method="POST" action="{{ url('/login') }}" class="space-y-5">
          @csrf

          <div>
            <label class="block text-sm font-medium text-gray-700">Email</label>
            <input type="email" name="email" value="{{ old('email') }}" required
              class="mt-1 w-full rounded-xl border-2 border-gray-200 focus:border-indigo-500 focus:ring-0 p-3" />
            @error('email') <p class="text-sm text-rose-600 mt-1">{{ $message }}</p> @enderror
          </div>

          <div>
            <label class="block text-sm font-medium text-gray-700">Password</label>
            <input type="password" name="password" required
              class="mt-1 w-full rounded-xl border-2 border-gray-200 focus:border-indigo-500 focus:ring-0 p-3" />
            @error('password') <p class="text-sm text-rose-600 mt-1">{{ $message }}</p> @enderror
          </div>

          <div class="flex items-center justify-between">
            <label class="inline-flex items-center gap-2 text-sm text-gray-600">
              <input type="checkbox" name="remember" class="rounded border-gray-300" />
              Ingat saya
            </label>
            <a href="{{ route('password.request') }}" class="text-sm text-indigo-600 hover:underline">Lupa password?</a>
          </div>

          <button type="submit"
            class="w-full rounded-xl bg-indigo-600 hover:bg-indigo-700 text-white font-semibold p-3 transition">
            Masuk
          </button>
        </form>

        <p class="mt-6 text-sm text-center text-gray-600">
          Belum punya akun?
          <a href="{{ route('penyewaregister') }}" class="text-indigo-600 hover:underline">Buat akun baru</a>
        </p>
      </div>
    </div>
  </div>
</body>
</html>
