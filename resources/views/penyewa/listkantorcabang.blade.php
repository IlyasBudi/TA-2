@extends('penyewa.layouts.app')

@section('title', 'Kantor Cabang')

@section('content')
    <!-- Page Header -->
    <section class="pt-24 pb-12 bg-gradient-to-br from-indigo-50 to-purple-50">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 text-center">
            <h1 class="text-4xl sm:text-5xl font-bold text-gray-900 mb-4" data-aos="fade-up">
                Kantor Cabang Kami
            </h1>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto" data-aos="fade-up" data-aos-delay="100">
                Kunjungi kantor cabang kami yang tersebar di berbagai lokasi untuk mendapatkan informasi lengkap terkait pemesanan bus pariwisata.
            </p>

            <!-- Stats -->
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-6 mt-12" data-aos="fade-up" data-aos-delay="200">
                <div class="bg-white rounded-2xl p-6 shadow-lg">
                    <div class="text-3xl font-bold text-indigo-600 mb-2">{{ count($kantorcabangs) }}+</div>
                    <div class="text-gray-600">Kantor Cabang</div>
                </div>
                <div class="bg-white rounded-2xl p-6 shadow-lg">
                    <div class="text-3xl font-bold text-green-600 mb-2">15+</div>
                    <div class="text-gray-600">Kota Terlayani</div>
                </div>
                <div class="bg-white rounded-2xl p-6 shadow-lg">
                    <div class="text-3xl font-bold text-purple-600 mb-2">200+</div>
                    <div class="text-gray-600">Armada Bus</div>
                </div>
            </div>
        </div>
    </section>

    <!-- Branch Offices Grid -->
    <section class="py-16 bg-white">
        <div class="max-w-6xl mx-auto px-4 sm:px-6">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach ($kantorcabangs as $index => $kantorcabang)
                <div class="group bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2" data-aos="fade-up" data-aos-delay="{{ $index * 100 }}">
                    <!-- Image -->
                    <div class="relative h-56 overflow-hidden">
                        <img src="{{ Storage::url($kantorcabang->image) }}" 
                             alt="{{ $kantorcabang->name }}" 
                             class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/50 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                        
                        <!-- Floating Card -->
                        <div class="absolute top-4 left-4 bg-white/90 backdrop-blur-sm rounded-lg px-3 py-1">
                            <span class="text-sm font-medium text-gray-800">
                                <i class="fas fa-building text-indigo-500 mr-1"></i>
                                Kantor Cabang
                            </span>
                        </div>
                    </div>

                    <!-- Content -->
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-gray-900 mb-3 group-hover:text-indigo-600 transition-colors duration-300">
                            <a href="/kantorcabang/{{ $kantorcabang->id }}">{{ $kantorcabang->name }}</a>
                        </h3>
                        
                        <div class="space-y-3 mb-6">
                            <div class="flex items-start space-x-3">
                                <i class="fas fa-map-marker-alt text-indigo-500 mt-1 flex-shrink-0"></i>
                                <p class="text-gray-600 text-sm leading-relaxed">
                                    {{ strlen($kantorcabang->address) > 80 ? substr($kantorcabang->address, 0, 80) . '...' : $kantorcabang->address }}
                                </p>
                            </div>
                            
                            @if($kantorcabang->phone_number)
                            <div class="flex items-center space-x-3">
                                <i class="fas fa-phone text-green-500 flex-shrink-0"></i>
                                <a href="tel:{{ $kantorcabang->phone_number }}" 
                                   class="text-gray-600 text-sm hover:text-green-600 transition-colors duration-200">
                                    {{ $kantorcabang->phone_number }}
                                </a>
                            </div>
                            @endif
                        </div>

                        <!-- Action Buttons -->
                        <div class="flex space-x-3">
                            <a href="/kantorcabang/{{ $kantorcabang->id }}" 
                               class="flex-1 bg-indigo-600 hover:bg-indigo-700 text-white font-medium px-4 py-2 rounded-lg transition-colors duration-200 text-center text-sm">
                                <i class="fas fa-eye mr-1"></i>
                                Detail
                            </a>
                            
                            @if($kantorcabang->phone_number)
                            <a href="https://wa.me/{{ $kantorcabang->phone_number }}" 
                               target="_blank"
                               class="flex-1 bg-green-500 hover:bg-green-600 text-white font-medium px-4 py-2 rounded-lg transition-colors duration-200 text-center text-sm">
                                <i class="fab fa-whatsapp mr-1"></i>
                                Chat
                            </a>
                            @endif
                        </div>
                    </div>

                    <!-- Bus Count Badge -->
                    @if($kantorcabang->bus && $kantorcabang->bus->count() > 0)
                    <div class="absolute top-4 right-4 bg-gradient-to-r from-purple-500 to-pink-500 text-white rounded-full px-3 py-1 text-xs font-medium">
                        {{ $kantorcabang->bus->count() }} Bus
                    </div>
                    @endif
                </div>
                @endforeach
            </div>

            <!-- Empty State -->
            @if($kantorcabangs->isEmpty())
            <div class="text-center py-16" data-aos="fade-up">
                <div class="w-24 h-24 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-6">
                    <i class="fas fa-building text-gray-400 text-3xl"></i>
                </div>
                <h3 class="text-2xl font-medium text-gray-900 mb-4">Belum Ada Kantor Cabang</h3>
                <p class="text-gray-600 mb-8 max-w-md mx-auto">
                    Saat ini belum ada kantor cabang yang terdaftar. Silakan hubungi customer service untuk informasi lebih lanjut.
                </p>
                <a href="/bookingpage" 
                   class="inline-flex items-center bg-indigo-600 hover:bg-indigo-700 text-white font-semibold px-6 py-3 rounded-xl transition-colors duration-200">
                    <i class="fas fa-calendar-check mr-2"></i>
                    Booking Langsung
                </a>
            </div>
            @endif
        </div>
    </section>

    <!-- Additional Services Section -->
    <section class="py-16 bg-gray-50">
        <div class="max-w-6xl mx-auto px-4 sm:px-6">
            <div class="text-center mb-12" data-aos="fade-up">
                <h2 class="text-3xl font-bold text-gray-900 mb-4">Layanan Tambahan</h2>
                <p class="text-lg text-gray-600">Fasilitas dan layanan yang tersedia di setiap kantor cabang</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                <div class="bg-white rounded-2xl p-6 shadow-sm hover:shadow-md transition-shadow duration-300" data-aos="fade-up" data-aos-delay="100">
                    <div class="w-12 h-12 bg-blue-100 rounded-xl flex items-center justify-center mb-4">
                        <i class="fas fa-headset text-blue-600 text-xl"></i>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">Customer Service</h3>
                    <p class="text-gray-600 text-sm">Layanan konsultasi dan bantuan 24/7 untuk semua kebutuhan Anda</p>
                </div>

                <div class="bg-white rounded-2xl p-6 shadow-sm hover:shadow-md transition-shadow duration-300" data-aos="fade-up" data-aos-delay="200">
                    <div class="w-12 h-12 bg-green-100 rounded-xl flex items-center justify-center mb-4">
                        <i class="fas fa-tools text-green-600 text-xl"></i>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">Maintenance</h3>
                    <p class="text-gray-600 text-sm">Workshop dan perawatan bus untuk menjamin keamanan perjalanan</p>
                </div>

                <div class="bg-white rounded-2xl p-6 shadow-sm hover:shadow-md transition-shadow duration-300" data-aos="fade-up" data-aos-delay="300">
                    <div class="w-12 h-12 bg-purple-100 rounded-xl flex items-center justify-center mb-4">
                        <i class="fas fa-credit-card text-purple-600 text-xl"></i>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">Pembayaran</h3>
                    <p class="text-gray-600 text-sm">Berbagai metode pembayaran mudah dan aman</p>
                </div>

                <div class="bg-white rounded-2xl p-6 shadow-sm hover:shadow-md transition-shadow duration-300" data-aos="fade-up" data-aos-delay="400">
                    <div class="w-12 h-12 bg-red-100 rounded-xl flex items-center justify-center mb-4">
                        <i class="fas fa-shield-alt text-red-600 text-xl"></i>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">Asuransi</h3>
                    <p class="text-gray-600 text-sm">Perlindungan asuransi untuk keamanan dan ketenangan pikiran</p>
                </div>
            </div>
        </div>
    </section>
@endsection