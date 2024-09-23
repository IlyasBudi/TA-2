@extends('penyewa.layouts.app')

@section('title', 'Welcome')

@push('before-style')
    <!-- pada section styles menambahkan style css untuk menampilkan plugin leaflet  -->
    <!-- {{-- cdn css leaflet  --}} -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.8.0/dist/leaflet.css"
        integrity="sha512-hoalWLoI8r4UszCkZ5kL8vayOGVae1oxXe/2A4AO6J9+580uKHDO3JdHb7NzwwzK5xr/Fs0W40kiNHxM9vyTtQ=="
        crossorigin="" />

    <!-- {{-- cdn js leaflet --}} -->
    <script src="https://unpkg.com/leaflet@1.8.0/dist/leaflet.js"
        integrity="sha512-BB3hKbKWOc9Ez/TAwyWxNXeoV9c1v6FIeYiBieIWkpLjauysF18NzgR1MBNBXf8/KABdlkX68nAhlwcDFLGPCQ=="
        crossorigin=""></script>

    <!-- {{-- cdn leaflet fullscreen js dan css --}} -->
    <script src='https://api.mapbox.com/mapbox.js/plugins/leaflet-fullscreen/v1.0.1/Leaflet.fullscreen.min.js'></script>
    <link href='https://api.mapbox.com/mapbox.js/plugins/leaflet-fullscreen/v1.0.1/leaflet.fullscreen.css' rel='stylesheet' />

    <!-- {{-- cdn leaflet search --}} -->
    <link rel="stylesheet" href="{{ asset('css/leaflet-search.css') }}">
    <script src="{{ asset('js/leaflet-search.js') }}"></script>

    <!-- cdn leafle current location -->
    <script src="https://cdn.jsdelivr.net/npm/leaflet.locatecontrol@0.79.0/dist/L.Control.Locate.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/leaflet.locatecontrol@0.79.0/dist/L.Control.Locate.min.css" rel="stylesheet">

    <style>
        #map {
            height: 560px;
            z-index: 0;
        }
    </style>
@endpush

@section('content')
    <!-- Page Title -->
    <div class="page-title" data-aos="fade">
        <div class="heading">
        <div class="container">
            <div class="row d-flex justify-content-center text-center">
            <div class="col-lg-10">
                <h1>Booking</h1>
                <p class="mb-0">Selamat datang di halaman pemesanan kami. Kami siap menemani perjalanan Anda dengan kenyamanan dan keamanan.</p>
            
                <form class="booking-form" action="{{ route('booking') }}" method="post" enctype="multipart/form-data" data-aos="fade-up" data-aos-delay="200">
                @csrf
                <div class="row gy-4">

                    <div class="col-12">
                        <label class="label-form">Destinasi</label>
                        <select class="form-select" name="destination_id" id='destination_id'>
                            <option selected>Pilih Destinasi</option>
                            @foreach ($destination as $destination)
                            <option value="{{ $destination->id }}">{{ $destination->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-12">
                        <label class="label-form">Kategori Bus</label>
                        <select class="form-select" name="category_bus_id" id='category_bus_id'>
                            <option selected>Pilih Kategori</option>
                            @foreach ($categorybus as $categorybus)
                            <option value="{{ $categorybus->id }}">{{ $categorybus->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-12">
                        <label class="label-form">Tanggal Keberangkatan</label>
                        <input type="date" class="form-control" name="departure_date" placeholder="Tanggal Keberangkatan" required>
                    </div>

                    <div class="col-12">
                        <label class="label-form">Tanggal Kepulangan</label>
                        <input type="date" class="form-control" name="arrival_date" placeholder="Tanggal Kepulangan" required>
                    </div>

                    <div class="col-12">
                        <label class="label-form">Waktu Penjemputan</label>
                        <input type="time" class="form-control" name="pickup_time" placeholder="Waktu Penjemputan" min="05:00" required>
                    </div>

                    <div class="col-12">
                        {{-- <label class="label-form">Longitude</label> --}}
                        <input type="text" class="form-control" id="longitude" name="longitude" disabled required>
                    </div>

                    <div class="col-12">
                        {{-- <label class="label-form">Latitude</label> --}}
                        <input type="text" class="form-control" id="latitude" name="latitude" disabled required>
                    </div>

                    <div class="col-12">
                        <label for="location" class="label-form">Lokasi Keberangkatan</label>
                        <p class="text-form">Klik lokasi pada map untuk menentukan titik Keberangkatan.</p>
                        {{-- <div class="col-sm-10"> --}}
                            <div id="map"></div>
                        {{-- </div> --}}
                    </div>

                    <div class="col-12">
                        <button class="booking-submit" type="submit">Submit</button>
                        
                    </div>
                    

                    

                </div>
                </form>

            </div>
            </div>
        </div>
        </div>
        {{-- <nav class="breadcrumbs">
        <div class="container">
            <ol>
            <li><a href="index.html">Home</a></li>
            <li class="current">Services Details</li>
            </ol>
        </div>
        </nav> --}}
    </div><!-- End Page Title -->
@endsection


@push('after-scripts')
<script src="{{ asset('v1/vendor/select2/js/select2.full.min.js') }}"></script>
<script>
    // membuat variabel untuk load attribute dan url pada map
    var mbAttr = 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, ' +
        'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
        mbUrl =
        'https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoiaWx5YXMzMTciLCJhIjoiY2x4cTd2YXN6MHR2bzJqc2g5ZnJzbzBhcSJ9.4C6RKZ06Bi7b-l5tYqwfQg';

    // membuat var satellite, dark, dan streets agar layer map kita punya beberapa opsi tampilan yang bisa kita ubah 
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

    // mendefinisikan var map. Menambahkan opsi seperti center untuk menentukan latitude dan longitude,
    // mengantur zoom map saat di load dan memuat layer yang di inginkan.
    // Untuk nilai dari latitude longitude bisa disesuaikan dengan lokasi yang di inginkan 
    // nilai latitude dan longitude bisa di ambil dari google map
    var map = L.map('map', {
        center: [-6.223011844553948, 106.6428825914336],
        zoom: 13,
        // maxZoom: 24,
        layers: [streets]
    });

    // set baselayer yang ingin digunakan
    var baseLayers = {
        //"Grayscale": grayscale,
        "Streets": streets,
        "Streets2": street1
    };

    L.control.fullscreen({
        position: 'bottomright'
    }).addTo(map);


    // set overlayer yang ingin digunakan
    // var overlays = {
    //     "Streets": street1,
    //     "Streets2": streets
    // };

    // menambahkan baselayer dan overlays tadi ke dalam control dan di tampilkan ke tag map
    // L.control.layers(baseLayers, overlays).addTo(map);
    L.control.layers(baseLayers).addTo(map);


    // set koordinat lokasi ke dalam curLocation yang mana nilai dari curLocation juga akan
    // digunakan untuk menampilkan marker pada map
    var curLocation = [-6.223011844553948, 106.6428825914336];
    map.attributionControl.setPrefix(false);

    var marker = new L.marker(curLocation, {
        draggable: 'true',
    });
    map.addLayer(marker);

    // dan ketika marker tersebut di geser akan mendapatkan titik koordinat yaitu latitude  dan longitudenya
    // lalu menambahkan titik koordinat tersebut ke dalam tag input dengan namenya location 
    marker.on('dragend', function(event) {
        var location = marker.getLatLng();
        marker.setLatLng(location, {
            draggable: 'true',
        }).bindPopup(location).update();

        $('#longitude').val(location.lng).keyup()
        $('#latitude').val(location.lat).keyup()
    });

    // selain itu dengan fungsi di bawah juga bisa mendapatkan nilai latitude dan longitude
    // dengan cara klik lokasi pada map maka nilai latitude dan longitudenya juga akan
    // langsung muncul pada input text location

    var loclng = document.querySelector("[name=longitude]");
    map.on("click", function(e) {
        // var lat = e.latlng.lat;
        var lng = e.latlng.lng;

        if (!marker) {
            marker = L.marker(e.latlng).addTo(map);
        } else {
            marker.setLatLng(e.latlng);
        }
        loclng.value = lng;
    });

    var loclat = document.querySelector("[name=latitude]");
    map.on("click", function(e) {
        var lat = e.latlng.lat;
        // var lng = e.latlng.lng;

        if (!marker) {
            marker = L.marker(e.latlng).addTo(map);
        } else {
            marker.setLatLng(e.latlng);
        }
        loclat.value =lat;
    });
</script>
<script>
    var previousMarker = null;
    //atau menambahkan latitude dan longitude secara manual di text input
    //dengan mentrigger button addMarker()

    function addMarker() {
        var longitude = document.getElementById("longitude").value;
        var latitude = document.getElementById("latitude").value;
        var latlngInput = latitude + longitude;
        var latlngArray = latlngInput.split(","); // Assuming the input is in the format "latitude,longitude"

        if (latlngArray.length === 2) {
            var latitudeIn = parseFloat(latlngArray[0]);
            var longitudeIn = parseFloat(latlngArray[1]);

            if (!isNaN(latitudeIn) && !isNaN(longitudeIn)) {

                // Hapus marker sebelumnya jika ada
                if (previousMarker) {
                    map.removeLayer(previousMarker);
                }

                var marker = L.marker([longitudeIn, latitudeIn]).addTo(map);
                previousMarker = marker;
                // console.log("Marker added at:", marker.getLatLng());
            } else {
                console.log("Invalid latitude or longitude.");
            }
        } else {
            console.log("Invalid input format. Please use the format 'latitude,longitude'.");
        }
    }
</script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const pickUpTimeInput = document.querySelector('input[name="pickup-time"]');
    
        pickUpTimeInput.addEventListener('change', function () {
            const timeValue = this.value;
            if (timeValue < "05:00") {
                alert("Waktu penjemputan tidak bisa sebelum jam 05:00.");
                // Opsional: Setel ulang nilai input atau atur ke nilai default
                this.value = "05:00";
            }
        });
    });
</script>
@endpush