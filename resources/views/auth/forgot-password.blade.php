<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Lupa Password</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen bg-gradient-to-br from-rose-50 via-fuchsia-50 to-indigo-50 flex items-center justify-center p-6">
  <div class="w-full max-w-md bg-white/80 backdrop-blur rounded-2xl shadow-xl p-8">
    <h1 class="text-2xl font-bold text-gray-900">Lupa Password?</h1>
    <p class="mt-1 text-gray-600">Masukkan email untuk menerima tautan reset password.</p>

    @if (session('status'))
      <div class="mt-4 rounded-lg border border-emerald-200 bg-emerald-50 text-emerald-700 p-3">
        {{ session('status') }}
      </div>
    @endif

    @if ($errors->any())
      <div class="mt-4 rounded-lg border border-rose-200 bg-rose-50 text-rose-700 p-3">
        <ul class="list-disc ms-5">
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    <form method="POST" action="{{ route('password.email') }}" class="mt-6 space-y-5">
      @csrf
      <div>
        <label class="block text-sm font-medium text-gray-700">Email</label>
        <input type="email" name="email" value="{{ old('email') }}" required
               class="mt-1 w-full rounded-xl border-2 border-gray-200 focus:border-indigo-500 focus:ring-0 p-3" />
      </div>
      <button type="submit"
        class="w-full rounded-xl bg-indigo-600 hover:bg-indigo-700 text-white font-semibold p-3">
        Kirim Link Reset Password
      </button>
    </form>

    <p class="mt-6 text-sm text-center text-gray-600">
      Ingat password?
      <a href="{{ route('login') }}" class="text-indigo-600 hover:underline">Kembali ke login</a>
    </p>
  </div>
</body>
</html>
