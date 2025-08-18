@extends('penyewa.layouts.app')

@section('title', 'Edit Profile')

@section('content')
    <!-- Page Header -->
    <section class="pt-24 pb-8 bg-gradient-to-br from-indigo-50 to-purple-50">
        <div class="max-w-2xl mx-auto px-4 sm:px-6">
            <div class="text-center">
                <h1 class="text-3xl sm:text-4xl font-bold text-gray-900 mb-2">Edit Profile</h1>
                <p class="text-gray-600">Perbarui informasi profil Anda</p>
            </div>
        </div>
    </section>

    <!-- Edit Form -->
    <section class="py-12 bg-white">
        <div class="max-w-2xl mx-auto px-4 sm:px-6">
            <!-- Alert Messages -->
            @if (session('success'))
                <div class="mb-6 p-4 bg-green-50 border border-green-200 rounded-xl" data-aos="fade-up">
                    <div class="flex items-center">
                        <i class="fas fa-check-circle text-green-500 mr-3"></i>
                        <p class="text-green-700 font-medium">{{ session('success') }}</p>
                    </div>
                </div>
            @endif

            @if (session('error'))
                <div class="mb-6 p-4 bg-red-50 border border-red-200 rounded-xl" data-aos="fade-up">
                    <div class="flex items-center">
                        <i class="fas fa-exclamation-circle text-red-500 mr-3"></i>
                        <p class="text-red-700 font-medium">{{ session('error') }}</p>
                    </div>
                </div>
            @endif

            <!-- Form Card -->
            <div class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden" data-aos="fade-up">
                <div class="p-8">
                    <form method="POST" action="{{ url('/profile/' . $user->id) }}" class="space-y-6">
                        @method('put')
                        @csrf

                        <!-- Name Field -->
                        <div>
                            <label for="name" class="block text-sm font-semibold text-gray-900 mb-2">
                                <i class="fas fa-user mr-2 text-indigo-500"></i>
                                Nama Lengkap
                            </label>
                            <input type="text" 
                                   class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-colors duration-200 @error('name') border-red-300 focus:ring-red-500 focus:border-red-500 @enderror"
                                   name="name" 
                                   id="name" 
                                   value="{{ old('name', $user->name) }}"
                                   placeholder="Masukkan nama lengkap">
                            @error('name')
                                <p class="mt-2 text-sm text-red-600">
                                    <i class="fas fa-exclamation-circle mr-1"></i>
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <!-- Email Field -->
                        <div>
                            <label for="email" class="block text-sm font-semibold text-gray-900 mb-2">
                                <i class="fas fa-envelope mr-2 text-indigo-500"></i>
                                Email Address
                            </label>
                            <input type="email" 
                                   class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-colors duration-200 @error('email') border-red-300 focus:ring-red-500 focus:border-red-500 @enderror"
                                   name="email" 
                                   id="email" 
                                   value="{{ old('email', $user->email) }}"
                                   placeholder="Masukkan email address">
                            @error('email')
                                <p class="mt-2 text-sm text-red-600">
                                    <i class="fas fa-exclamation-circle mr-1"></i>
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <!-- Phone Number Field -->
                        <div>
                            <label for="phone_number" class="block text-sm font-semibold text-gray-900 mb-2">
                                <i class="fas fa-phone mr-2 text-indigo-500"></i>
                                Nomor Telepon
                            </label>
                            <input type="text" 
                                   class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-colors duration-200 @error('phone_number') border-red-300 focus:ring-red-500 focus:border-red-500 @enderror"
                                   name="phone_number" 
                                   id="phone_number" 
                                   value="{{ old('phone_number', $user->phone_number) }}"
                                   placeholder="Masukkan nomor telepon">
                            @error('phone_number')
                                <p class="mt-2 text-sm text-red-600">
                                    <i class="fas fa-exclamation-circle mr-1"></i>
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <!-- Address Field -->
                        <div>
                            <label for="address" class="block text-sm font-semibold text-gray-900 mb-2">
                                <i class="fas fa-map-marker-alt mr-2 text-indigo-500"></i>
                                Alamat Lengkap
                            </label>
                            <textarea class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-colors duration-200 @error('address') border-red-300 focus:ring-red-500 focus:border-red-500 @enderror" 
                                      name="address" 
                                      id="address" 
                                      rows="4"
                                      placeholder="Masukkan alamat lengkap">{{ old('address', $user->address) }}</textarea>
                            @error('address')
                                <p class="mt-2 text-sm text-red-600">
                                    <i class="fas fa-exclamation-circle mr-1"></i>
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <!-- Submit Button -->
                        <div class="flex gap-4 pt-6">
                            <button type="submit" 
                                    class="flex-1 bg-gradient-to-r from-indigo-600 to-purple-600 hover:from-indigo-700 hover:to-purple-700 text-white font-semibold px-6 py-3 rounded-xl transition-all duration-300 transform hover:scale-105 shadow-lg hover:shadow-xl">
                                <i class="fas fa-save mr-2"></i>
                                Simpan Perubahan
                            </button>
                            
                            <a href="/profile/{{ $user->id }}" 
                               class="flex-1 text-center border-2 border-gray-300 hover:border-indigo-300 text-gray-700 hover:text-indigo-600 font-semibold px-6 py-3 rounded-xl transition-all duration-300">
                                <i class="fas fa-times mr-2"></i>
                                Batal
                            </a>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Change Password Card -->
            <div class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden mt-8" data-aos="fade-up" data-aos-delay="100">
                <div class="p-8">
                    <div class="mb-6">
                        <h3 class="text-2xl font-bold text-gray-900 mb-2">
                            <i class="fas fa-lock mr-3 text-indigo-500"></i>
                            Ubah Password
                        </h3>
                        <p class="text-gray-600">Pastikan password baru Anda aman dan mudah diingat</p>
                    </div>

                    <form method="POST" action="{{ route('profile.change-password', $user->id) }}" class="space-y-6">
                        @method('put')
                        @csrf

                        <!-- Current Password Field -->
                        <div>
                            <label for="current_password" class="block text-sm font-semibold text-gray-900 mb-2">
                                <i class="fas fa-unlock-alt mr-2 text-indigo-500"></i>
                                Password Lama
                            </label>
                            <input type="password" 
                                   class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-colors duration-200 @error('current_password') border-red-300 focus:ring-red-500 focus:border-red-500 @enderror"
                                   name="current_password" 
                                   id="current_password" 
                                   placeholder="Masukkan password lama"
                                   required>
                            @error('current_password')
                                <p class="mt-2 text-sm text-red-600">
                                    <i class="fas fa-exclamation-circle mr-1"></i>
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <!-- New Password Field -->
                        <div>
                            <label for="password" class="block text-sm font-semibold text-gray-900 mb-2">
                                <i class="fas fa-lock mr-2 text-indigo-500"></i>
                                Password Baru
                            </label>
                            <input type="password" 
                                   class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-colors duration-200 @error('password') border-red-300 focus:ring-red-500 focus:border-red-500 @enderror"
                                   name="password" 
                                   id="password" 
                                   placeholder="Masukkan password baru"
                                   required>
                            @error('password')
                                <p class="mt-2 text-sm text-red-600">
                                    <i class="fas fa-exclamation-circle mr-1"></i>
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <!-- Confirm New Password Field -->
                        <div>
                            <label for="password_confirmation" class="block text-sm font-semibold text-gray-900 mb-2">
                                <i class="fas fa-check-circle mr-2 text-indigo-500"></i>
                                Konfirmasi Password Baru
                            </label>
                            <input type="password" 
                                   class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-colors duration-200"
                                   name="password_confirmation" 
                                   id="password_confirmation" 
                                   placeholder="Ulangi password baru"
                                   required>
                        </div>

                        <!-- Submit Button -->
                        <div class="pt-6">
                            <button type="submit" 
                                    class="w-full bg-gradient-to-r from-red-600 to-pink-600 hover:from-red-700 hover:to-pink-700 text-white font-semibold px-6 py-3 rounded-xl transition-all duration-300 transform hover:scale-105 shadow-lg hover:shadow-xl">
                                <i class="fas fa-key mr-2"></i>
                                Ubah Password
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection