@extends('penyewa.layouts.app')

@section('title', 'Detail Kantor Cabang')

@push('before-style')
    <!-- Leaflet CSS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.8.0/dist/leaflet.css"
        integrity="sha512-hoalWLoI8r4UszCkZ5kL8vayOGVae1oxXe/2A4AO6J9+580uKHDO3JdHb7NzwwzK5xr/Fs0W40kiNHxM9vyTtQ=="
        crossorigin="" />

    <script src="https://unpkg.com/leaflet@1.8.0/dist/leaflet.js"
        integrity="sha512-BB3hKbKWOc9Ez/TAwyWxNXeoV9c1v6FIeYiBieIWkpLjauysF18NzgR1MBNBXf8/KABdlkX68nAhlwcDFLGPCQ=="
        crossorigin=""></script>

    <script src='https://api.mapbox.com/mapbox.js/plugins/leaflet-fullscreen/v1.0.1/Leaflet.fullscreen.min.js'></script>
    <link href='https://api.mapbox.com/mapbox.js/plugins/leaflet-fullscreen/v1.0.1/leaflet.fullscreen.css' rel='stylesheet' />

    <link rel="stylesheet" href="{{ asset('css/leaflet-search.css') }}">
    <script src="{{ asset('js/leaflet-search.js') }}"></script>

    <script src="https://cdn.jsdelivr.net/npm/leaflet.locatecontrol@0.79.0/dist/L.Control.Locate.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/leaflet.locatecontrol@0.79.0/dist/L.Control.Locate.min.css" rel="stylesheet">

    <style>
        #map {
            height: 350px;
            width: 100%;
            border-radius: 12px;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
        }
    </style>
@endpush

@section('content')
    <!-- Page Header -->
    <section class="pt-24 pb-8 bg-gradient-to-br from-indigo-50 to-purple-50">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 text-center">
            <p class="text-indigo-600 font-medium mb-2">Kantor Cabang</p>
            <h1 class="text-4xl sm:text-5xl font-bold text-gray-900 mb-4" data-aos="fade-up">
                {{ $kantorcabang->name }}
            </h1>
        </div>
    </section>

    <!-- Office Details -->
    <section class="py-12 bg-white">
        <div class="max-w-6xl mx-auto px-4 sm:px-6">
            <div class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden" data-aos="fade-up">
                <!-- Office Image -->
                <div class="relative h-96 overflow-hidden">
                    <img src="{{ Storage::url($kantorcabang->image) }}" 
                         alt="{{ $kantorcabang->name }}" 
                         class="w-full h-full object-cover">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/20 to-transparent"></div>
                </div>

                <!-- Office Info -->
                <div class="p-8">
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                        <!-- Left Column - Office Details -->
                        <div class="space-y-6">
                            <div>
                                <h3 class="text-lg font-semibold text-gray-900 mb-3 flex items-center">
                                    <i class="fas fa-building text-indigo-500 mr-2"></i>
                                    Nama Kantor
                                </h3>
                                <p class="text-gray-700 bg-gray-50 p-4 rounded-xl">{{ $kantorcabang->name }}</p>
                            </div>

                            <div>
                                <h3 class="text-lg font-semibold text-gray-900 mb-3 flex items-center">
                                    <i class="fas fa-phone text-indigo-500 mr-2"></i>
                                    Nomor Telepon
                                </h3>
                                <div class="bg-gray-50 p-4 rounded-xl">
                                    <a href="tel:{{ $kantorcabang->phone_number }}" 
                                       class="text-indigo-600 hover:text-indigo-800 font-medium">
                                        {{ $kantorcabang->phone_number }}
                                    </a>
                                </div>
                            </div>

                            <div>
                                <h3 class="text-lg font-semibold text-gray-900 mb-3 flex items-center">
                                    <i class="fas fa-map-marker-alt text-indigo-500 mr-2"></i>
                                    Alamat
                                </h3>
                                <p class="text-gray-700 bg-gray-50 p-4 rounded-xl leading-relaxed">{{ $kantorcabang->address }}</p>
                            </div>

                            <!-- Contact Actions -->
                            <div class="flex flex-col sm:flex-row gap-4">
                                <a href="tel:{{ $kantorcabang->phone_number }}" 
                                   class="flex-1 bg-green-600 hover:bg-green-700 text-white font-semibold px-6 py-3 rounded-xl transition-colors duration-200 text-center">
                                    <i class="fas fa-phone mr-2"></i>
                                    Telepon
                                </a>
                                <a href="https://wa.me/{{ $kantorcabang->phone_number }}" 
                                   target="_blank"
                                   class="flex-1 bg-green-500 hover:bg-green-600 text-white font-semibold px-6 py-3 rounded-xl transition-colors duration-200 text-center">
                                    <i class="fab fa-whatsapp mr-2"></i>
                                    WhatsApp
                                </a>
                            </div>
                        </div>

                        <!-- Right Column - Map -->
                        <div>
                            <h3 class="text-lg font-semibold text-gray-900 mb-3 flex items-center">
                                <i class="fas fa-map text-indigo-500 mr-2"></i>
                                Lokasi
                            </h3>
                            <div id="map" class="rounded-xl"></div>
                            <p class="text-xs text-gray-500 mt-2">
                                <i class="fas fa-info-circle mr-1"></i>
                                Klik pada marker untuk melihat informasi lengkap
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Bus Fleet Section -->
    <section class="py-16 bg-gray-50">
        <div class="max-w-6xl mx-auto px-4 sm:px-6">
            <!-- Section Header -->
            <div class="text-center mb-12" data-aos="fade-up">
                <h2 class="text-3xl sm:text-4xl font-bold text-gray-900 mb-4">
                    Armada Bus Tersedia
                </h2>
                <p class="text-lg text-gray-600 mb-4">
                    Bus-bus yang tersedia di kantor cabang {{ $kantorcabang->name }}
                </p>
                
                <!-- Bus Count -->
                <div class="mt-6">
                    <span class="inline-flex items-center px-4 py-2 bg-indigo-50 text-indigo-600 rounded-lg text-sm font-medium">
                        <i class="fas fa-bus mr-2"></i>
                        {{ $buses->total() ?? 0 }} Bus Tersedia
                    </span>
                </div>
            </div>

            @if ($buses && $buses->count() > 0)
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach ($buses as $index => $bus)
                    <div class="group bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-xl transition-all duration-300" data-aos="fade-up" data-aos-delay="{{ $index * 100 }}">
                        <div class="relative h-48 overflow-hidden">
                            <img src="{{ Storage::url($bus->image) }}" 
                                 alt="{{ $bus->name }}" 
                                 class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                            
                            <!-- Status Badge -->
                            @if($bus->status == 'available')
                                <div class="absolute top-3 right-3">
                                    <span class="px-2 py-1 bg-green-500 text-white rounded-lg text-xs font-medium">
                                        <i class="fas fa-check-circle mr-1"></i>
                                        Tersedia
                                    </span>
                                </div>
                            @else
                                <div class="absolute top-3 right-3">
                                    <span class="px-2 py-1 bg-red-500 text-white rounded-lg text-xs font-medium">
                                        <i class="fas fa-times-circle mr-1"></i>
                                        Tidak Tersedia
                                    </span>
                                </div>
                            @endif
                        </div>
                        
                        <div class="p-6">
                            <h3 class="text-xl font-bold text-gray-900 mb-2 group-hover:text-indigo-600 transition-colors duration-300">
                                <a href="/bus/{{ $bus->id }}">{{ $bus->name }}</a>
                            </h3>
                            <p class="text-gray-600 text-sm mb-4 line-clamp-2">{{ $bus->description }}</p>
                            
                            <div class="flex items-center justify-between mb-4">
                                <span class="text-sm text-indigo-600 font-medium">{{ $bus->categoryBus->name ?? 'N/A' }}</span>
                                <span class="text-xs px-2 py-1 bg-gray-100 text-gray-600 rounded-full">
                                    {{ $bus->status ?? 'N/A' }}
                                </span>
                            </div>
                            
                            <div class="flex items-center justify-between">
                                <a href="/bus/{{ $bus->id }}" 
                                   class="flex-1 text-center bg-indigo-600 hover:bg-indigo-700 text-white font-medium px-4 py-2 rounded-lg transition-colors duration-200 mr-2">
                                    <i class="fas fa-eye mr-1"></i>
                                    Detail
                                </a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

                <!-- Light Theme Pagination -->
                @if ($buses->hasPages())
                    <div class="mt-12 flex flex-col sm:flex-row items-center justify-between space-y-4 sm:space-y-0">
                        <!-- Results Info -->
                        <div class="text-sm text-gray-500">
                            Showing {{ $buses->firstItem() }} to {{ $buses->lastItem() }} of {{ $buses->total() }} bus
                        </div>

                        <!-- Pagination Controls -->
                        <div class="flex items-center">
                            <div class="bg-white border border-gray-200 rounded-lg px-1 py-1 flex items-center space-x-1 shadow-sm">
                                {{-- Previous Page Link --}}
                                @if ($buses->onFirstPage())
                                    <span class="px-3 py-2 text-gray-300 cursor-not-allowed">
                                        <i class="fas fa-chevron-left text-sm"></i>
                                    </span>
                                @else
                                    <a href="{{ $buses->previousPageUrl() }}" 
                                       class="px-3 py-2 text-gray-600 hover:bg-gray-50 hover:text-gray-800 rounded transition-colors duration-200">
                                        <i class="fas fa-chevron-left text-sm"></i>
                                    </a>
                                @endif

                                {{-- Page Numbers --}}
                                @php
                                    $start = max(1, $buses->currentPage() - 2);
                                    $end = min($buses->lastPage(), $buses->currentPage() + 2);
                                @endphp

                                @for ($page = $start; $page <= $end; $page++)
                                    @if ($page == $buses->currentPage())
                                        <span class="px-3 py-2 bg-gray-700 text-white rounded font-medium">{{ $page }}</span>
                                    @else
                                        <a href="{{ $buses->url($page) }}" 
                                           class="px-3 py-2 text-gray-600 hover:bg-gray-50 hover:text-gray-800 rounded transition-colors duration-200">{{ $page }}</a>
                                    @endif
                                @endfor

                                {{-- Next Page Link --}}
                                @if ($buses->hasMorePages())
                                    <a href="{{ $buses->nextPageUrl() }}" 
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
                <div class="text-center py-16" data-aos="fade-up">
                    <div class="w-24 h-24 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-bus text-gray-400 text-3xl"></i>
                    </div>
                    <h3 class="text-xl font-medium text-gray-900 mb-2">Belum Ada Bus Tersedia</h3>
                    <p class="text-gray-600 mb-6">Kantor cabang ini belum memiliki armada bus yang terdaftar.</p>
                    <a href="/bookingpage" 
                       class="inline-flex items-center bg-indigo-600 hover:bg-indigo-700 text-white font-semibold px-6 py-3 rounded-xl transition-colors duration-200">
                        <i class="fas fa-search mr-2"></i>
                        Cari Bus Lain
                    </a>
                </div>
            @endif
        </div>
    </section>
@endsection

@push('after-scripts')
<script>
    // Map configuration
    var mbAttr = 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, ' +
        'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
        mbUrl = 'https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoiaWx5YXMzMTciLCJhIjoiY2x4cTd2YXN6MHR2bzJqc2g5ZnJzbzBhcSJ9.4C6RKZ06Bi7b-l5tYqwfQg';

    // Map layers
    var satellite = L.tileLayer(mbUrl, {
        id: 'mapbox/satellite-v11',
        tileSize: 512,
        zoomOffset: -1,
        attribution: mbAttr
    }),
    street1 = L.tileLayer('http://{s}.google.com/vt/lyrs=m&x={x}&y={y}&z={z}', {
        subdomains: ['mt0', 'mt1', 'mt2', 'mt3'],
        maxZoom: 20,
        attribution: mbAttr
    }),
    streets = L.tileLayer(mbUrl, {
        id: 'mapbox/streets-v11',
        tileSize: 512,
        zoomOffset: -1,
        attribution: mbAttr
    });

    // Initialize map
    var map = L.map('map', {
        center: [{{ $kantorcabang->latitude }}, {{ $kantorcabang->longitude }}],
        zoom: 16,
        layers: [streets]
    });

    // Base layers
    var baseLayers = {
        "Streets": streets,
        "Google Streets": street1,
        "Satellite": satellite
    };

    // Add controls
    L.control.fullscreen({
        position: 'topright'
    }).addTo(map);

    L.control.layers(baseLayers).addTo(map);

    // Office marker
    var curLocation = [{{ $kantorcabang->latitude }}, {{ $kantorcabang->longitude }}];
    map.attributionControl.setPrefix(false);

    // Custom marker icon
    var customIcon = L.divIcon({
        html: '<div class="w-10 h-10 bg-indigo-600 rounded-full border-4 border-white shadow-lg flex items-center justify-center"><i class="fas fa-building text-white text-sm"></i></div>',
        className: 'custom-marker',
        iconSize: [40, 40],
        iconAnchor: [20, 20]
    });

    var marker = new L.marker(curLocation, {
        draggable: false,
        icon: customIcon
    }).addTo(map);

    // Marker popup
    marker.bindPopup(`
        <div class="p-3 min-w-[200px]">
            <h4 class="font-semibold text-indigo-600 mb-2">
                <i class="fas fa-building mr-1"></i>
                {{ $kantorcabang->name }}
            </h4>
            <p class="text-sm text-gray-600 mb-2">{{ $kantorcabang->address }}</p>
            <div class="flex items-center text-sm text-gray-500">
                <i class="fas fa-phone mr-1"></i>
                <span>{{ $kantorcabang->phone_number }}</span>
            </div>
        </div>
    `).openPopup();
</script>
@endpush