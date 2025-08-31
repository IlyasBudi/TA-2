@extends('penyewa.layouts.app')

@section('title', 'Peta Lokasi')

@push('before-style')
    <!-- Leaflet CSS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.8.0/dist/leaflet.css"
        integrity="sha512-hoalWLoI8r4UszCkZ5kL8vayOGVae1oxXe/2A4AO6J9+580uKHDO3JdHb7NzwwzK5xr/Fs0W40kiNHxM9vyTtQ=="
        crossorigin="" />

    <!-- Leaflet JS -->
    <script src="https://unpkg.com/leaflet@1.8.0/dist/leaflet.js"
        integrity="sha512-BB3hKbKWOc9Ez/TAwyWxNXeoV9c1v6FIeYiBieIWkpLjauysF18NzgR1MBNBXf8/KABdlkX68nAhlwcDFLGPCQ=="
        crossorigin=""></script>

    <!-- Leaflet Extensions -->
    <script src='https://api.mapbox.com/mapbox.js/plugins/leaflet-fullscreen/v1.0.1/Leaflet.fullscreen.min.js'></script>
    <link href='https://api.mapbox.com/mapbox.js/plugins/leaflet-fullscreen/v1.0.1/leaflet.fullscreen.css' rel='stylesheet' />

    <script src="https://cdn.jsdelivr.net/npm/leaflet.locatecontrol@0.79.0/dist/L.Control.Locate.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/leaflet.locatecontrol@0.79.0/dist/L.Control.Locate.min.css" rel="stylesheet">

    <style>
        #map {
            height: 75vh;
            width: 100%;
            border-radius: 16px;
            box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1);
        }

        .leaflet-popup-content-wrapper {
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        }

        .leaflet-popup-content {
            margin: 12px 16px;
            line-height: 1.4;
        }

        .custom-control {
            background: white;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }
    </style>
@endpush

@section('content')
    <!-- Page Header -->
    <section class="pt-24 pb-8 bg-gradient-to-br from-indigo-50 to-purple-50">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 text-center">
            <h1 class="text-4xl sm:text-5xl font-bold text-gray-900 mb-4" data-aos="fade-up">
                Peta Kantor Cabang
            </h1>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto" data-aos="fade-up" data-aos-delay="100">
                Temukan lokasi kantor cabang PO XYZ terdekat dari lokasi Anda
            </p>
        </div>
    </section>

    <!-- Map Section -->
    <section class="py-12 bg-white">
        <div class="max-w-6xl mx-auto px-4 sm:px-6">
            <!-- Map Controls Info -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8" data-aos="fade-up">
                <!-- <div class="bg-blue-50 rounded-xl p-6 text-center">
                    <div class="w-12 h-12 bg-blue-500 rounded-full flex items-center justify-center mx-auto mb-3">
                        <i class="fas fa-search-location text-white"></i>
                    </div>
                    <h3 class="font-semibold text-gray-900 mb-2">Cari Lokasi</h3>
                    <p class="text-sm text-gray-600">Gunakan kontrol pencarian di peta untuk menemukan lokasi</p>
                </div> -->
                
                <div class="bg-green-50 rounded-xl p-6 text-center">
                    <div class="w-12 h-12 bg-green-500 rounded-full flex items-center justify-center mx-auto mb-3">
                        <i class="fas fa-crosshairs text-white"></i>
                    </div>
                    <h3 class="font-semibold text-gray-900 mb-2">Lokasi Anda</h3>
                    <p class="text-sm text-gray-600">Klik tombol lokasi untuk melihat posisi Anda saat ini</p>
                </div>
                
                <div class="bg-purple-50 rounded-xl p-6 text-center">
                    <div class="w-12 h-12 bg-purple-500 rounded-full flex items-center justify-center mx-auto mb-3">
                        <i class="fas fa-building text-white"></i>
                    </div>
                    <h3 class="font-semibold text-gray-900 mb-2">Kantor Cabang</h3>
                    <p class="text-sm text-gray-600">Klik marker untuk melihat detail kantor cabang</p>
                </div>
            </div>

            <!-- Map Container -->
            <div class="bg-white rounded-2xl shadow-lg p-6" data-aos="fade-up" data-aos-delay="200">
                <div id="map"></div>
            </div>

            <!-- Office List -->
            <div class="mt-12" data-aos="fade-up" data-aos-delay="300">
                <h2 class="text-2xl font-bold text-gray-900 mb-6">Daftar Kantor Cabang</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach ($kantorcabangs as $index => $kantorcabang)
                    <div class="bg-white rounded-xl border border-gray-200 p-6 hover:shadow-md transition-shadow duration-200">
                        <h3 class="font-semibold text-gray-900 mb-2">{{ $kantorcabang->name }}</h3>
                        <p class="text-sm text-gray-600 mb-3">{{ Str::limit($kantorcabang->address, 80) }}</p>
                        <div class="flex space-x-3">
                            <a href="/kantorcabang/{{ $kantorcabang->id }}" 
                               class="flex-1 bg-indigo-600 hover:bg-indigo-700 text-white text-center py-2 px-3 rounded-lg text-sm font-medium transition-colors duration-200">
                                Detail
                            </a>
                            <a href="{{ route('cek-rute', $kantorcabang->id) }}" 
                               class="flex-1 bg-green-600 hover:bg-green-700 text-white text-center py-2 px-3 rounded-lg text-sm font-medium transition-colors duration-200">
                                Rute
                            </a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endsection

@push('after-scripts')
<script>
    // Map configuration
    var mbAttr = 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, ' +
        'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
        mbUrl = 'https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoicmVvbmFsZGkxNSIsImEiOiJjbHIydWN4Z2oxNW1rMnhsbWpoYW5lbDIwIn0._QV7HJJnzCin4a0O6VExWQ';

    // Map layers
    var satellite = L.tileLayer(mbUrl, {
        id: 'mapbox/satellite-v9',
        tileSize: 512,
        zoomOffset: -1,
        attribution: mbAttr
    }),
    dark = L.tileLayer(mbUrl, {
        id: 'mapbox/dark-v10',
        tileSize: 512,
        zoomOffset: -1,
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
        zoomControl: false,
        center: [-6.223011844553948, 106.6428825914336],
        zoom: 11,
        layers: [streets]
    });

    // Base layers
    var baseLayers = {
        "Streets": streets,
        "Satellite": satellite,
        "Dark": dark,
    };

    // Add controls
    L.control.zoom({
        position: 'bottomright'
    }).addTo(map);

    L.control.fullscreen({
        position: 'bottomright'
    }).addTo(map);

    var lc = L.control.locate({
        position: 'bottomright',
        strings: {
            title: "Temukan lokasi saya"
        }
    }).addTo(map);

    L.control.layers(baseLayers).addTo(map);

    // Custom office icon
    var officeIcon = L.divIcon({
        html: '<div class="w-10 h-10 bg-indigo-600 rounded-full border-4 border-white shadow-lg flex items-center justify-center"><i class="fas fa-building text-white text-sm"></i></div>',
        className: 'custom-marker',
        iconSize: [40, 40],
        iconAnchor: [20, 20]
    });

    // Add office markers
    @foreach ($kantorcabangs as $kantorcabang)
        L.marker([{{ $kantorcabang->latitude }}, {{ $kantorcabang->longitude }}], {
            icon: officeIcon
        })
        .bindPopup(`
            <div class="p-2 min-w-[250px]">
                <img src="{{ Storage::url($kantorcabang->image) }}" class="w-full h-32 object-cover rounded-lg mb-3">
                <h4 class="font-semibold text-gray-900 mb-2">{{ $kantorcabang->name }}</h4>
                <p class="text-sm text-gray-600 mb-3">{{ Str::limit($kantorcabang->address, 100) }}</p>
                <div class="flex space-x-2">
                    <a href="{{ route('cek-rute', $kantorcabang->id) }}" class="flex-1 bg-green-500 hover:bg-green-600 text-white text-center py-2 px-3 rounded-lg text-xs font-medium transition-colors duration-200">
                        <i class="fas fa-route mr-1"></i>Lihat Rute
                    </a>
                    <a href="/kantorcabang/{{ $kantorcabang->id }}" class="flex-1 bg-indigo-500 hover:bg-indigo-600 text-white text-center py-2 px-3 rounded-lg text-xs font-medium transition-colors duration-200">
                        <i class="fas fa-info-circle mr-1"></i>Detail
                    </a>
                </div>
            </div>
        `).addTo(map);
    @endforeach

    // Search functionality data
    var datas = [
        @foreach ($kantorcabangs as $key => $value)
            {
                "loc": [{{ $value->latitude }}, {{ $value->longitude }}],
                "title": '{!! $value->name !!}'
            },
        @endforeach
    ];

    var markersLayer = new L.LayerGroup();
    map.addLayer(markersLayer);

    // Add markers to search layer
    for (i in datas) {
        var title = datas[i].title,
            loc = datas[i].loc,
            marker = new L.Marker(new L.latLng(loc), {
                title: title,
                icon: officeIcon
            });
        markersLayer.addLayer(marker);
    }
</script>
@endpush