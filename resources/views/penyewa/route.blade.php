@extends('penyewa.layouts.app')

@section('title', 'Rute Perjalanan')

@push('before-style')
{{-- untuk cdn yang di load pada view RouteSpot ini selain cdn dari leaflet js dan leflet fullscreen
    kita juga me-load cdn leaflet routing machine untuk menampilkan rute dari lokasi kita ke lokasi spot
    yang kita pilih --}}
    <link rel="stylesheet" href="https://unpkg.com/leaflet-routing-machine@3.2.12/dist/leaflet-routing-machine.css">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.8.0/dist/leaflet.css"
        integrity="sha512-hoalWLoI8r4UszCkZ5kL8vayOGVae1oxXe/2A4AO6J9+580uKHDO3JdHb7NzwwzK5xr/Fs0W40kiNHxM9vyTtQ=="
        crossorigin="" />

    <script src="https://unpkg.com/leaflet@1.8.0/dist/leaflet.js"
        integrity="sha512-BB3hKbKWOc9Ez/TAwyWxNXeoV9c1v6FIeYiBieIWkpLjauysF18NzgR1MBNBXf8/KABdlkX68nAhlwcDFLGPCQ=="
        crossorigin=""></script>

    <script src="https://unpkg.com/leaflet-routing-machine@3.2.12/dist/leaflet-routing-machine.js"></script>

    <link href='https://api.mapbox.com/mapbox.js/plugins/leaflet-fullscreen/v1.0.1/leaflet.fullscreen.css' rel='stylesheet' />
    <script src='https://api.mapbox.com/mapbox.js/plugins/leaflet-fullscreen/v1.0.1/Leaflet.fullscreen.min.js'></script>

    <style>
        #map {
            height: 75vh;
            width: 100%;
            border-radius: 16px;
            box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1);
        }

        .leaflet-routing-container {
            background: white;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        }

        .leaflet-routing-alternatives-container {
            background: white;
            border-radius: 8px;
        }
    </style>
@endpush

@section('content')
    <!-- Page Header -->
    <section class="pt-24 pb-8 bg-gradient-to-br from-indigo-50 to-purple-50">
        <div class="max-w-6xl mx-auto px-4 sm:px-6">
            <div class="text-center mb-6">
                <h1 class="text-4xl sm:text-5xl font-bold text-gray-900 mb-4" data-aos="fade-up">
                    Rute ke {{ $kantorcabangs->name }}
                </h1>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto" data-aos="fade-up" data-aos-delay="100">
                    Navigasi dari lokasi Anda ke kantor cabang kami
                </p>
            </div>

            <!-- Office Info Card -->
            <div class="bg-white rounded-2xl shadow-lg border border-gray-100 p-6 max-w-2xl mx-auto" data-aos="fade-up" data-aos-delay="200">
                <div class="flex items-center space-x-4">
                    <img src="{{ Storage::url($kantorcabangs->image) }}" 
                         alt="{{ $kantorcabangs->name }}" 
                         class="w-16 h-16 rounded-xl object-cover">
                    <div class="flex-1">
                        <h3 class="text-lg font-semibold text-gray-900">{{ $kantorcabangs->name }}</h3>
                        <p class="text-gray-600 text-sm mt-1">{{ Str::limit($kantorcabangs->address, 80) }}</p>
                    </div>
                    <a href="/kantorcabang/{{ $kantorcabangs->id }}" 
                       class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-lg text-sm font-medium transition-colors duration-200">
                        Detail
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Route Map Section -->
    <section class="py-12 bg-white">
        <div class="max-w-6xl mx-auto px-4 sm:px-6">
            <!-- Instructions -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8" data-aos="fade-up">
                <div class="bg-blue-50 rounded-xl p-6 text-center">
                    <div class="w-12 h-12 bg-blue-500 rounded-full flex items-center justify-center mx-auto mb-3">
                        <i class="fas fa-location-arrow text-white"></i>
                    </div>
                    <h3 class="font-semibold text-gray-900 mb-2">Izinkan Lokasi</h3>
                    <p class="text-sm text-gray-600">Browser akan meminta izin untuk mengakses lokasi Anda</p>
                </div>
                
                <div class="bg-green-50 rounded-xl p-6 text-center">
                    <div class="w-12 h-12 bg-green-500 rounded-full flex items-center justify-center mx-auto mb-3">
                        <i class="fas fa-route text-white"></i>
                    </div>
                    <h3 class="font-semibold text-gray-900 mb-2">Rute Otomatis</h3>
                    <p class="text-sm text-gray-600">Sistem akan menampilkan rute terbaik secara otomatis</p>
                </div>
                
                <div class="bg-purple-50 rounded-xl p-6 text-center">
                    <div class="w-12 h-12 bg-purple-500 rounded-full flex items-center justify-center mx-auto mb-3">
                        <i class="fas fa-directions text-white"></i>
                    </div>
                    <h3 class="font-semibold text-gray-900 mb-2">Petunjuk Arah</h3>
                    <p class="text-sm text-gray-600">Klik pada panel rute untuk melihat petunjuk detail</p>
                </div>
            </div>

            <!-- Map Container -->
            <div class="bg-white rounded-2xl shadow-lg p-6" data-aos="fade-up" data-aos-delay="200">
                <div id="map"></div>
            </div>

            <!-- Additional Info -->
            <div class="mt-8 bg-yellow-50 rounded-xl p-6" data-aos="fade-up" data-aos-delay="300">
                <div class="flex items-start space-x-3">
                    <i class="fas fa-info-circle text-yellow-600 mt-1"></i>
                    <div>
                        <h3 class="font-semibold text-yellow-900 mb-2">Informasi Penting</h3>
                        <ul class="text-yellow-800 text-sm space-y-1">
                            <li>• Pastikan GPS dan internet aktif untuk navigasi yang akurat</li>
                            <li>• Gunakan aplikasi maps favorit Anda untuk navigasi real-time</li>
                            <li>• Hubungi kantor cabang jika mengalami kesulitan menemukan lokasi</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('after-scripts')
    <script>
        var mbAttr = 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, ' +
            'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
            mbUrl =
            'https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoicmVvbmFsZGkxNSIsImEiOiJjbHIydWN4Z2oxNW1rMnhsbWpoYW5lbDIwIn0._QV7HJJnzCin4a0O6VExWQ';

        var satellite = L.tileLayer(mbUrl, {
                id: 'mapbox/satellite-v9',
                tileSize: 512,
                zoomOffset: -1,
                attribution: mbAttr
            }),
            dark = L.tileLayer('http://{s}.google.com/vt/lyrs=m&x={x}&y={y}&z={z}', {
                subdomains: ['mt0', 'mt1', 'mt2', 'mt3'],
                attribution: mbAttr
            }),
            streets = L.tileLayer(mbUrl, {
                id: 'mapbox/streets-v11',
                tileSize: 512,
                zoomOffset: -1,
                attribution: mbAttr
            });


        // untuk mendapatkan lokasi user kita akan menggunakan navigator object dari html5
        // seperti di bawah
        if (!navigator.geolocation) {
            console.log("Browser doesn't support");
        } else {
            console.log(navigator.geolocation.getCurrentPosition(getPosition));
        }

        var data{{ $kantorcabangs->id }} = L.layerGroup();

        // fungsi ini untuk menampilkan map secara penuh pada browser
        var map = L.map('map', {
            center: [{{ $kantorcabangs->latitude }}, {{ $kantorcabangs->longitude }}],
            fullscreenControl: {
                pseudoFullscreen: false
            },
            zoom: 10,
            layers: [dark, data{{ $kantorcabangs->id }}]
        });

        // mengatur baselayer
        var baseLayers = {
            "Streets": dark,
            "Streets2": streets,
            "Satellite": satellite,
        };

        // mengatur overlayers
        var overlays = {
            "{{ $kantorcabangs->name }}": data{{ $kantorcabangs->id }},
        };

        // Office marker
        var officeIcon = L.divIcon({
            html: '<div class="w-12 h-12 bg-indigo-600 rounded-full border-4 border-white shadow-lg flex items-center justify-center"><i class="fas fa-building text-white"></i></div>',
            className: 'custom-marker',
            iconSize: [48, 48],
            iconAnchor: [24, 24]
        });

        L.control.layers(baseLayers, overlays).addTo(map);
        L.marker([{{ $kantorcabangs->latitude }}, {{ $kantorcabangs->longitude }}], { icon: officeIcon }).bindPopup(
            
            `
                <div class="p-3 min-w-[200px]">
                    <h4 class="font-semibold text-indigo-600 mb-2">
                        <i class="fas fa-building mr-1"></i>
                        {{ $kantorcabangs->name }}
                    </h4>
                    <p class="text-sm text-gray-600 mb-2">{{ $kantorcabangs->address }}</p>
                    <div class="flex items-center text-sm text-gray-500">
                        <i class="fas fa-phone mr-1"></i>
                        <span>{{ $kantorcabangs->phone_number }}</span>
                    </div>
                </div>
            `
        ).addTo(map);


        // Untuk bagian ini kita akan membuat function untuk mendapatkan lokasi koordinat user 
        // membuat variabel marker, circle,latPos (latitude position user),longPos(longitude position user)
        var marker, circle, latPos, longPos

        function getPosition(position) {
            // console.log("ini latitudenya", position.coords.latitude);
            // console.log("ini longitudenya", position.coords.longitude);

            // pada var latPos, longPos dan accuracy kita akan mengambil nilai latitude longitude dan accuracy
            // dengan sintaks position.coords di bawah kemudian memasukkannya pada variabel yang sudah di definisikan

            var latPos = position.coords.latitude
            var longPos = position.coords.longitude
            var accuracy = position.coords.accuracy

            if (marker) {
                map.removeLayer(circle)
            }

            // User location marker
            var userIcon = L.divIcon({
                html: '<div class="w-10 h-10 bg-green-500 rounded-full border-4 border-white shadow-lg flex items-center justify-center animate-pulse"><i class="fas fa-user text-white text-sm"></i></div>',
                className: 'custom-marker',
                iconSize: [40, 40],
                iconAnchor: [20, 20]
            });

            // Kemudian membuat marker dan circle dari masing-masing nilai dari variabel latPos dan longPos
            // yang sudah kita definisikan diatas
            marker = L.marker([latPos, longPos])
            circle = L.circle([latPos, longPos]), {
                radius: accuracy
            }

            // membuat featureGrooup sehinggankita bisa menambahkan beberapa opsi pada layer
            // seperti di bawah kita menambahkan marker, circle, dan popup untuk di tampilkan pada peta
            var featureGroup = L.featureGroup([marker, circle])
                .bindPopup("<div class='text-center'><p><b>Lokasi Kamu Disini</b></p></div>")
                .addTo(map)
            map.fitBounds(featureGroup.getBounds())

            // Setelah itu buat routing control untuk memuat waypoint (latitude dan longitude) 
            // yang pertama waypoint dari lokasi kita dan yang kedua waypoint lokasi tujuan
            // yang mana nilainya kita dapatkan dari $kantorcabangs->latitude dan $kantorcabangs->longitude

            L.Routing.control({
                waypoints: [
                    L.latLng(latPos, longPos),
                    L.latLng({{ $kantorcabangs->latitude }}, {{ $kantorcabangs->longitude }}),
                ],
                // mengatur warna dan ukuran garis penghubung antara lokasi user dan tujuan
                lineOptions: {
                    styles: [{
                        color: 'green',
                        opacity: 1,
                        weight: 3
                    }]
                },
                createMarker: function() {
                    return null
                }
            }).addTo(map);

        }
    </script>
@endpush