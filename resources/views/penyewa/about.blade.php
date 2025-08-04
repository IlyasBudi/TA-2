@extends('penyewa.layouts.app')

@section('title', 'About')

@section('content')
    <!-- Page Header -->
    <section class="pt-24 pb-12 bg-gradient-to-br from-indigo-50 to-purple-50">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 text-center">
            <h1 class="text-4xl sm:text-5xl font-bold text-gray-900 mb-4" data-aos="fade-up">
                About Us
            </h1>
            <p class="text-xl text-gray-600 max-w-2xl mx-auto" data-aos="fade-up" data-aos-delay="100">
                Gambaran Umum PO XYZ Pariwisata - Perjalanan Nyaman, Kenangan Indah
            </p>
        </div>
    </section>

    <!-- About Content -->
    <section class="py-16 bg-white">
        <div class="max-w-6xl mx-auto px-4 sm:px-6">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">
                <!-- Main Content -->
                <div class="lg:col-span-2 space-y-8" data-aos="fade-right">
                    <!-- Company Logo -->
                    <div class="text-center lg:text-left">
                        <!-- <img src="{{ asset('/penyewatemplate') }}/assets/img/baru2/logo-XYZ.svg" 
                             alt="PO XYZ Logo" 
                             class="h-20 mx-auto lg:mx-0 mb-8"> -->
                    </div>

                    <!-- About Section -->
                    <div class="bg-gray-50 rounded-2xl p-8">
                        <h2 class="text-3xl font-bold text-gray-900 mb-6 flex items-center">
                            <div class="w-12 h-12 bg-indigo-100 rounded-xl flex items-center justify-center mr-4">
                                <i class="fas fa-bus text-indigo-600 text-xl"></i>
                            </div>
                            Tentang PO XYZ
                        </h2>
                        
                        <div class="prose prose-lg text-gray-700 space-y-4">
                            <p class="leading-relaxed">
                                PO XYZ Pariwisata adalah perusahaan penyewaan bus pariwisata yang berdiri di Indonesia untuk memenuhi kebutuhan transportasi masyarakat yang mengutamakan kenyamanan, keselamatan, dan pelayanan terbaik. 
                                Sejak awal berdiri, kami telah berkembang menjadi salah satu penyedia jasa transportasi yang terpercaya di Indonesia, melayani berbagai keperluan perjalanan mulai dari wisata lokal, kunjungan kerja, hingga perjalanan lintas provinsi.
                            </p>
                            
                            <p class="leading-relaxed">
                                Sebagai perusahaan yang berfokus pada kepuasan pelanggan, kami terus meningkatkan kualitas layanan melalui pembaruan armada, pelatihan staf, dan penerapan teknologi terkini. 
                                Dengan moto <span class="font-semibold text-indigo-600">"Perjalanan Nyaman, Kenangan Indah"</span>, kami berkomitmen untuk memberikan pengalaman perjalanan yang menyenangkan dan berkesan bagi setiap pelanggan kami.
                            </p>
                            
                            <p class="leading-relaxed">
                                Kami memahami bahwa setiap perjalanan adalah cerita baru yang berharga, dan karena itu, kami berusaha memastikan setiap detail layanan kami memenuhi kebutuhan pelanggan. 
                                Mulai dari proses pemesanan yang mudah, fasilitas bus yang lengkap, hingga pelayanan sopir yang ramah, semua kami siapkan untuk memastikan Anda mendapatkan pengalaman terbaik bersama PO XYZ Pariwisata.
                            </p>
                        </div>
                    </div>

                    <!-- History Section -->
                    <div class="bg-gradient-to-r from-indigo-50 to-purple-50 rounded-2xl p-8">
                        <h2 class="text-3xl font-bold text-gray-900 mb-6 flex items-center">
                            <div class="w-12 h-12 bg-purple-100 rounded-xl flex items-center justify-center mr-4">
                                <i class="fas fa-history text-purple-600 text-xl"></i>
                            </div>
                            Sejarah PO XYZ
                        </h2>
                        
                        <div class="prose prose-lg text-gray-700 space-y-4">
                            <p class="leading-relaxed">
                                PO XYZ didirikan dengan visi besar untuk mendukung pertumbuhan pariwisata di Indonesia. Dimulai dengan hanya beberapa armada bus, 
                                perusahaan ini kini telah berkembang menjadi salah satu pemain utama dalam industri transportasi pariwisata dengan ratusan armada modern dan jaringan operasional yang luas.
                            </p>
                            
                            <p class="leading-relaxed">
                                Kami bangga telah menjadi bagian dari banyak momen berharga pelanggan kami, dari perjalanan wisata keluarga, rombongan sekolah, hingga acara korporasi. 
                                Kepercayaan yang telah kami bangun selama bertahun-tahun adalah bukti dedikasi kami untuk memberikan layanan terbaik.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Sidebar -->
                <div class="lg:col-span-1 space-y-6" data-aos="fade-left">
                    <!-- Stats Card -->
                    <div class="bg-white rounded-2xl shadow-lg border border-gray-100 p-6">
                        <h3 class="text-xl font-bold text-gray-900 mb-6">Statistik Kami</h3>
                        <div class="space-y-4">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center">
                                    <i class="fas fa-bus text-indigo-500 mr-3"></i>
                                    <span class="text-gray-700">Total Armada</span>
                                </div>
                                <span class="font-bold text-indigo-600">200+</span>
                            </div>
                            <div class="flex items-center justify-between">
                                <div class="flex items-center">
                                    <i class="fas fa-users text-green-500 mr-3"></i>
                                    <span class="text-gray-700">Pelanggan Puas</span>
                                </div>
                                <span class="font-bold text-green-600">50K+</span>
                            </div>
                            <div class="flex items-center justify-between">
                                <div class="flex items-center">
                                    <i class="fas fa-map-marker-alt text-red-500 mr-3"></i>
                                    <span class="text-gray-700">Destinasi</span>
                                </div>
                                <span class="font-bold text-red-600">100+</span>
                            </div>
                            <div class="flex items-center justify-between">
                                <div class="flex items-center">
                                    <i class="fas fa-award text-yellow-500 mr-3"></i>
                                    <span class="text-gray-700">Pengalaman</span>
                                </div>
                                <span class="font-bold text-yellow-600">15+ Tahun</span>
                            </div>
                        </div>
                    </div>

                    <!-- Contact Card -->
                    <div class="bg-gradient-to-br from-indigo-600 to-purple-600 rounded-2xl text-white p-6">
                        <h3 class="text-xl font-bold mb-4">Punya Pertanyaan?</h3>
                        <p class="text-indigo-100 mb-6">Tim customer service kami siap membantu Anda 24/7</p>
                        <div class="space-y-3">
                            <div class="flex items-center">
                                <i class="fas fa-phone mr-3"></i>
                                <span>+62 812 3456 7890</span>
                            </div>
                            <div class="flex items-center">
                                <i class="fas fa-envelope mr-3"></i>
                                <span>poxyz@gmail.com</span>
                            </div>
                        </div>
                        <a href="/bookingpage" class="inline-block bg-white text-indigo-600 font-semibold px-6 py-3 rounded-xl mt-6 hover:bg-gray-100 transition-colors duration-200">
                            Booking Sekarang
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Branch Offices Section -->
    <section class="py-16 bg-gray-50">
        <div class="max-w-6xl mx-auto px-4 sm:px-6">
            <!-- Section Header -->
            <div class="text-center mb-12" data-aos="fade-up">
                <h2 class="text-3xl sm:text-4xl font-bold text-gray-900 mb-4">
                    Kantor Cabang Kami
                </h2>
                <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                    Kunjungi kantor cabang kami yang tersebar di berbagai lokasi untuk mendapatkan informasi lengkap terkait pemesanan bus pariwisata.
                </p>
            </div>

            <!-- Branches Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach ($kantorcabangs as $index => $kantorcabang)
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
                        <a href="/kantorcabang/{{ $kantorcabang->id }}" 
                           class="inline-flex items-center text-indigo-600 hover:text-indigo-800 font-medium text-sm mt-4">
                            Lihat Detail
                            <i class="fas fa-arrow-right ml-2 text-xs"></i>
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection