@extends('penyewa.layouts.app')

@section('title', 'Detail Transaction')

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

<!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

    <!-- Bootstrap JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>


    <style>
        h5 {
            font-size: 1.28571429em;
            font-weight: 700;
            line-height: 1.2857em;
            margin: 0;
        }

        .card {
            font-size: 1em;
            overflow: hidden;
            padding: 0;
            border: none;
            border-radius: .28571429rem;
            box-shadow: 0 1px 3px 0 #d4d4d5, 0 0 0 1px #d4d4d5;
        }

        .card-block {
            font-size: 1em;
            position: relative;
            margin: 0;
            padding: 1em;
            border: none;
            border-top: 1px solid rgba(34, 36, 38, .1);
            box-shadow: none;
        }

        .card-img-top {
            display: block;
            width: 100%;
            height: auto;
        }

        .card-title {
            font-size: 1.28571429em;
            font-weight: 700;
            line-height: 1.2857em;
        }

        .card-text {
            clear: both;
            margin-top: .5em;
            color: rgba(0, 0, 0, .68);
        }

        .card-footer {
            font-size: 1em;
            position: static;
            top: 0;
            left: 0;
            max-width: 100%;
            padding: .75em 1em;
            border-top: 1px solid rgba(0, 0, 0, 0.3) !important;
            background: #fff;
        }

        .card-inverse .btn {
            border: 1px solid rgba(0, 0, 0, .05);
        }

        .profile {
            position: absolute;
            top: -12px;
            display: inline-block;
            overflow: hidden;
            box-sizing: border-box;
            width: 25px;
            height: 25px;
            margin: 0;
            border: 1px solid #fff;
            border-radius: 50%;
        }

        .profile-avatar {
            display: block;
            width: 100%;
            height: 100%;
            border-radius: 50%;
        }

        .profile-inline {
            position: relative;
            top: 0;
            display: inline-block;
        }

        .profile-inline~.card-title {
            display: inline-block;
            margin-left: 4px;
            vertical-align: top;
        }

        .text-bold {
            font-weight: 700;
        }

        .meta {
            font-size: 1em;
            color: rgba(0, 0, 0, .4);
        }

        .meta a {
            text-decoration: none;
            color: rgba(0, 0, 0, .4);
        }

        .meta a:hover {
            color: rgba(0, 0, 0, .87);
        }

        /* Tabs Card */
        .tab-card {
            border: 1px solid #eee;
        }

        .tab-card-header {
            background: none;
        }

        /* Default mode */
        .tab-card-header>.nav-tabs {
            border: none;
            margin: 0px;
        }

        .tab-card-header>.nav-tabs>li {
            margin-right: 2px;
        }

        .tab-card-header>.nav-tabs>li>a {
            border: 0;
            border-bottom: 2px solid transparent;
            margin-right: 0;
            color: #737373;
            padding: 2px 15px;
        }

        .tab-card-header>.nav-tabs>li>a.show {
            border-bottom: 2px solid #007bff;
            color: #007bff;
        }

        .tab-card-header>.nav-tabs>li>a:hover {
            color: #007bff;
        }

        .tab-card-header>.tab-content {
            padding-bottom: 0;
        }

        #map {
            height: 260px;
            z-index: 0;
        }
    </style>

@endpush

@section('content')
<div class="container py-5">
        <div class="row">
            <div class="col mt-4">
                <div class="card">
                    <div class="card-block bg-info text-white">
                        <div class="p-3">
                            <h5>PO XYZ Pariwisata</h5>
                            <hr>
                            <div class=" mt-3 mb-5">
                                <h1>INVOICE</h1>
                                <p>{{ $transaction->code }} | {{ $transaction->created_at }}</p>
                            </div>
                            <div class="row">
                                <h5>Informasi Transaksi</h5>
                                <div class="col-lg-6 mt-3">
                                    <h6 class="mb-3">Informasi Transaksi</h6>
                                    <p class="mb-1">{{ $transaction->kantorcabang->name }}</p>
                                    <p class="mb-1">Pembayaran: {{ $transaction->transaction_status }}</p>
                                    <!-- <p class="mb-1">Pengiriman {{ $transaction->shipping_status }}</p> -->
                                    <!-- <p class="mb-1">Nama Pengirim {{ $transaction->nama_pengirim }}</p> -->
                                    <!-- <p class="mb-1">Total Harga Rp{{ number_format($transaction->total_price) }}</p> -->
                                    <!-- <p class="mb-1">Biaya Admin Rp{{ number_format($transaction->pajak) }}</p> -->
                                    <!-- <p class="mb-1">Ongkir Rp{{ number_format($transaction->ongkir) }}</p> -->
                                    <p class="mb-1 text-bold">Total Keseluruhan Rp{{ number_format($transaction->total_price) }}</p>
                                </div>
                                <div class="col-lg-6 mt-3">
                                    <h6 class="mb-3">Informasi Pembeli</h6>
                                    <p class="mb-1">{{ $transaction->user->name }}</p>
                                    <p class="mb-1">{{ $transaction->user->email }}</p>
                                    <p class="mb-1">{{ $transaction->user->phone_number }}</p>
                                    <p class="mb-1">{{ $transaction->user->address }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card col-lg-12 ps-lg-5 card-profile" data-aos="fade-up" data-aos-delay="200">
                        <!-- @method('put')
                        @csrf -->
                        <div class="d-flex justify-content-between align-items-center">
                            <h3 class="card-title fs-2 mt-3">{{ $transaction->code }}</h3>
                        </div>
                        {{-- <div class="meta">
                            <p class="mb-0">email</p>
                            <p class="mb-0">phone number</p>
                        </div> --}}
                        <div class="mt-5 text-start">
                            {{-- <h5 class="mb-3">Alamat</h5> --}}
                            <table class="table table-hover">
                                <tbody>
                                    <tr>
                                        <th>Nama</th>
                                        <td>{{ $transaction->user->name }}</td>
                                    </tr>
                                    <tr>
                                        <th>Destinasi</th>
                                        <td>{{ $transaction->destination->name }}</td>
                                    </tr>
                                    <tr>
                                        <th>Category Bus</th>
                                        <td>{{ $transaction->categorybus->name }}</td>
                                    </tr>
                                    <tr>
                                        <th>Bus</th>
                                        <td>{{ $transaction->bus->name }}</td>
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
                                        <th>Biaya Tambahan</th>
                                        <td>Rp {{ number_format($transaction->extra_charge) }}</td>
                                    </tr>
                                    <tr>
                                        <th>Total Harga</th>
                                        <td>Rp {{ number_format($transaction->total_price) }}</td>
                                    </tr>
                                    <tr>
                                        <th>Lokasi Penjemputan</th>
                                        <td>
                                            <div id="map"></div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    {{-- <div>
                        <a class="booking-submit" href="{{ route('profile.transaction.pdf', $transaction->id) }}" type="button">
                        Unduh PDF
                        </a>
                    </div> --}}

                    
                </div>
            </div>
        </div>
    </div>
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
