@extends('penyewa.layouts.app')

@section('title', 'Detail Bus')

@section('content')
    <!-- Page Header -->
    <section class="pt-24 pb-8 bg-gradient-to-br from-indigo-50 to-purple-50">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 text-center">
            <p class="text-indigo-600 font-medium mb-2">Detail Bus</p>
            <h1 class="text-4xl sm:text-5xl font-bold text-gray-900 mb-4" data-aos="fade-up">
                {{ $bus->name }}
            </h1>
        </div>
    </section>

    <!-- Bus Details -->
    <section class="py-12 bg-white">
        <div class="max-w-4xl mx-auto px-4 sm:px-6">
            <div class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden" data-aos="fade-up">
                <!-- Bus Image -->
                <div class="relative h-96 overflow-hidden">
                    <img src="{{ Storage::url($bus->image) }}" 
                         alt="{{ $bus->name }}" 
                         class="w-full h-full object-cover">
                    <div class="absolute top-4 left-4">
                        <span class="inline-block px-3 py-1 bg-indigo-600 text-white rounded-full text-sm font-medium">
                            {{ $bus->categoryBus->name }}
                        </span>
                    </div>
                    @if($bus->status == 'available')
                        <div class="absolute top-4 right-4">
                            <span class="inline-block px-3 py-1 bg-green-500 text-white rounded-full text-sm font-medium">
                                <i class="fas fa-check-circle mr-1"></i>
                                Tersedia
                            </span>
                        </div>
                    @else
                        <div class="absolute top-4 right-4">
                            <span class="inline-block px-3 py-1 bg-red-500 text-white rounded-full text-sm font-medium">
                                <i class="fas fa-times-circle mr-1"></i>
                                Tidak Tersedia
                            </span>
                        </div>
                    @endif
                </div>

                <!-- Bus Info -->
                <div class="p-8">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <!-- Left Column -->
                        <div class="space-y-6">
                            <div>
                                <h3 class="text-lg font-semibold text-gray-900 mb-2 flex items-center">
                                    <i class="fas fa-bus text-indigo-500 mr-2"></i>
                                    Nama Bus
                                </h3>
                                <p class="text-gray-700 bg-gray-50 p-4 rounded-xl">{{ $bus->name }}</p>
                            </div>

                            <div>
                                <h3 class="text-lg font-semibold text-gray-900 mb-2 flex items-center">
                                    <i class="fas fa-tag text-indigo-500 mr-2"></i>
                                    Kategori Bus
                                </h3>
                                <p class="text-gray-700 bg-gray-50 p-4 rounded-xl">{{ $bus->categoryBus->name }}</p>
                            </div>
                        </div>

                        <!-- Right Column -->
                        <div class="space-y-6">
                            <div>
                                <h3 class="text-lg font-semibold text-gray-900 mb-2 flex items-center">
                                    <i class="fas fa-info-circle text-indigo-500 mr-2"></i>
                                    Status
                                </h3>
                                <div class="bg-gray-50 p-4 rounded-xl">
                                    @if($bus->status == 'available')
                                        <span class="inline-flex items-center px-3 py-1 bg-green-100 text-green-800 rounded-full text-sm font-medium">
                                            <i class="fas fa-check-circle mr-2"></i>
                                            Tersedia
                                        </span>
                                    @else
                                        <span class="inline-flex items-center px-3 py-1 bg-red-100 text-red-800 rounded-full text-sm font-medium">
                                            <i class="fas fa-times-circle mr-2"></i>
                                            Tidak Tersedia
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <!-- Action Button -->
                            <div>
                                @if($bus->status == 'available')
                                    <a href="/bookingpage" 
                                       class="w-full bg-gradient-to-r from-indigo-600 to-purple-600 hover:from-indigo-700 hover:to-purple-700 text-white font-semibold px-6 py-3 rounded-xl transition-all duration-300 transform hover:scale-105 shadow-lg hover:shadow-xl inline-flex items-center justify-center">
                                        <i class="fas fa-calendar-check mr-2"></i>
                                        Booking Sekarang
                                    </a>
                                @else
                                    <button disabled 
                                            class="w-full bg-gray-300 text-gray-500 font-semibold px-6 py-3 rounded-xl cursor-not-allowed inline-flex items-center justify-center">
                                        <i class="fas fa-ban mr-2"></i>
                                        Tidak Tersedia
                                    </button>
                                @endif
                            </div>
                        </div>
                    </div>

                    <!-- Description -->
                    <div class="mt-8">
                        <h3 class="text-lg font-semibold text-gray-900 mb-4 flex items-center">
                            <i class="fas fa-file-alt text-indigo-500 mr-2"></i>
                            Deskripsi
                        </h3>
                        <div class="bg-gray-50 p-6 rounded-xl">
                            <p class="text-gray-700 leading-relaxed">{{ $bus->description }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Back Button -->
            <div class="text-center mt-8" data-aos="fade-up" data-aos-delay="200">
                <a href="javascript:history.back()" 
                   class="inline-flex items-center text-indigo-600 hover:text-indigo-800 font-medium">
                    <i class="fas fa-arrow-left mr-2"></i>
                    Kembali
                </a>
            </div>
        </div>
    </section>
@endsection