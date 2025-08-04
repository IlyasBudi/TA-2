@extends('penyewa.layouts.app')

@section('title', 'Checkout')

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
        <div class="max-w-4xl mx-auto px-4 sm:px-6 text-center">
            <h1 class="text-4xl sm:text-5xl font-bold text-gray-900 mb-4" data-aos="fade-up">
                Checkout Pemesanan
            </h1>
            <p class="text-xl text-gray-600 max-w-2xl mx-auto" data-aos="fade-up" data-aos-delay="100">
                Konfirmasi detail pemesanan dan lakukan pembayaran
            </p>
        </div>
    </section>

    <!-- Checkout Content -->
    <section class="py-12 bg-white">
        <div class="max-w-4xl mx-auto px-4 sm:px-6">
            <!-- Order Summary Card -->
            <div class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden mb-8" data-aos="fade-up">
                <!-- Header -->
                <div class="bg-gradient-to-r from-indigo-600 to-purple-600 p-6">
                    <div class="flex items-center justify-between text-white">
                        <div>
                            <h2 class="text-2xl font-bold">Ringkasan Pesanan</h2>
                            <p class="text-indigo-100 mt-1">{{ $transaction->code }}</p>
                        </div>
                        <div class="text-right">
                            <p class="text-indigo-100 text-sm">Status</p>
                            <span class="inline-block px-3 py-1 bg-yellow-500 text-white rounded-full text-sm font-medium">
                                Menunggu Pembayaran
                            </span>
                        </div>
                    </div>
                </div>

                <!-- Content -->
                <div class="p-8">
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                        <!-- Trip Details -->
                        <div class="space-y-6">
                            <h3 class="text-lg font-semibold text-gray-900 mb-4">Detail Perjalanan</h3>
                            
                            <div class="space-y-4">
                                <div class="flex justify-between items-center py-3 border-b border-gray-100">
                                    <span class="text-gray-600">Nama Penyewa</span>
                                    <span class="font-medium text-gray-900">{{ $transaction->user->name }}</span>
                                </div>
                                
                                <div class="flex justify-between items-center py-3 border-b border-gray-100">
                                    <span class="text-gray-600">Destinasi</span>
                                    <span class="font-medium text-gray-900">{{ $transaction->destination->name }}</span>
                                </div>
                                
                                <div class="flex justify-between items-center py-3 border-b border-gray-100">
                                    <span class="text-gray-600">Kategori Bus</span>
                                    <span class="font-medium text-gray-900">{{ $transaction->categorybus->name }}</span>
                                </div>
                                
                                <div class="flex justify-between items-center py-3 border-b border-gray-100">
                                    <span class="text-gray-600">Bus</span>
                                    <span class="font-medium text-gray-900">{{ $transaction->bus->name }}</span>
                                </div>
                                
                                <div class="flex justify-between items-center py-3 border-b border-gray-100">
                                    <span class="text-gray-600">Tanggal Keberangkatan</span>
                                    <span class="font-medium text-gray-900">{{ date('d M Y', strtotime($transaction->departure_date)) }}</span>
                                </div>
                                
                                <div class="flex justify-between items-center py-3 border-b border-gray-100">
                                    <span class="text-gray-600">Tanggal Kepulangan</span>
                                    <span class="font-medium text-gray-900">{{ date('d M Y', strtotime($transaction->return_date)) }}</span>
                                </div>
                                
                                <div class="flex justify-between items-center py-3 border-b border-gray-100">
                                    <span class="text-gray-600">Waktu Penjemputan</span>
                                    <span class="font-medium text-gray-900">{{ date('H:i', strtotime($transaction->pickup_time)) }} WIB</span>
                                </div>
                                
                                <div class="flex justify-between items-center py-3 border-b border-gray-100">
                                    <span class="text-gray-600">Biaya Tambahan</span>
                                    <span class="font-medium text-gray-900">Rp {{ number_format($transaction->extra_charge) }}</span>
                                </div>
                            </div>
                        </div>

                        <!-- Map and Price -->
                        <div class="space-y-6">
                            <div>
                                <h3 class="text-lg font-semibold text-gray-900 mb-4">Lokasi Penjemputan</h3>
                                <div id="map" class="rounded-xl"></div>
                                <p class="text-xs text-gray-500 mt-2">
                                    <i class="fas fa-map-marker-alt mr-1"></i>
                                    Klik marker untuk melihat alamat lengkap
                                </p>
                            </div>

                            <!-- Price Summary -->
                            <div class="bg-gray-50 rounded-xl p-6">
                                <h3 class="text-lg font-semibold text-gray-900 mb-4">Ringkasan Biaya</h3>
                                <div class="space-y-3">
                                    <div class="flex justify-between items-center">
                                        <span class="text-gray-600">Biaya Bus</span>
                                        <span class="font-medium text-gray-900">Rp {{ number_format($transaction->total_price - $transaction->extra_charge) }}</span>
                                    </div>
                                    <div class="flex justify-between items-center">
                                        <span class="text-gray-600">Biaya Tambahan</span>
                                        <span class="font-medium text-gray-900">Rp {{ number_format($transaction->extra_charge) }}</span>
                                    </div>
                                    <div class="border-t border-gray-200 pt-3">
                                        <div class="flex justify-between items-center">
                                            <span class="text-lg font-semibold text-gray-900">Total</span>
                                            <span class="text-2xl font-bold text-indigo-600">Rp {{ number_format($transaction->total_price) }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="flex flex-col sm:flex-row gap-4 justify-center" data-aos="fade-up" data-aos-delay="200">
                <a href="/transaction/{{ $transaction->id }}/delete" 
                   class="flex-1 sm:flex-none bg-red-600 hover:bg-red-700 text-white font-semibold px-8 py-4 rounded-xl transition-colors duration-200 text-center">
                    <i class="fas fa-times mr-2"></i>
                    Batalkan Pesanan
                </a>
                
                <button id="pay-button" 
                        class="flex-1 sm:flex-none bg-gradient-to-r from-green-600 to-emerald-600 hover:from-green-700 hover:to-emerald-700 text-white font-semibold px-8 py-4 rounded-xl transition-all duration-300 transform hover:scale-105 shadow-lg hover:shadow-xl">
                    <i class="fas fa-credit-card mr-2"></i>
                    Bayar Sekarang
                </button>
            </div>

            <!-- Payment Methods Info -->
            <div class="mt-8 bg-blue-50 rounded-xl p-6" data-aos="fade-up" data-aos-delay="300">
                <h3 class="text-lg font-semibold text-blue-900 mb-4 flex items-center">
                    <i class="fas fa-info-circle mr-2"></i>
                    Metode Pembayaran
                </h3>
                <div class="grid grid-cols-2 md:grid-cols-3 gap-4 text-center">
                    <div class="bg-white rounded-lg p-3">
                        <i class="fas fa-credit-card text-blue-600 text-2xl mb-2"></i>
                        <p class="text-sm font-medium text-gray-700">Kartu Kredit</p>
                    </div>
                    <div class="bg-white rounded-lg p-3">
                        <i class="fas fa-university text-green-600 text-2xl mb-2"></i>
                        <p class="text-sm font-medium text-gray-700">Transfer Bank</p>
                    </div>
                    <div class="bg-white rounded-lg p-3">
                        <i class="fas fa-wallet text-purple-600 text-2xl mb-2"></i>
                        <p class="text-sm font-medium text-gray-700">E-Wallet</p>
                    </div>
                    <!-- <div class="bg-white rounded-lg p-3">
                        <i class="fas fa-store text-orange-600 text-2xl mb-2"></i>
                        <p class="text-sm font-medium text-gray-700">Indomaret</p>
                    </div> -->
                </div>
            </div>
        </div>
    </section>
@endsection

@push('after-scripts')
<script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js"
    data-client-key="{{ config('midtrans.midtrans.client_key') }}">
</script>

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

    // Add controls
    L.control.fullscreen({
        position: 'topright'
    }).addTo(map);

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

    // Payment handler
    document.getElementById('pay-button').onclick = function() {
        snap.pay('{{ $snapToken }}', {
            onSuccess: function(result) {
                alert("Pembayaran berhasil!");
                window.location.href = "/success";
            },
            onPending: function(result) {
                alert("Pembayaran pending!");
                window.location.href = "/";
            },
            onError: function(result) {
                alert("Pembayaran gagal!");
                window.location.href = "/";
            }
        });
    };
</script>
@endpush