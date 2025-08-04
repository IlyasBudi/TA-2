@extends('penyewa.layouts.app')

@section('title', 'Welcome')

@section('content')
    <!-- Hero Section -->
    <section class="relative min-h-screen flex items-center bg-gradient-to-br from-indigo-50 via-white to-purple-50 overflow-hidden">
        <!-- Background Decorations -->
        <div class="absolute inset-0">
            <div class="absolute top-20 right-20 w-32 h-32 bg-gradient-to-br from-indigo-400 to-purple-600 rounded-full opacity-10 animate-pulse"></div>
            <div class="absolute bottom-20 left-20 w-24 h-24 bg-gradient-to-br from-purple-400 to-pink-600 rounded-full opacity-10 animate-pulse" style="animation-delay: 1s;"></div>
            <div class="absolute top-1/2 left-1/4 w-16 h-16 bg-gradient-to-br from-blue-400 to-indigo-600 rounded-full opacity-10 animate-pulse" style="animation-delay: 2s;"></div>
        </div>
        
        <div class="relative max-w-6xl mx-auto px-4 sm:px-6 py-20">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <!-- Hero Content -->
                <div class="space-y-8" data-aos="fade-right">
                    <div class="inline-flex items-center space-x-2 bg-white/80 backdrop-blur-sm px-4 py-2 rounded-full border border-indigo-100">
                        <div class="w-2 h-2 bg-green-500 rounded-full animate-pulse"></div>
                        <span class="text-sm font-medium text-gray-700">Layanan Bus Pariwisata Terpercaya</span>
                    </div>
                    
                    <div class="space-y-4">
                        <h1 class="text-4xl sm:text-5xl lg:text-6xl font-bold leading-tight">
                            Selamat Datang di
                            <span class="block text-transparent bg-clip-text bg-gradient-to-r from-indigo-600 to-purple-600">
                                PO XYZ
                            </span>
                            <span class="block text-3xl sm:text-4xl lg:text-5xl text-gray-800">
                                Pariwisata
                            </span>
                        </h1>
                        
                        <p class="text-lg text-gray-600 max-w-lg leading-relaxed">
                            Nikmati perjalanan yang nyaman dan mewah dengan layanan kelas atas dari kami. 
                            Pengalaman perjalanan tak terlupakan menanti Anda.
                        </p>
                    </div>
                    
                    <div class="flex flex-col sm:flex-row gap-4">
                        <a href="/bookingpage" 
                           class="group relative bg-gradient-to-r from-indigo-600 to-purple-600 hover:from-indigo-700 hover:to-purple-700 text-white font-semibold px-8 py-4 rounded-xl transition-all duration-300 transform hover:scale-105 shadow-lg hover:shadow-xl inline-flex items-center justify-center">
                            <span class="mr-2">Booking Sekarang</span>
                            <i class="fas fa-arrow-right group-hover:translate-x-1 transition-transform duration-300"></i>
                        </a>
                        
                        <a href="/about" 
                           class="group border-2 border-gray-300 hover:border-indigo-300 text-gray-700 hover:text-indigo-600 font-semibold px-8 py-4 rounded-xl transition-all duration-300 inline-flex items-center justify-center">
                            <span class="mr-2">About Us</span>
                            <i class="fas fa-info-circle"></i>
                        </a>
                    </div>
                </div>
                
                <!-- Hero Image -->
                <div class="relative" data-aos="fade-left">
                    <div class="relative z-10">
                        <img src="{{ asset('/penyewatemplate') }}/assets/img/baru2/xyz-hero.png" 
                             alt="PO XYZ Bus" 
                             class="w-full rounded-2xl shadow-2xl">
                    </div>
                    
                    <!-- Floating Elements -->
                    <div class="absolute -top-6 -right-6 w-20 h-20 bg-gradient-to-br from-yellow-400 to-orange-500 rounded-2xl opacity-80 animate-bounce"></div>
                    <div class="absolute -bottom-6 -left-6 w-16 h-16 bg-gradient-to-br from-green-400 to-blue-500 rounded-2xl opacity-80 animate-bounce" style="animation-delay: 0.5s;"></div>
                </div>
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section class="py-20 bg-white">
        <div class="max-w-6xl mx-auto px-4 sm:px-6">
            <!-- Section Header -->
            <div class="text-center max-w-3xl mx-auto mb-16" data-aos="fade-up">
                <h2 class="text-3xl sm:text-4xl font-bold text-gray-900 mb-4">
                    Mengapa Memilih <span class="text-transparent bg-clip-text bg-gradient-to-r from-indigo-600 to-purple-600">PO XYZ?</span>
                </h2>
                <p class="text-lg text-gray-600">
                    Kami berkomitmen memberikan layanan terbaik untuk perjalanan Anda
                </p>
            </div>
            
            <!-- Services Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <!-- Service 1 -->
                <div class="group text-center p-6 rounded-2xl hover:bg-indigo-50 transition-all duration-300" data-aos="fade-up" data-aos-delay="100">
                    <div class="w-16 h-16 bg-gradient-to-br from-indigo-500 to-purple-600 rounded-2xl flex items-center justify-center mx-auto mb-4 group-hover:scale-110 transition-transform duration-300">
                        <i class="fas fa-tasks text-white text-xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-3">Fasilitas Lengkap</h3>
                    <p class="text-gray-600 text-sm leading-relaxed">
                        LED TV, karaoke, AC, charging port, dan fasilitas premium lainnya
                    </p>
                </div>
                
                <!-- Service 2 -->
                <div class="group text-center p-6 rounded-2xl hover:bg-purple-50 transition-all duration-300" data-aos="fade-up" data-aos-delay="200">
                    <div class="w-16 h-16 bg-gradient-to-br from-purple-500 to-pink-600 rounded-2xl flex items-center justify-center mx-auto mb-4 group-hover:scale-110 transition-transform duration-300">
                        <i class="fas fa-star text-white text-xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-3">Kebersihan Terjamin</h3>
                    <p class="text-gray-600 text-sm leading-relaxed">
                        Standar kebersihan tinggi dan sanitasi terbaik untuk kenyamanan Anda
                    </p>
                </div>
                
                <!-- Service 3 -->
                <div class="group text-center p-6 rounded-2xl hover:bg-blue-50 transition-all duration-300" data-aos="fade-up" data-aos-delay="300">
                    <div class="w-16 h-16 bg-gradient-to-br from-blue-500 to-indigo-600 rounded-2xl flex items-center justify-center mx-auto mb-4 group-hover:scale-110 transition-transform duration-300">
                        <i class="fas fa-users text-white text-xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-3">Driver Profesional</h3>
                    <p class="text-gray-600 text-sm leading-relaxed">
                        Pengemudi berpengalaman, berlisensi, dan mengutamakan keselamatan
                    </p>
                </div>
                
                <!-- Service 4 -->
                <div class="group text-center p-6 rounded-2xl hover:bg-green-50 transition-all duration-300" data-aos="fade-up" data-aos-delay="400">
                    <div class="w-16 h-16 bg-gradient-to-br from-green-500 to-teal-600 rounded-2xl flex items-center justify-center mx-auto mb-4 group-hover:scale-110 transition-transform duration-300">
                        <i class="fas fa-wrench text-white text-xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-3">Perawatan Rutin</h3>
                    <p class="text-gray-600 text-sm leading-relaxed">
                        Maintenance berkala dan team mekanik standby 24/7
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Fleet Showcase -->
    <section class="py-20 bg-gradient-to-br from-gray-50 to-indigo-50">
        <div class="max-w-6xl mx-auto px-4 sm:px-6">
            <!-- Section Header -->
            <div class="text-center mb-16" data-aos="fade-up">
                <h2 class="text-3xl sm:text-4xl font-bold text-gray-900 mb-4">
                    Armada <span class="text-transparent bg-clip-text bg-gradient-to-r from-indigo-600 to-purple-600">Terbaik</span> Kami
                </h2>
                <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                    Berbagai pilihan bus berkualitas tinggi untuk setiap kebutuhan perjalanan Anda
                </p>
            </div>
            
            <!-- Featured Buses -->
            <div class="space-y-16">
                <!-- Big Bus 46 Seat -->
                <div class="bg-white rounded-3xl shadow-xl overflow-hidden" data-aos="fade-up">
                    <div class="grid grid-cols-1 lg:grid-cols-2">
                        <div class="relative h-64 lg:h-auto">
                            <img src="{{ asset('/penyewatemplate') }}/assets/img/baru2/Bigbus Seat 46.png" 
                                 alt="Big Bus 46 Seat" 
                                 class="w-full h-full object-cover">
                            <div class="absolute top-4 left-4 bg-gradient-to-r from-indigo-600 to-purple-600 text-white px-3 py-1 rounded-full text-sm font-medium">
                                Premium
                            </div>
                        </div>
                        <div class="p-8 lg:p-12 flex flex-col justify-center">
                            <h3 class="text-2xl lg:text-3xl font-bold text-gray-900 mb-4">
                                BIG BUS Seat 46 2-2 Toilet
                            </h3>
                            <div class="space-y-3 mb-6">
                                <div class="flex items-center text-gray-600">
                                    <i class="fas fa-users text-indigo-500 w-5 mr-3"></i>
                                    <span>46 Penumpang, Konfigurasi 2-2</span>
                                </div>
                                <div class="flex items-center text-gray-600">
                                    <i class="fas fa-snowflake text-indigo-500 w-5 mr-3"></i>
                                    <span>AC, Toilet, Smoking Room</span>
                                </div>
                                <div class="flex items-center text-gray-600">
                                    <i class="fas fa-tv text-indigo-500 w-5 mr-3"></i>
                                    <span>TV, Radio, Karaoke, USB Charging</span>
                                </div>
                            </div>
                            <a href="/bookingpage" 
                               class="inline-flex items-center bg-gradient-to-r from-indigo-600 to-purple-600 hover:from-indigo-700 hover:to-purple-700 text-white font-semibold px-6 py-3 rounded-xl transition-all duration-300 w-fit">
                                Pesan Sekarang
                                <i class="fas fa-arrow-right ml-2"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Big Bus 50 Seat -->
                <div class="bg-white rounded-3xl shadow-xl overflow-hidden" data-aos="fade-up">
                    <div class="grid grid-cols-1 lg:grid-cols-2">
                        <div class="relative h-64 lg:h-auto">
                            <img src="{{ asset('/penyewatemplate') }}/assets/img/baru2/Bigbus Seat 50.png" 
                                 alt="Big Bus 50 Seat" 
                                 class="w-full h-full object-cover">
                            <div class="absolute top-3 left-3 bg-purple-600 text-white px-2 py-1 rounded-lg text-xs font-medium">
                                Eksekutif
                            </div>
                        </div>
                        <div class="p-8 lg:p-12 flex flex-col justify-center">
                            <h3 class="text-2xl lg:text-3xl font-bold text-gray-900 mb-4">
                                BIG BUS Seat 50 2-2 Toilet
                            </h3>
                            <div class="space-y-3 mb-6">
                                <div class="flex items-center text-gray-600">
                                    <i class="fas fa-users text-indigo-500 w-5 mr-3"></i>
                                    <span>50 Penumpang, Konfigurasi 2-2</span>
                                </div>
                                <div class="flex items-center text-gray-600">
                                    <i class="fas fa-snowflake text-indigo-500 w-5 mr-3"></i>
                                    <span>AC, Toilet, Smoking Room</span>
                                </div>
                                <div class="flex items-center text-gray-600">
                                    <i class="fas fa-tv text-indigo-500 w-5 mr-3"></i>
                                    <span>TV, Radio, Karaoke, USB Charging</span>
                                </div>
                            </div>
                            <a href="/bookingpage" 
                               class="inline-flex items-center bg-gradient-to-r from-indigo-600 to-purple-600 hover:from-indigo-700 hover:to-purple-700 text-white font-semibold px-6 py-3 rounded-xl transition-all duration-300 w-fit">
                                Pesan Sekarang
                                <i class="fas fa-arrow-right ml-2"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Big Bus 59 Seat -->
                <div class="bg-white rounded-3xl shadow-xl overflow-hidden" data-aos="fade-up">
                    <div class="grid grid-cols-1 lg:grid-cols-2">
                        <div class="relative h-64 lg:h-auto">
                            <img src="{{ asset('/penyewatemplate') }}/assets/img/baru2/Bigbus Seat 59.png" 
                                 alt="Big Bus 59 Seat" 
                                 class="w-full h-full object-cover">
                            <div class="absolute top-3 left-3 bg-blue-600 text-white px-2 py-1 rounded-lg text-xs font-medium">
                                Ekonomis
                            </div>
                        </div>
                        <div class="p-8 lg:p-12 flex flex-col justify-center">
                            <h3 class="text-2xl lg:text-3xl font-bold text-gray-900 mb-4">
                                BIG BUS Seat 59 2-2 Non Toilet
                            </h3>
                            <div class="space-y-3 mb-6">
                                <div class="flex items-center text-gray-600">
                                    <i class="fas fa-users text-indigo-500 w-5 mr-3"></i>
                                    <span>59 Penumpang, Konfigurasi 2-3</span>
                                </div>
                                <div class="flex items-center text-gray-600">
                                    <i class="fas fa-snowflake text-indigo-500 w-5 mr-3"></i>
                                    <span>AC, Smoking Room</span>
                                </div>
                                <div class="flex items-center text-gray-600">
                                    <i class="fas fa-tv text-indigo-500 w-5 mr-3"></i>
                                    <span>TV, Radio, Karaoke, USB Charging</span>
                                </div>
                            </div>
                            <a href="/bookingpage" 
                               class="inline-flex items-center bg-gradient-to-r from-indigo-600 to-purple-600 hover:from-indigo-700 hover:to-purple-700 text-white font-semibold px-6 py-3 rounded-xl transition-all duration-300 w-fit">
                                Pesan Sekarang
                                <i class="fas fa-arrow-right ml-2"></i>
                            </a>
                        </div>
                    </div>
                </div>
                
                <!-- Other Buses Grid -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    <!-- Medium Bus -->
                    <div class="bg-white rounded-2xl shadow-lg overflow-hidden group hover:shadow-xl transition-all duration-300" data-aos="fade-up" data-aos-delay="200">
                        <div class="relative h-48 overflow-hidden">
                            <img src="{{ asset('/penyewatemplate') }}/assets/img/baru2/Medium Bus.png" 
                                 alt="Medium Bus" 
                                 class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                            <div class="absolute top-3 left-3 bg-green-600 text-white px-2 py-1 rounded-lg text-xs font-medium">
                                Medium
                            </div>
                        </div>
                        <div class="p-6">
                            <h4 class="text-lg font-bold text-gray-900 mb-2">Medium Bus</h4>
                            <p class="text-sm text-gray-600 mb-4">35 Seat, Konf 2-2, Non Toilet, Full AC, TV, Karaoke, USB Charging, Ambient Light.</p>
                            <a href="/bookingpage" 
                               class="text-indigo-600 hover:text-indigo-800 font-medium text-sm inline-flex items-center">
                                Pesan Sekarang
                                <i class="fas fa-chevron-right ml-1 text-xs"></i>
                            </a>
                        </div>
                    </div>
                    <!-- Elf Bus -->
                    <div class="bg-white rounded-2xl shadow-lg overflow-hidden group hover:shadow-xl transition-all duration-300" data-aos="fade-up" data-aos-delay="200">
                        <div class="relative h-48 overflow-hidden">
                            <img src="{{ asset('/penyewatemplate') }}/assets/img/baru2/Microbus-ELF.jpg" 
                                 alt="Microbus ELF" 
                                 class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                            <div class="absolute top-3 left-3 bg-green-600 text-white px-2 py-1 rounded-lg text-xs font-medium">
                                ELF
                            </div>
                        </div>
                        <div class="p-6">
                            <h4 class="text-lg font-bold text-gray-900 mb-2">ELF</h4>
                            <p class="text-sm text-gray-600 mb-4">18 Seat, Full AC, Charging Port, TV, Radio, Karaoke, APAR Ready, Ambient Light.</p>
                            <a href="/bookingpage" 
                               class="text-indigo-600 hover:text-indigo-800 font-medium text-sm inline-flex items-center">
                                Pesan Sekarang
                                <i class="fas fa-chevron-right ml-1 text-xs"></i>
                            </a>
                        </div>
                    </div>
                    <!-- Elf Bus -->
                    <div class="bg-white rounded-2xl shadow-lg overflow-hidden group hover:shadow-xl transition-all duration-300" data-aos="fade-up" data-aos-delay="200">
                        <div class="relative h-48 overflow-hidden">
                            <img src="{{ asset('/penyewatemplate') }}/assets/img/baru2/Microbus-Hiace.png" 
                                 alt="Microbus Hiace" 
                                 class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                            <div class="absolute top-3 left-3 bg-green-600 text-white px-2 py-1 rounded-lg text-xs font-medium">
                                Hiace
                            </div>
                        </div>
                        <div class="p-6">
                            <h4 class="text-lg font-bold text-gray-900 mb-2">Hiace</h4>
                            <p class="text-sm text-gray-600 mb-4">14 Seat, Full AC, Charging Port, TV, Radio, Karaoke, APAR Ready, Ambient Light.</p>
                            <a href="/bookingpage" 
                               class="text-indigo-600 hover:text-indigo-800 font-medium text-sm inline-flex items-center">
                                Pesan Sekarang
                                <i class="fas fa-chevron-right ml-1 text-xs"></i>
                            </a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <!-- Branch Offices -->
    <section class="py-20 bg-white">
        <div class="max-w-6xl mx-auto px-4 sm:px-6">
            <!-- Section Header -->
            <div class="text-center mb-16" data-aos="fade-up">
                <h2 class="text-3xl sm:text-4xl font-bold text-gray-900 mb-4">
                    <a href="/kantorcabang" class="hover:text-indigo-600 transition-colors duration-300">
                        Kantor Cabang Kami
                    </a>
                </h2>
                <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                    Temukan lokasi kantor cabang terdekat untuk konsultasi dan pemesanan
                </p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse ($kantorcabangs as $index => $kantorcabang)
                <div class="group bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-xl transition-all duration-300" data-aos="fade-up" data-aos-delay="{{ $index * 100 }}">
                    <div class="relative h-48 overflow-hidden">
                        <img src="{{ Storage::url($kantorcabang->image) }}" 
                             alt="{{ $kantorcabang->name }}" 
                             class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/30 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-gray-900 mb-2 group-hover:text-indigo-600 transition-colors duration-300">
                            <a href="/kantorcabang/{{ $kantorcabang->id }}">{{ $kantorcabang->name }}</a>
                        </h3>
                        <div class="flex items-start space-x-2 text-gray-600">
                            <i class="fas fa-map-marker-alt text-indigo-500 mt-1 flex-shrink-0"></i>
                            <p class="text-sm leading-relaxed">
                                {{ substr($kantorcabang->address, 0, 80) }}{{ strlen($kantorcabang->address) > 80 ? '...' : '' }}
                            </p>
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-span-3 text-center py-12">
                    <div class="w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-building text-gray-400 text-2xl"></i>
                    </div>
                    <p class="text-gray-500">Belum ada data kantor cabang</p>
                </div>
                @endforelse
            </div>
        </div>
    </section>

    <!-- Destinations -->
    <section class="py-20 bg-gradient-to-br from-indigo-50 to-purple-50">
        <div class="max-w-6xl mx-auto px-4 sm:px-6">
            <!-- Section Header -->
            <div class="text-center mb-16" data-aos="fade-up">
                <h2 class="text-3xl sm:text-4xl font-bold text-gray-900 mb-4">
                    Destinasi <span class="text-transparent bg-clip-text bg-gradient-to-r from-indigo-600 to-purple-600">Populer</span>
                </h2>
                <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                    Jelajahi keindahan Indonesia dengan kenyamanan perjalanan terbaik
                </p>
            </div>
            
            <!-- Destinations Grid -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Bali -->
                <div class="group relative h-80 rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-500" data-aos="zoom-in">
                    <img src="https://images.unsplash.com/photo-1537996194471-e657df975ab4?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTV8fGJhbGl8ZW58MHx8MHx8fDA%3D" 
                         alt="Bali" 
                         class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-transparent to-transparent"></div>
                    <div class="absolute bottom-0 left-0 right-0 p-6 text-white">
                        <div class="transform translate-y-2 group-hover:translate-y-0 transition-transform duration-300">
                            <h3 class="text-2xl font-bold mb-1">Bali</h3>
                            <p class="text-gray-200 text-sm mb-3">Pura Ulun Danu Bedugul</p>
                            <div class="opacity-0 group-hover:opacity-100 transition-opacity duration-300 delay-100">
                                <span class="inline-flex items-center text-sm text-indigo-300">
                                    Jelajahi sekarang
                                    <i class="fas fa-arrow-right ml-2"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Yogyakarta -->
                <div class="group relative h-80 rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-500" data-aos="zoom-in" data-aos-delay="100">
                    <img src="https://images.unsplash.com/photo-1628488321763-eb2f79b7f3b5?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8NDh8fHByYW1iYW5hbiUyMHRlbXBsZXxlbnwwfHwwfHx8MA%3D%3D" 
                         alt="Yogyakarta" 
                         class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-transparent to-transparent"></div>
                    <div class="absolute bottom-0 left-0 right-0 p-6 text-white">
                        <div class="transform translate-y-2 group-hover:translate-y-0 transition-transform duration-300">
                            <h3 class="text-2xl font-bold mb-1">Yogyakarta</h3>
                            <p class="text-gray-200 text-sm mb-3">Candi Prambanan</p>
                            <div class="opacity-0 group-hover:opacity-100 transition-opacity duration-300 delay-100">
                                <span class="inline-flex items-center text-sm text-indigo-300">
                                    Jelajahi sekarang
                                    <i class="fas fa-arrow-right ml-2"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Malang -->
                <div class="group relative h-80 rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-500" data-aos="zoom-in" data-aos-delay="200">
                    <img src="https://i.pinimg.com/564x/21/1a/fb/211afbaa2a8c57b83a3576db148591fc.jpg" 
                         alt="Malang" 
                         class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-transparent to-transparent"></div>
                    <div class="absolute bottom-0 left-0 right-0 p-6 text-white">
                        <div class="transform translate-y-2 group-hover:translate-y-0 transition-transform duration-300">
                            <h3 class="text-2xl font-bold mb-1">Malang</h3>
                            <p class="text-gray-200 text-sm mb-3">Bromo-Tengger-Semeru</p>
                            <div class="opacity-0 group-hover:opacity-100 transition-opacity duration-300 delay-100">
                                <span class="inline-flex items-center text-sm text-indigo-300">
                                    Jelajahi sekarang
                                    <i class="fas fa-arrow-right ml-2"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Call to Action -->
    <section class="py-14 bg-gradient-to-r from-indigo-600 to-purple-600 relative overflow-hidden">
        <!-- Background Pattern -->
        <div class="absolute inset-0">
            <div class="absolute top-0 left-0 w-64 h-64 bg-white/10 rounded-full blur-3xl -translate-x-32 -translate-y-32"></div>
            <div class="absolute bottom-0 right-0 w-64 h-64 bg-white/10 rounded-full blur-3xl translate-x-32 translate-y-32"></div>
        </div>
        
        <div class="relative max-w-4xl mx-auto px-4 sm:px-6 text-center">
            <div data-aos="zoom-in">
                <h2 class="text-3xl sm:text-4xl lg:text-5xl font-bold text-white mb-6">
                    Siap untuk Perjalanan <br class="hidden sm:block">
                    <span class="text-yellow-300">Tak Terlupakan?</span>
                </h2>
                
                <p class="text-xl text-indigo-100 mb-8 max-w-2xl mx-auto">
                    Jangan tunggu lagi! Pesan bus pariwisata terbaik sekarang dan nikmati 
                    perjalanan yang nyaman dengan harga terjangkau.
                </p>
                
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="/bookingpage" 
                       class="group bg-white hover:bg-gray-100 text-indigo-600 font-bold px-8 py-4 rounded-xl transition-all duration-300 transform hover:scale-105 shadow-lg inline-flex items-center justify-center">
                        <i class="fas fa-calendar-alt mr-2"></i>
                        <span>Booking Sekarang</span>
                        <i class="fas fa-arrow-right ml-2 group-hover:translate-x-1 transition-transform duration-300"></i>
                    </a>
                    
                    <a href="tel:+6281234567890" 
                       class="group border-2 border-white hover:bg-white hover:text-indigo-600 text-white font-semibold px-8 py-4 rounded-xl transition-all duration-300 inline-flex items-center justify-center">
                        <i class="fas fa-phone mr-2"></i>
                        <span>Hubungi Kami</span>
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection