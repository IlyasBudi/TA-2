@extends('penyewa.layouts.app')

@section('title', 'Booking')

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
    
    <link rel="stylesheet" href="{{ asset('css/leaflet-search.css') }}">
    <script src="{{ asset('js/leaflet-search.js') }}"></script>
    
    <script src="https://cdn.jsdelivr.net/npm/leaflet.locatecontrol@0.79.0/dist/L.Control.Locate.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/leaflet.locatecontrol@0.79.0/dist/L.Control.Locate.min.css" rel="stylesheet">
    
    <script src="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.css" />

    <style>
        #map {
            height: 400px;
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
                Booking Bus Pariwisata
            </h1>
            <p class="text-xl text-gray-600 max-w-2xl mx-auto" data-aos="fade-up" data-aos-delay="100">
                Selamat datang di halaman pemesanan kami. Kami siap menemani perjalanan Anda dengan kenyamanan dan keamanan.
            </p>
        </div>
    </section>

    <!-- Booking Form -->
    <section class="py-12 bg-white">
        <div class="max-w-4xl mx-auto px-4 sm:px-6">
            <!-- Alert Messages -->
            @if (session('Success'))
                <div class="mb-8 p-4 bg-green-50 border border-green-200 rounded-xl" data-aos="fade-up">
                    <div class="flex items-center">
                        <i class="fas fa-check-circle text-green-500 mr-3"></i>
                        <p class="text-green-700 font-medium">{{ session('Success') }}</p>
                    </div>
                </div>
            @endif

            @if ($errors->any())
                <div class="mb-8 p-4 bg-red-50 border border-red-200 rounded-xl" data-aos="fade-up">
                    <div class="flex items-start">
                        <i class="fas fa-exclamation-circle text-red-500 mr-3 mt-0.5"></i>
                        <div>
                            <p class="text-red-700 font-medium mb-2">Terjadi kesalahan:</p>
                            <ul class="text-red-600 text-sm space-y-1">
                                @foreach ($errors->all() as $error)
                                    <li>• {{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            @endif

            <!-- Form Card -->
            <div class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden" data-aos="fade-up" data-aos-delay="200">
                <div class="p-8">
                    <form action="{{ route('booking') }}" method="post" class="space-y-8">
                        @csrf
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Destinasi -->
                            <div>
                                <label class="block text-sm font-semibold text-gray-900 mb-2">
                                    <i class="fas fa-map-marker-alt mr-2 text-indigo-500"></i>
                                    Destinasi
                                </label>
                                <select name="destination" class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-colors duration-200" required>
                                    <option value="" disabled selected>Pilih Destinasi</option>
                                    @foreach ($destinations as $destination)
                                    <option value="{{ $destination->name }}">{{ $destination->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Kategori Bus -->
                            <div>
                                <label class="block text-sm font-semibold text-gray-900 mb-2">
                                    <i class="fas fa-bus mr-2 text-indigo-500"></i>
                                    Kategori Bus
                                </label>
                                <select name="category_bus_id" class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-colors duration-200" required>
                                    <option value="" disabled selected>Pilih Kategori</option>
                                    @foreach ($categorybus as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Tanggal Keberangkatan -->
                            <div>
                                <label class="block text-sm font-semibold text-gray-900 mb-2">
                                    <i class="fas fa-calendar-alt mr-2 text-indigo-500"></i>
                                    Tanggal Keberangkatan
                                </label>
                                <input type="date" name="departure_date" class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-colors duration-200" required>
                            </div>

                            <!-- Tanggal Kepulangan -->
                            <div>
                                <label class="block text-sm font-semibold text-gray-900 mb-2">
                                    <i class="fas fa-calendar-check mr-2 text-indigo-500"></i>
                                    Tanggal Kepulangan
                                </label>
                                <input type="date" name="return_date" class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-colors duration-200" required>
                            </div>

                            <!-- Waktu Penjemputan -->
                            <div class="md:col-span-2">
                                <label class="block text-sm font-semibold text-gray-900 mb-2">
                                    <i class="fas fa-clock mr-2 text-indigo-500"></i>
                                    Waktu Penjemputan
                                </label>
                                <input type="time" name="pickup_time" min="05:00" class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-colors duration-200" required>
                                <p class="text-xs text-gray-500 mt-1">Waktu penjemputan mulai dari jam 05:00</p>
                            </div>
                        </div>

                        <!-- Hidden Fields -->
                        <input type="hidden" name="longitude" id="longitude" required>
                        <input type="hidden" name="latitude" id="latitude" required>
                        <input type="hidden" name="code" value="{{ $code }}" required>
                        <input type="hidden" name="user_id" value="{{ $user_id }}" required>

                        <!-- Map Section -->
                        <div>
                            <label class="block text-sm font-semibold text-gray-900 mb-2">
                                <i class="fas fa-map mr-2 text-indigo-500"></i>
                                Lokasi Penjemputan
                            </label>
                            <p class="text-sm text-gray-600 mb-4">
                                Klik lokasi pada map untuk menentukan titik keberangkatan atau gunakan kotak pencarian.
                            </p>
                            <div id="map" class="rounded-xl"></div>
                        </div>

                        <!-- Important Notes -->
                        <div class="bg-blue-50 rounded-xl p-6">
                            <h4 class="font-semibold text-blue-900 mb-3 flex items-center">
                                <i class="fas fa-info-circle mr-2"></i>
                                Catatan Penting
                            </h4>
                            <ul class="text-blue-800 text-sm space-y-2">
                                <li class="flex items-start">
                                    <i class="fas fa-dot-circle text-blue-500 mr-2 mt-1 text-xs"></i>
                                    Sistem akan otomatis mencari bus yang terdekat dari lokasi penjemputan.
                                </li>
                                <li class="flex items-start">
                                    <i class="fas fa-dot-circle text-blue-500 mr-2 mt-1 text-xs"></i>
                                    Setiap transaksi hanya dapat digunakan untuk memesan satu unit bus. Jika ingin memesan lebih dari satu bus, silakan lakukan transaksi terpisah untuk setiap bus.
                                </li>
                            </ul>
                        </div>

                        <!-- Submit Button -->
                        <div class="text-center">
                            <button type="submit" class="bg-gradient-to-r from-indigo-600 to-purple-600 hover:from-indigo-700 hover:to-purple-700 text-white font-semibold px-12 py-4 rounded-xl transition-all duration-300 transform hover:scale-105 shadow-lg hover:shadow-xl">
                                <i class="fas fa-paper-plane mr-2"></i>
                                Submit Booking
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('after-scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment-timezone/0.5.34/moment-timezone-with-data.min.js"></script>

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
        center: [-6.223011844553948, 106.6428825914336],
        zoom: 18,
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

    // Initial marker
    var curLocation = [-6.223011844553948, 106.6428825914336];
    map.attributionControl.setPrefix(false);

    // Custom marker icon
    var customIcon = L.divIcon({
        html: '<div class="w-8 h-8 bg-indigo-600 rounded-full border-4 border-white shadow-lg flex items-center justify-center animate-pulse"><i class="fas fa-map-marker-alt text-white text-xs"></i></div>',
        className: 'custom-marker',
        iconSize: [32, 32],
        iconAnchor: [16, 16]
    });

    var marker = new L.marker(curLocation, {
        draggable: true,
        icon: customIcon
    });
    map.addLayer(marker);

    // Marker drag event
    marker.on('dragend', function(event) {
        var location = marker.getLatLng();
        document.getElementById('longitude').value = location.lng;
        document.getElementById('latitude').value = location.lat;
        
        getAddress(location.lat, location.lng, function(address) {
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
    });

    // Add geocoder
    L.Control.geocoder({
        defaultMarkGeocode: false,
        placeholder: 'Cari lokasi...',
        errorMessage: 'Lokasi tidak ditemukan'
    })
    .on('markgeocode', function (e) {
        const latlng = e.geocode.center;
        map.setView(latlng, 18);
        marker.setLatLng(latlng);
        
        document.getElementById('latitude').value = latlng.lat;
        document.getElementById('longitude').value = latlng.lng;
        
        marker.bindPopup(`
            <div class="p-2">
                <h4 class="font-semibold text-indigo-600 mb-2">
                    <i class="fas fa-map-marker-alt mr-1"></i>
                    Lokasi Penjemputan
                </h4>
                <p class="text-sm text-gray-600">${e.geocode.name}</p>
            </div>
        `).openPopup();
    })
    .addTo(map);

    // Map click event
    var loclng = document.querySelector("[name=longitude]");
    var loclat = document.querySelector("[name=latitude]");

    map.on("click", function(e) {
        var lat = e.latlng.lat;
        var lng = e.latlng.lng;

        marker.setLatLng(e.latlng);
        loclng.value = lng;
        loclat.value = lat;

        getAddress(lat, lng, function(address) {
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
    });

    // Get address function
    function getAddress(lat, lng, callback) {
        var url = `https://nominatim.openstreetmap.org/reverse?format=jsonv2&lat=${lat}&lon=${lng}`;
        fetch(url)
            .then(response => response.json())
            .then(data => {
                if (data && data.display_name) {
                    callback(data.display_name);
                } else {
                    callback("Alamat tidak ditemukan");
                }
            })
            .catch(error => {
                console.error('Error fetching address:', error);
                callback("Error mengambil alamat");
            });
    }

    // Date and time validation
    document.addEventListener('DOMContentLoaded', function () {
        const pickUpTimeInput = document.querySelector('input[name="pickup_time"]');
        const departureDateInput = document.querySelector('input[name="departure_date"]');
        const returnDateInput = document.querySelector('input[name="return_date"]');

        const today = moment().tz("Asia/Jakarta").format('YYYY-MM-DD');
        departureDateInput.setAttribute('min', today);
        returnDateInput.setAttribute('min', today);

        departureDateInput.addEventListener('change', function () {
            const departureDate = this.value;
            returnDateInput.setAttribute('min', departureDate);
            
            if (departureDate === today) {
                const currentTime = moment().tz("Asia/Jakarta").format('HH:mm');
                pickUpTimeInput.setAttribute('min', currentTime);
            } else {
                pickUpTimeInput.removeAttribute('min');
            }
        });

        pickUpTimeInput.addEventListener('change', function () {
            const timeValue = this.value;
            const departureDate = departureDateInput.value;

            if (departureDate === today) {
                const currentTime = moment().tz("Asia/Jakarta").add(2, 'hours').format('HH:mm');
                if (timeValue < currentTime) {
                    alert("Waktu penjemputan tidak bisa kurang dari 2 jam dari sekarang.");
                    this.value = currentTime;
                }
            }

            if (timeValue < "05:00") {
                alert("Waktu penjemputan tidak bisa sebelum jam 05:00.");
                this.value = "05:00";
            }
        });
    });
</script>
@endpush