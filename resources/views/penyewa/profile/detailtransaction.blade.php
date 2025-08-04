@extends('penyewa.layouts.app')

@section('title', 'Detail Transaction')

@push('before-style')
    <!-- Leaflet CSS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.8.0/dist/leaflet.css"
        integrity="sha512-hoalWLoI8r4UszCkZ5kL8vayOGVae1oxXe/2A4AO6J9+580uKHDO3JdHb7NzwwzK5xr/Fs0W40kiNHxM9vyTtQ=="
        crossorigin="" />

    <!-- Leaflet JS -->
    <script src="https://unpkg.com/leaflet@1.8.0/dist/leaflet.js"
        integrity="sha512-BB3hKbKWOc9Ez/TAwyWxNXeoV9c1v6FIeYiBieIWkpLjauysF18NzgR1MBNBXf8/KABdlkX68nAhlwcDFLGPCQ=="
        crossorigin=""></script>

    <!-- Leaflet Fullscreen -->
    <script src='https://api.mapbox.com/mapbox.js/plugins/leaflet-fullscreen/v1.0.1/Leaflet.fullscreen.min.js'></script>
    <link href='https://api.mapbox.com/mapbox.js/plugins/leaflet-fullscreen/v1.0.1/leaflet.fullscreen.css' rel='stylesheet' />

    <!-- Leaflet Search -->
    <link rel="stylesheet" href="{{ asset('css/leaflet-search.css') }}">
    <script src="{{ asset('js/leaflet-search.js') }}"></script>

    <!-- Leaflet Current Location -->
    <script src="https://cdn.jsdelivr.net/npm/leaflet.locatecontrol@0.79.0/dist/L.Control.Locate.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/leaflet.locatecontrol@0.79.0/dist/L.Control.Locate.min.css" rel="stylesheet">

    <style>
        #map {
            height: 300px;
            width: 100%;
            border-radius: 12px;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
        }
    </style>
@endpush

@section('content')
    <!-- Page Header -->
    <section class="pt-24 pb-8 bg-gradient-to-br from-indigo-50 to-purple-50">
        <div class="max-w-4xl mx-auto px-4 sm:px-6">
            <div class="text-center">
                <h1 class="text-3xl sm:text-4xl font-bold text-gray-900 mb-2">Detail Transaksi</h1>
                <p class="text-gray-600">Informasi lengkap transaksi Anda</p>
            </div>
        </div>
    </section>

    <!-- Transaction Details -->
    <section class="py-12 bg-white">
        <div class="max-w-4xl mx-auto px-4 sm:px-6">
            <!-- Invoice Header -->
            <div class="bg-gradient-to-r from-indigo-600 to-purple-600 rounded-2xl p-8 text-white mb-8" data-aos="fade-up">
                <div class="flex flex-col lg:flex-row justify-between items-start lg:items-center mb-6">
                    <div>
                        <h2 class="text-2xl font-bold mb-2">PO XYZ Pariwisata</h2>
                        <div class="w-16 h-1 bg-white/30 rounded"></div>
                    </div>
                    <div class="mt-4 lg:mt-0 text-right">
                        <h3 class="text-3xl font-bold">INVOICE</h3>
                        <p class="text-indigo-100">{{ $transaction->code }}</p>
                        <p class="text-indigo-200 text-sm">{{ $transaction->created_at->format('d M Y, H:i') }}</p>
                    </div>
                </div>

                <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                    <!-- Transaction Info -->
                    <div>
                        <h4 class="text-lg font-semibold mb-4 text-yellow-300">Informasi Transaksi</h4>
                        <div class="space-y-2 text-indigo-100">
                            <p><span class="text-white font-medium">Kantor Cabang:</span> {{ $transaction->kantorcabang->name }}</p>
                            <p><span class="text-white font-medium">Status Pembayaran:</span> 
                                <span class="inline-block px-2 py-1 bg-white/20 rounded-lg text-white font-medium">
                                    {{ $transaction->transaction_status }}
                                </span>
                            </p>
                            <p class="text-lg"><span class="text-white font-semibold">Total:</span> 
                                <span class="text-yellow-300 font-bold">Rp{{ number_format($transaction->total_price) }}</span>
                            </p>
                        </div>
                    </div>

                    <!-- Customer Info -->
                    <div>
                        <h4 class="text-lg font-semibold mb-4 text-yellow-300">Informasi Penyewa</h4>
                        <div class="space-y-2 text-indigo-100">
                            <p><span class="text-white font-medium">Nama:</span> {{ $transaction->user->name }}</p>
                            <p><span class="text-white font-medium">Email:</span> {{ $transaction->user->email }}</p>
                            <p><span class="text-white font-medium">Telepon:</span> {{ $transaction->user->phone_number }}</p>
                            <p><span class="text-white font-medium">Alamat:</span> {{ $transaction->user->address }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Detailed Information -->
            <div class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden" data-aos="fade-up" data-aos-delay="200">
                <div class="p-8">
                    <div class="flex items-center justify-between mb-6">
                        <h3 class="text-2xl font-bold text-gray-900">{{ $transaction->code }}</h3>
                        <div class="px-4 py-2 bg-indigo-50 text-indigo-600 rounded-lg font-medium">
                            {{ $transaction->transaction_status }}
                        </div>
                    </div>

                    <!-- Transaction Details Table -->
                    <div class="overflow-hidden">
                        <table class="w-full">
                            <tbody class="divide-y divide-gray-100">
                                <tr class="hover:bg-gray-50 transition-colors duration-200">
                                    <td class="py-4 text-sm font-medium text-gray-900 w-1/3">Nama Penyewa</td>
                                    <td class="py-4 text-sm text-gray-600">{{ $transaction->user->name }}</td>
                                </tr>
                                <tr class="hover:bg-gray-50 transition-colors duration-200">
                                    <td class="py-4 text-sm font-medium text-gray-900">Destinasi</td>
                                    <td class="py-4 text-sm text-gray-600">{{ $transaction->destination->name }}</td>
                                </tr>
                                <tr class="hover:bg-gray-50 transition-colors duration-200">
                                    <td class="py-4 text-sm font-medium text-gray-900">Kategori Bus</td>
                                    <td class="py-4 text-sm text-gray-600">{{ $transaction->categorybus->name }}</td>
                                </tr>
                                <tr class="hover:bg-gray-50 transition-colors duration-200">
                                    <td class="py-4 text-sm font-medium text-gray-900">Bus</td>
                                    <td class="py-4 text-sm text-gray-600">{{ $transaction->bus->name }}</td>
                                </tr>
                                <tr class="hover:bg-gray-50 transition-colors duration-200">
                                    <td class="py-4 text-sm font-medium text-gray-900">Tanggal Keberangkatan</td>
                                    <td class="py-4 text-sm text-gray-600">{{ date('d M Y', strtotime($transaction->departure_date)) }}</td>
                                </tr>
                                <tr class="hover:bg-gray-50 transition-colors duration-200">
                                    <td class="py-4 text-sm font-medium text-gray-900">Tanggal Kepulangan</td>
                                    <td class="py-4 text-sm text-gray-600">{{ date('d M Y', strtotime($transaction->return_date)) }}</td>
                                </tr>
                                <tr class="hover:bg-gray-50 transition-colors duration-200">
                                    <td class="py-4 text-sm font-medium text-gray-900">Waktu Penjemputan</td>
                                    <td class="py-4 text-sm text-gray-600">{{ date('H:i', strtotime($transaction->pickup_time)) }} WIB</td>
                                </tr>
                                <tr class="hover:bg-gray-50 transition-colors duration-200">
                                    <td class="py-4 text-sm font-medium text-gray-900">Biaya Tambahan</td>
                                    <td class="py-4 text-sm text-gray-600">Rp {{ number_format($transaction->extra_charge) }}</td>
                                </tr>
                                <tr class="bg-indigo-50 hover:bg-indigo-100 transition-colors duration-200">
                                    <td class="py-4 text-sm font-bold text-gray-900">Total Harga</td>
                                    <td class="py-4 text-lg font-bold text-indigo-600">Rp {{ number_format($transaction->total_price) }}</td>
                                </tr>
                                <tr>
                                    <td class="py-6 text-sm font-medium text-gray-900 align-top">Lokasi Penjemputan</td>
                                    <td class="py-6">
                                        <div id="map" class="rounded-xl"></div>
                                        <p class="text-xs text-gray-500 mt-2">
                                            <i class="fas fa-map-marker-alt mr-1"></i>
                                            Klik pada marker untuk melihat alamat lengkap
                                        </p>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Download PDF Button -->
            <div class="text-center mt-8" data-aos="fade-up" data-aos-delay="400">
                <a href="{{ route('profile.transaction.pdf', $transaction->id) }}" 
                   class="inline-flex items-center bg-gradient-to-r from-indigo-600 to-purple-600 hover:from-indigo-700 hover:to-purple-700 text-white font-semibold px-8 py-4 rounded-xl transition-all duration-300 transform hover:scale-105 shadow-lg hover:shadow-xl">
                    <i class="fas fa-download mr-2"></i>
                    Unduh PDF
                </a>
            </div>
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
        center: [{{ $transaction->latitude }}, {{ $transaction->longitude }}],
        zoom: 16,
        layers: [streets]
    });

    // Base layers
    var baseLayers = {
        "Streets": streets,
        "Google Streets": street1,
        "Satellite": satellite
    };

    // Add fullscreen control
    L.control.fullscreen({
        position: 'topright'
    }).addTo(map);

    // Add layer control
    L.control.layers(baseLayers).addTo(map);

    // Location marker
    var curLocation = [{{ $transaction->latitude }}, {{ $transaction->longitude }}];
    map.attributionControl.setPrefix(false);

    // Custom marker icon
    var customIcon = L.divIcon({
        html: '<div class="w-8 h-8 bg-indigo-600 rounded-full border-4 border-white shadow-lg flex items-center justify-center"><i class="fas fa-map-marker-alt text-white text-xs"></i></div>',
        className: 'custom-marker',
        iconSize: [32, 32],
        iconAnchor: [16, 16]
    });

    var marker = new L.marker(curLocation, {
        draggable: false,
        icon: customIcon
    }).addTo(map);

    // Get address function
    function getAddress(lat, lon, callback) {
        var url = `https://nominatim.openstreetmap.org/reverse?format=json&lat=${lat}&lon=${lon}`;

        fetch(url)
            .then(response => response.json())
            .then(data => {
                if (data.display_name) {
                    callback(data.display_name);
                } else {
                    callback("Alamat tidak ditemukan");
                }
            })
            .catch(error => {
                console.log("Error getting address:", error);
                callback("Error mendapatkan alamat");
            });
    }

    // Add popup to marker
    getAddress(curLocation[0], curLocation[1], function(address) {
        marker.bindPopup(`
            <div class="p-2">
                <h4 class="font-semibold text-indigo-600 mb-2">
                    <i class="fas fa-map-marker-alt mr-1"></i>
                    Lokasi Penjemputan
                </h4>
                <p class="text-sm text-gray-600">${address}</p>
            </div>
        `).openPopup();
    });
</script>
@endpush