<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Daftar Penyewa</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen bg-gradient-to-br from-amber-50 via-orange-50 to-pink-50 flex items-center justify-center p-6">
  <div class="w-full max-w-2xl bg-white/80 backdrop-blur rounded-2xl shadow-xl p-8">
    <div class="flex items-center gap-4 mb-6">
      <div class="w-12 h-12 rounded-xl flex items-center justify-center">
        <img data-v-89d4a657="" class="app-modal-icon__icon-image" srcset="https://img.icons8.com/?size=64&amp;id=tZuAOUGm9AuS&amp;format=png 1x, https://img.icons8.com/?size=128&amp;id=tZuAOUGm9AuS&amp;format=png 2x" alt="User Default" width="64" height="64">
      </div>
      <div>
        <h1 class="text-2xl font-bold text-gray-900">Buat Akun Penyewa</h1>
        <p class="text-gray-600">Masukkan data di bawah ini.</p>
      </div>
    </div>

    @if ($errors->any())
      <div class="mb-4 rounded-lg border border-rose-200 bg-rose-50 text-rose-700 p-3">
        <ul class="list-disc ms-5">
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    <form method="POST" action="{{ route('do.penyewaregister') }}" class="grid sm:grid-cols-2 gap-5">
      @csrf
      <div class="sm:col-span-2">
        <label class="block text-sm font-medium text-gray-700">Nama Lengkap</label>
        <input name="name" value="{{ old('name') }}" required
               class="mt-1 w-full rounded-xl border-2 border-gray-200 focus:border-indigo-500 focus:ring-0 p-3"/>
        @error('name') <p class="text-sm text-rose-600 mt-1">{{ $message }}</p> @enderror
      </div>

      <div>
        <label class="block text-sm font-medium text-gray-700">Email</label>
        <input type="email" name="email" value="{{ old('email') }}" required
               class="mt-1 w-full rounded-xl border-2 border-gray-200 focus:border-indigo-500 focus:ring-0 p-3"/>
        @error('email') <p class="text-sm text-rose-600 mt-1">{{ $message }}</p> @enderror
      </div>

      <div>
        <label class="block text-sm font-medium text-gray-700">Nomor Telepon</label>
        <input name="phone_number" value="{{ old('phone_number') }}" required
               class="mt-1 w-full rounded-xl border-2 border-gray-200 focus:border-indigo-500 focus:ring-0 p-3"/>
        @error('phone_number') <p class="text-sm text-rose-600 mt-1">{{ $message }}</p> @enderror
      </div>

      <div class="sm:col-span-2">
        <label class="block text-sm font-medium text-gray-700">Alamat</label>
        <input name="address" value="{{ old('address') }}" required
               class="mt-1 w-full rounded-xl border-2 border-gray-200 focus:border-indigo-500 focus:ring-0 p-3"/>
        @error('address') <p class="text-sm text-rose-600 mt-1">{{ $message }}</p> @enderror
      </div>

      <div>
        <label class="block text-sm font-medium text-gray-700">Password</label>
        <input type="password" name="password" required
               class="mt-1 w-full rounded-xl border-2 border-gray-200 focus:border-indigo-500 focus:ring-0 p-3"/>
        @error('password') <p class="text-sm text-rose-600 mt-1">{{ $message }}</p> @enderror
      </div>

      <div>
        <label class="block text-sm font-medium text-gray-700">Konfirmasi Password</label>
        <input type="password" name="password_confirmation" required
               class="mt-1 w-full rounded-xl border-2 border-gray-200 focus:border-indigo-500 focus:ring-0 p-3"/>
        @error('password_confirmation') <p class="text-sm text-rose-600 mt-1">{{ $message }}</p> @enderror
      </div>

      <div class="sm:col-span-2">
        <button type="submit"
          class="w-full rounded-xl bg-indigo-600 hover:bg-indigo-700 text-white font-semibold p-3">
          Daftar Sekarang
        </button>
      </div>
    </form>

    <p class="mt-6 text-sm text-center text-gray-600">
      Sudah punya akun? <a href="{{ route('login') }}" class="text-indigo-600 hover:underline">Masuk</a>
    </p>
  </div>
</body>
</html>
