@extends('penyewa.layouts.app')

@section('title', 'Profile')

@section('content')
    <!-- Page Header -->
    <section class="pt-24 pb-8 bg-gradient-to-br from-indigo-50 to-purple-50">
        <div class="max-w-4xl mx-auto px-4 sm:px-6">
            <div class="text-center">
                <h1 class="text-3xl sm:text-4xl font-bold text-gray-900 mb-2">Profile Saya</h1>
                <p class="text-gray-600">Kelola informasi pribadi dan riwayat transaksi Anda</p>
            </div>
        </div>
    </section>

    <!-- Profile Content -->
    <section class="py-12 bg-white">
        <div class="max-w-4xl mx-auto px-4 sm:px-6">
            
            <!-- Profile Card -->
            <div class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden mb-8" data-aos="fade-up">
                <div class="p-8">
                    <!-- Profile Header -->
                    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between mb-6">
                        <div class="flex items-center space-x-4">
                            <div class="w-16 h-16 bg-gradient-to-br from-indigo-500 to-purple-600 rounded-2xl flex items-center justify-center">
                                <span class="text-2xl font-bold text-white">
                                    {{ substr($profile->name, 0, 1) }}
                                </span>
                            </div>
                            <div>
                                <h2 class="text-2xl font-bold text-gray-900">{{ $profile->name }}</h2>
                                <p class="text-gray-600">Member PO XYZ Pariwisata</p>
                            </div>
                        </div>
                        
                        <a href="/profile/{{ Auth::user()->id }}/edit" 
                           class="mt-4 sm:mt-0 inline-flex items-center px-4 py-2 bg-indigo-50 hover:bg-indigo-100 text-indigo-600 font-medium rounded-xl transition-colors duration-200">
                            <i class="fas fa-edit mr-2"></i>
                            Edit Profile
                        </a>
                    </div>

                    <!-- Profile Details -->
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        <div class="bg-gray-50 rounded-xl p-4">
                            <div class="flex items-center space-x-3">
                                <div class="w-10 h-10 bg-indigo-500 rounded-lg flex items-center justify-center">
                                    <i class="fas fa-envelope text-white"></i>
                                </div>
                                <div>
                                    <p class="text-sm text-gray-600">Email</p>
                                    <p class="font-medium text-gray-900">{{ $profile->email }}</p>
                                </div>
                            </div>
                        </div>

                        <div class="bg-gray-50 rounded-xl p-4">
                            <div class="flex items-center space-x-3">
                                <div class="w-10 h-10 bg-green-500 rounded-lg flex items-center justify-center">
                                    <i class="fas fa-phone text-white"></i>
                                </div>
                                <div>
                                    <p class="text-sm text-gray-600">Telepon</p>
                                    <p class="font-medium text-gray-900">{{ $profile->phone_number ?: 'Belum diisi' }}</p>
                                </div>
                            </div>
                        </div>

                        <div class="bg-gray-50 rounded-xl p-4 md:col-span-2 lg:col-span-1">
                            <div class="flex items-start space-x-3">
                                <div class="w-10 h-10 bg-red-500 rounded-lg flex items-center justify-center flex-shrink-0">
                                    <i class="fas fa-map-marker-alt text-white"></i>
                                </div>
                                <div class="min-w-0">
                                    <p class="text-sm text-gray-600">Alamat</p>
                                    <!-- <p class="font-medium text-gray-900 break-words">{{ $profile->address ?: 'Belum diisi' }}</p> -->
                                     <p class="font-medium text-gray-900 break-words">RT.006/RW.001, Cikokol, Tangerang, Tangerang City, Banten 15117</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Transaction History -->
            <div class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden" data-aos="fade-up" data-aos-delay="200">
                <div class="p-8">
                    <div class="flex items-center justify-between mb-6">
                        <h3 class="text-2xl font-bold text-gray-900">Riwayat Transaksi</h3>
                        <div class="px-3 py-1 bg-indigo-50 text-indigo-600 rounded-lg text-sm font-medium">
                            {{ $transactions->total() ?? 0 }} Transaksi
                        </div>
                    </div>

                    @if ($transactions && $transactions->count() > 0)
                        <div class="space-y-6">
                            @foreach ($transactions as $transaction)
                                <div class="border border-gray-200 rounded-xl p-6 hover:shadow-md transition-shadow duration-200">
                                    <!-- Transaction Header -->
                                    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between mb-4">
                                        <div>
                                            <h4 class="font-bold text-gray-900 mb-1">{{ $transaction->code }}</h4>
                                            <p class="text-sm text-gray-500">
                                                <i class="fas fa-calendar mr-1"></i>
                                                {{ $transaction->created_at->format('d M Y, H:i') }}
                                            </p>
                                        </div>
                                        
                                        <div class="mt-2 sm:mt-0">
                                            @php
                                                $statusColors = [
                                                    'pending' => 'bg-yellow-100 text-yellow-800',
                                                    'success' => 'bg-green-100 text-green-800',
                                                    'failed' => 'bg-red-100 text-red-800',
                                                    'processing' => 'bg-blue-100 text-blue-800'
                                                ];
                                                $statusColor = $statusColors[$transaction->transaction_status] ?? 'bg-gray-100 text-gray-800';
                                            @endphp
                                            <span class="px-3 py-1 rounded-full text-sm font-medium {{ $statusColor }}">
                                                {{ ucfirst($transaction->transaction_status) }}
                                            </span>
                                        </div>
                                    </div>

                                    <!-- Transaction Details -->
                                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 mb-4">
                                        <div>
                                            <p class="text-sm text-gray-600">Destinasi</p>
                                            <p class="font-medium text-gray-900">{{ $transaction->destination->name ?? 'N/A' }}</p>
                                        </div>
                                        <div>
                                            <p class="text-sm text-gray-600">Bus</p>
                                            <p class="font-medium text-gray-900">{{ $transaction->bus->name ?? 'N/A' }}</p>
                                        </div>
                                        <div>
                                            <p class="text-sm text-gray-600">Total Harga</p>
                                            <p class="font-bold text-indigo-600">Rp{{ number_format($transaction->total_price) }}</p>
                                        </div>
                                    </div>

                                    <!-- Action Buttons -->
                                    <div class="flex flex-col sm:flex-row gap-3">
                                        <a href="/profile/transaction/{{ $transaction->id }}" 
                                           class="flex-1 text-center bg-indigo-600 hover:bg-indigo-700 text-white font-medium px-4 py-2 rounded-lg transition-colors duration-200">
                                            <i class="fas fa-eye mr-2"></i>
                                            Detail Transaksi
                                        </a>
                                        
                                        <a href="https://wa.me/{{ $transaction->kantorcabang->phone_number ?? '' }}" 
                                           target="_blank"
                                           class="flex-1 text-center bg-green-600 hover:bg-green-700 text-white font-medium px-4 py-2 rounded-lg transition-colors duration-200">
                                            <i class="fab fa-whatsapp mr-2"></i>
                                            Hubungi Staff
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <!-- Light Theme Pagination -->
                        @if ($transactions->hasPages())
                            <div class="mt-8 flex flex-col sm:flex-row items-center justify-between space-y-4 sm:space-y-0">
                                <!-- Results Info -->
                                <div class="text-sm text-gray-500">
                                    Showing {{ $transactions->firstItem() }} to {{ $transactions->lastItem() }} of {{ $transactions->total() }} results
                                </div>

                                <!-- Pagination Controls -->
                                <div class="flex items-center">
                                    <div class="bg-white border border-gray-200 rounded-lg px-1 py-1 flex items-center space-x-1 shadow-sm">
                                        {{-- Previous Page Link --}}
                                        @if ($transactions->onFirstPage())
                                            <span class="px-3 py-2 text-gray-300 cursor-not-allowed">
                                                <i class="fas fa-chevron-left text-sm"></i>
                                            </span>
                                        @else
                                            <a href="{{ $transactions->previousPageUrl() }}" 
                                               class="px-3 py-2 text-gray-600 hover:bg-gray-50 hover:text-gray-800 rounded transition-colors duration-200">
                                                <i class="fas fa-chevron-left text-sm"></i>
                                            </a>
                                        @endif

                                        {{-- Page Numbers --}}
                                        @php
                                            $start = max(1, $transactions->currentPage() - 2);
                                            $end = min($transactions->lastPage(), $transactions->currentPage() + 2);
                                        @endphp

                                        @for ($page = $start; $page <= $end; $page++)
                                            @if ($page == $transactions->currentPage())
                                                <span class="px-3 py-2 bg-gray-200 text-gray-800 rounded font-medium">{{ $page }}</span>
                                            @else
                                                <a href="{{ $transactions->url($page) }}" 
                                                   class="px-3 py-2 text-gray-600 hover:bg-gray-100 hover:text-gray-800 rounded transition-colors duration-200">{{ $page }}</a>
                                            @endif
                                        @endfor

                                        {{-- Next Page Link --}}
                                        @if ($transactions->hasMorePages())
                                            <a href="{{ $transactions->nextPageUrl() }}" 
                                               class="px-3 py-2 text-gray-600 hover:bg-gray-50 hover:text-gray-800 rounded transition-colors duration-200">
                                                <i class="fas fa-chevron-right text-sm"></i>
                                            </a>
                                        @else
                                            <span class="px-3 py-2 text-gray-300 cursor-not-allowed">
                                                <i class="fas fa-chevron-right text-sm"></i>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endif

                    @else
                        <!-- Empty State -->
                        <div class="text-center py-12">
                            <div class="w-24 h-24 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4">
                                <i class="fas fa-receipt text-gray-400 text-3xl"></i>
                            </div>
                            <h4 class="text-lg font-medium text-gray-900 mb-2">Belum Ada Transaksi</h4>
                            <p class="text-gray-600 mb-6">Anda belum memiliki riwayat transaksi. Mulai petualangan Anda dengan memesan bus sekarang!</p>
                            <a href="/bookingpage" 
                               class="inline-flex items-center bg-gradient-to-r from-indigo-600 to-purple-600 hover:from-indigo-700 hover:to-purple-700 text-white font-semibold px-6 py-3 rounded-xl transition-all duration-300 transform hover:scale-105">
                                <i class="fas fa-plus mr-2"></i>
                                Mulai Booking
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
@endsection