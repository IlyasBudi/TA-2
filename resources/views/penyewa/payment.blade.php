@extends('penyewa.layouts.app')

@section('title', 'Profile')

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
<!-- Page Title -->
<div class="page-title" data-aos="fade">
        <div class="heading">
          <div class="container">
            <div class="row d-flex justify-content-center text-center">
              <div class="col-lg-10">
                <h1 class="pb-3">Checkout</h1>

                {{-- <div class="card"> --}}
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
                                        <th>Lokasi Penjemputan</th>
                                        <td>
                                            <div id="map"></div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Total Harga</th>
                                        <th>Rp{{ number_format($transaction->total_price) }}</th>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                {{-- </div> --}}
                    <div class="confirm-payment">
                        <a class="booking-submit" href="/transaction/{{ $transaction->id }}/delete" type="button">
                        Batalkan
                        </a>
                        <a class="booking-submit" id="pay-button" type="button">
                        Bayar
                        </a>
                    </div>
              </div>
            </div>
          </div>
        </div>
       
    </div><!-- End Page Title -->
@endsection

@push('after-scripts')
{{-- <script src="{{ asset('v1/vendor/select2/js/select2.full.min.js') }}"></script> --}}
<script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js"
    data-client-key="{{ config('midtrans.midtrans.client_key') }}">
</script>
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
        draggable: 'false',
    });
    map.addLayer(marker);

    
</script>

<script type="text/javascript">
        document.getElementById('pay-button').onclick = function() {
            snap.pay('{{ $snapToken }}', {
                onSuccess: function(result) {
                    alert("Payment successful!");
                    window.location.href = "/success";
                },
                onPending: function(result) {
                    alert("Payment pending!");
                    window.location.href = "/";
                },
                onError: function(result) {
                    alert("Payment failed!");
                    window.location.href = "/";
                }
            });
        };
</script>
@endpush