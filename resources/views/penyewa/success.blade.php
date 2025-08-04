@extends('penyewa.layouts.app')

@section('title', 'Pembayaran Berhasil')

@section('content')
    <!-- Success Page -->
    <section class="min-h-screen flex items-center justify-center bg-gradient-to-br from-green-50 to-emerald-50 py-12">
        <div class="max-w-2xl mx-auto px-4 sm:px-6 text-center">
            <!-- Success Animation -->
            <div class="mb-8" data-aos="zoom-in">
                <div class="relative inline-block">
                    <!-- Success Icon -->
                    <div class="w-32 h-32 bg-green-500 rounded-full flex items-center justify-center mx-auto mb-6 animate-pulse">
                        <i class="fas fa-check text-white text-5xl"></i>
                    </div>
                    
                    <!-- Floating Elements -->
                    <div class="absolute -top-4 -right-4 w-8 h-8 bg-yellow-400 rounded-full animate-bounce" style="animation-delay: 0.5s;"></div>
                    <div class="absolute -bottom-4 -left-4 w-6 h-6 bg-blue-400 rounded-full animate-bounce" style="animation-delay: 1s;"></div>
                    <div class="absolute top-1/2 -right-8 w-4 h-4 bg-purple-400 rounded-full animate-bounce" style="animation-delay: 1.5s;"></div>
                </div>
            </div>

            <!-- Success Message -->
            <div class="space-y-6" data-aos="fade-up" data-aos-delay="200">
                <h1 class="text-4xl sm:text-5xl font-bold text-gray-900">
                    Pembayaran Berhasil! 🎉
                </h1>
                
                <div class="bg-white rounded-2xl shadow-lg p-8 max-w-lg mx-auto">
                    <div class="space-y-4">
                        <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto">
                            <i class="fas fa-bus text-green-600 text-2xl"></i>
                        </div>
                        
                        <h2 class="text-2xl font-semibold text-gray-900">Terima Kasih!</h2>
                        
                        <p class="text-gray-600 leading-relaxed">
                            Terima kasih sudah mempercayakan perjalanan wisata Anda kepada 
                            <span class="font-semibold text-indigo-600">PO XYZ Pariwisata</span>. 
                            Kami akan memberikan pelayanan terbaik untuk perjalanan Anda.
                        </p>

                        <!-- Transaction Status -->
                        <div class="bg-green-50 rounded-xl p-4">
                            <div class="flex items-center justify-center space-x-2">
                                <i class="fas fa-check-circle text-green-500"></i>
                                <span class="text-green-800 font-medium">Transaksi Berhasil Diproses</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Next Steps -->
            <div class="mt-12 space-y-6" data-aos="fade-up" data-aos-delay="400">
                <h3 class="text-xl font-semibold text-gray-900">Langkah Selanjutnya</h3>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 max-w-4xl mx-auto">
                    <!-- <div class="bg-white rounded-xl p-6 shadow-sm">
                        <div class="w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-3">
                            <i class="fas fa-envelope text-blue-600"></i>
                        </div>
                        <h4 class="font-semibold text-gray-900 mb-2">Cek Email</h4>
                        <p class="text-gray-600 text-sm">Konfirmasi booking akan dikirim ke email Anda</p>
                    </div> -->
                    
                    <div class="bg-white rounded-xl p-6 shadow-sm">
                        <div class="w-12 h-12 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-3">
                            <i class="fas fa-phone text-green-600"></i>
                        </div>
                        <h4 class="font-semibold text-gray-900 mb-2">Kontak Kami</h4>
                        <p class="text-gray-600 text-sm">Tim kami akan menghubungi Anda segera</p>
                    </div>
                    
                    <div class="bg-white rounded-xl p-6 shadow-sm">
                        <div class="w-12 h-12 bg-purple-100 rounded-full flex items-center justify-center mx-auto mb-3">
                            <i class="fas fa-calendar text-purple-600"></i>
                        </div>
                        <h4 class="font-semibold text-gray-900 mb-2">Siap Berangkat</h4>
                        <p class="text-gray-600 text-sm">Persiapkan perjalanan Anda dengan baik</p>
                    </div>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="mt-12 flex flex-col sm:flex-row gap-4 justify-center" data-aos="fade-up" data-aos-delay="600">
                <a href="/profile/{{ Auth::user()->id }}" 
                   class="bg-indigo-600 hover:bg-indigo-700 text-white font-semibold px-8 py-4 rounded-xl transition-all duration-300 transform hover:scale-105 shadow-lg hover:shadow-xl">
                    <i class="fas fa-user mr-2"></i>
                    Lihat Profile Saya
                </a>
                
                <a href="/bookingpage" 
                   class="border-2 border-indigo-300 hover:border-indigo-500 text-indigo-600 hover:text-indigo-800 font-semibold px-8 py-4 rounded-xl transition-all duration-300">
                    <i class="fas fa-plus mr-2"></i>
                    Booking Lagi
                </a>
            </div>

            <!-- Customer Service -->
            <div class="mt-12 bg-blue-50 rounded-2xl p-6" data-aos="fade-up" data-aos-delay="800">
                <h3 class="text-lg font-semibold text-blue-900 mb-3">Butuh Bantuan?</h3>
                <p class="text-blue-800 mb-4">Tim customer service kami siap membantu 24/7</p>
                <div class="flex flex-col sm:flex-row gap-3 justify-center">
                    <a href="tel:+6281234567890" 
                       class="bg-green-600 hover:bg-green-700 text-white font-medium px-6 py-3 rounded-lg transition-colors duration-200">
                        <i class="fas fa-phone mr-2"></i>
                        Telepon Kami
                    </a>
                    <a href="https://wa.me/6281234567890" 
                       target="_blank"
                       class="bg-green-500 hover:bg-green-600 text-white font-medium px-6 py-3 rounded-lg transition-colors duration-200">
                        <i class="fab fa-whatsapp mr-2"></i>
                        WhatsApp
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection