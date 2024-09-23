@extends('staff.layouts.app')

@section('title', 'Kantor Cabang')

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
    <div class="pagetitle">
        <h1>Tambah Kantor Cabang</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/staff/dashboard">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="/staff/kantorcabang">Kantor Cabang</a></li>
                <li class="breadcrumb-item active">Tambah Kantor Cabang</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Tambah Kantor Cabang</h5>
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <!-- General Form Elements -->
                        <form action="/staff/kantorcabang" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row mb-3">
                                <label for="name" class="col-sm-2 col-form-label">Nama Kantor Cabang</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                                        name="name">
                                </div>
                                @error('name')
                                    <div class="invalid-feedback">
                                        Nama tidak boleh kosong
                                    </div>
                                @enderror
                            </div>
                            <div class="row mb-3">
                                <label for="phone_number" class="col-sm-2 col-form-label">Nomor Telepon</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control @error('phone_number') is-invalid @enderror"
                                        name="phone_number">
                                </div>
                                @error('phone_number')
                                    <div class="invalid-feedback">
                                        Nomor Telepon tidak boleh kosong
                                    </div>
                                @enderror
                            </div>
                            <div class="row mb-3">
                                <label for="address" class="col-sm-2 col-form-label">Alamat Kantor Cabang</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control @error('address') is-invalid @enderror"
                                        name="address">
                                </div>
                                @error('address')
                                    <div class="invalid-feedback">
                                        Alamat tidak boleh kosong
                                    </div>
                                @enderror
                            </div>
                            <div class="row mb-3">
                                <label for="image" class="col-sm-2 col-form-label">Gambar Kantor Cabang</label>
                                <div class="col-sm-10">
                                    <input class="form-control @error('image') is-invalid @enderror" type="file"
                                        name="image">
                                </div>
                            </div>

                            <h5 class="card-title">Lokasi</h5>
                            <div class="row mb-3">
                                <label for="location" class="col-sm-2 col-form-label">Longitude</label>
                                <div class="col-sm-10">
                                    <div class="input-group">
                                        <input type="text" class="form-control @error('longitude') is-invalid @enderror"
                                            name="longitude" id="longitude">
                                        {{-- <button class="btn btn-success" type="button" onclick="addMarker();">Cek</button> --}}
                                    </div>
                                </div>
                                @error('location')
                                    <div class="invalid-feedback">
                                        Lokasi tidak boleh kosong
                                    </div>
                                @enderror
                            </div>
                            <div class="row mb-3">
                                <label for="location" class="col-sm-2 col-form-label">Latitude</label>
                                <div class="col-sm-10">
                                    <div class="input-group">
                                        <input type="text" class="form-control @error('latitude') is-invalid @enderror"
                                            name="latitude" id="latitude">
                                        {{-- <button class="btn btn-success" type="button" onclick="addMarker();">Cek</button> --}}
                                    </div>
                                </div>
                                @error('location')
                                    <div class="invalid-feedback">
                                        Lokasi tidak boleh kosong
                                    </div>
                                @enderror
                            </div>
                            <div class="row mb-3">
                                <label for="location" class="col-sm-2 col-form-label">Maps</label>
                                <div class="col-sm-10">
                                    <div id="map"></div>
                                </div>
                            </div>
                            
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Submit Button</label>
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </div>
                            </div>
                        </form><!-- End General Form Elements -->
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('after-scripts')
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
            zoom: 18,
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
            var latlngInput = latitude + "," + longitude;
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
@endpush
