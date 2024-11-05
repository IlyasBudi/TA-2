@extends('staff.layouts.app')

@section('title', 'Transaction')

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
            height: 260px;
            z-index: 0;
        }
    </style>
@endpush

@section('content')
    <div class="pagetitle">
        <h1>Data Transaksi</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/staff/dashboard">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="/staff/transaction">Transaksi</a></li>
                <li class="breadcrumb-item active">Data Transaksi</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Detail Transaksi {{ $transaction->code }}</h5>
                        <h6>Data Transaksi</h6>
                        <table class="table mb-5">
                            <tbody>
                                <tr>
                                    <th>Nama Penyewa</th>
                                    <td>{{ $transaction->user->name }}</td>
                                </tr>
                                <tr>
                                    <th>Nomor Telepon Penyewa</th>
                                    <td>{{ $transaction->user->phone_number }}</td>
                                </tr>
                                <tr>
                                    <th>Kategori Bus</th>
                                    <td>{{ $transaction->category_bus->name }}</td>
                                </tr>
                                <tr>
                                    <th>Destinasi</th>
                                    <td>{{ $transaction->destination->name }}</td>
                                </tr>
                                <tr>
                                    <th>Tanggal Keberangkatan</th>
                                    <td>{{ date('d-m-Y', strtotime($transaction->departure_date)) }}</td>
                                </tr>
                                <tr>
                                    <th>Tanggal Kepulangan</th>
                                    <td>{{ date('d-m-Y', strtotime($transaction->return_date)) }}</td>
                                </tr>
                                <tr>
                                    <th>Waktu Penjemputan</th>
                                    <td>{{ date('H:i', strtotime($transaction->pickup_time)) }}</td>
                                </tr>
                                
                                <tr>
                                <tr>
                                    <th>Tanggal Pemesanan</th>
                                    <td>{{ \Carbon\Carbon::parse($transaction->create_at)->format('d-m-Y H:i') }}</td>
                                </tr>
                                <tr>
                                    <th>Total Harga</th>
                                    <td>Rp{{ number_format($transaction->total_price) }}</td>
                                </tr>

                                <tr>
                                    <th>Lokasi Penjemputan</th>
                                    <td>
                                        <div id="map"></div>
                                    </td>
                                </tr>

            
                            </tbody>
                        </table>
                        <!-- Table with stripped rows -->
                        {{-- <h6>Data Detail Transaksi</h6>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Gambar</th>
                                    <th scope="col">Produk</th>
                                    <th scope="col">Jumlah</th>
                                    <th scope="col">Harga</th>
                                    <th scope="col">Akumulasi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($details as $detail)
                                    <tr>
                                        <td><img src="{{ Storage::url($detail->product->image) }}" alt=""
                                                style="height:40px; width:60px; object-fit: cover;">
                                        </td>
                                        <td>{{ $detail->product->name }}</td>
                                        <td>{{ $detail->qty }}</td>
                                        <td>Rp{{ number_format($detail->product->price) }}</td>
                                        <td>Rp{{ number_format($detail->product->price * $detail->qty) }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table> --}}
                        
                        <!-- End Table with stripped rows -->
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
            center: [{{ $transaction->latitude }}, {{ $transaction->longitude }}],
            zoom: 16,
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
        var curLocation = [{{ $transaction->latitude }}, {{ $transaction->longitude }}];
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
