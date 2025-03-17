@extends('admin.layouts.app')

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
            height: 260px;
            z-index: 0;
        }
    </style>
@endpush

@section('header')
    <div class="pagetitle">
        <h1>Data Kantor Cabang</h1>
        <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/admin/dashboard">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="/admin/kantorcabang">Kantor Cabang</a></li>
            <li class="breadcrumb-item active">Data Kantor Cabang</li>
        </ol>
        </nav>
    </div><!-- End Page Title -->
@endsection

@section('content')
    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Data Kantor Cabang {{ $kantorcabang->name }}</h5>
                        <!-- Table with stripped rows -->
                        <table class="table">
                            <tbody>
                                <tr>
                                    <th>Nama Kantor Cabang</th>
                                    <td>{{ $kantorcabang->name }}</td>
                                </tr>
                                <tr>
                                    <th>Staff</th>
                                    <td>{{ $kantorcabang->staff->name }}</td>
                                </tr>
                                <tr>
                                    <th>Gambar Kantor Cabang</th>
                                    <td><img src="{{ Storage::url($kantorcabang->image) }}" alt=""
                                            style="height:200px; width:220px; object-fit: cover;"></td>
                                </tr>
                                {{-- <tr>
                                    <th>Deskripsi</th>
                                    <td>{{ $kantorcabang->description }}</td>
                                </tr> --}}
                                
                                <tr>
                                    <th>Nomor Telepon</th>
                                    <td>{{ $kantorcabang->phone_number }}</td>
                                </tr>
                                <tr>
                                    <th>Alamat</th>
                                    <td>{{ $kantorcabang->address }}</td>
                                </tr>
                                <tr>
                                    <th>Lokasi Kantor Cabang</th>
                                    <td><div id="map"></div></td>
                                </tr>
                            </tbody>
                        </table>
                        <!-- End Table with stripped rows -->

                        <h5 class="card-title">Data Staff Kantor Cabang {{ $kantorcabang->name }}</h5>
                        <!-- Table with stripped rows -->
                        <table class="table table-hover">
                            <tbody>
                                <tr>
                                    <th>Nama Staff</th>
                                    <td>{{ $kantorcabang->staff->name }}</td>
                                </tr>
                                <tr>
                                    <th>Email Staff</th>
                                    <td>{{ $kantorcabang->staff->email }}</td>
                                </tr>
                                <tr>
                                    <th>Phone Number Staff</th>
                                    <td>{{ $kantorcabang->staff->phone_number }}</td>
                                </tr>
                                <tr>
                                    <th>Alamat Lengkap Staff</th>
                                    <td>{{ $kantorcabang->staff->address }}</td>
                                </tr>
                            </tbody>
                        </table>
                        <!-- End Table with stripped rows -->

                        <h5 class="card-title">Data Bus Kantor Cabang {{ $kantorcabang->name }}</h5>
                        <!-- Table with stripped rows -->
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    {{-- <th scope="col">Kode Bus</th> --}}
                                    <th scope="col">Nama Bus</th>
                                    <th scope="col">Category Seat</th>
                                    <th scope="col">Deskripsi</th>
                                    <th scope="col">Harga</th>
                                    <th scope="col">Gambar Bus</th>
                                    <th scope="col">status</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($kantorcabang->bus as $bus)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        {{-- <td>{{ $bus->code }}</td> --}}
                                        <td>{{ $bus->name }}</td>
                                        <td>{{ $bus->categorybus->name }}</td>
                                        <td>{{ $bus->description }}</td>
                                        <td>{{ $bus->price }}</td>
                                        <td><img src="{{ Storage::url($bus->image) }}" alt=""
                                                style="height:40px; width:60px; object-fit: cover;">
                                        </td>
                                        <td>{{ $bus->status }}</td>
                                        <td>
                                            
                                            <a href="/admin/kantorcabang/bus/{{ $bus->id }}/edit" class="btn btn-warning"><i
                                                    class="bi bi-pencil-fill text-white"></i></a>
                                            <a href="/admin/kantorcabang/bus/{{ $bus->id }}" class="btn btn-primary"><i
                                                    class="bi bi-eye-fill text-white"></i></a>
                                            <a href="/admin/kantorcabang/bus/{{ $bus->id }}/delete" class="btn btn-danger"><i
                                                    class="bi bi-trash3-fill text-white"></i></a>
                                            
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <h5 class="card-title">Data Destinasi Kantor Cabang {{ $kantorcabang->name }}</h5>
                        <!-- Table with stripped rows -->
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    {{-- <th scope="col">Kode Destinasi</th> --}}
                                    <th scope="col">Nama Destinasi</th>
                                    <th scope="col">Harga</th>
                                    <th scope="col">Minimal Sewa</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($kantorcabang->destination as $destination)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        {{-- <td>{{ $bus->code }}</td> --}}
                                        <td>{{ $destination->name }}</td>
                                        <!-- <td>{{ $destination->description }}</td> -->
                                        <td>{{ $destination->price }}</td>
                                        <td>{{ $destination->min_hari }} Hari</td>
                                        <!-- <td><img src="{{ Storage::url($destination->image) }}" alt=""
                                                style="height:40px; width:60px; object-fit: cover;">
                                        </td> -->
                                        <td>
                                            
                                            <a href="/admin/kantorcabang/destination/{{ $destination->id }}/edit" class="btn btn-warning"><i
                                                    class="bi bi-pencil-fill text-white"></i></a>
                                            <a href="/admin/kantorcabang/destination/{{ $destination->id }}" class="btn btn-primary"><i
                                                    class="bi bi-eye-fill text-white"></i></a>
                                            <a href="/admin/kantorcabang/destination/{{ $destination->id }}/delete" class="btn btn-danger"><i
                                                    class="bi bi-trash3-fill text-white"></i></a>
                                            
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <!-- End Table with stripped rows -->
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection

@push('after-scripts')
{{-- <script src="{{ asset('v1/vendor/select2/js/select2.full.min.js') }}"></script> --}}

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
        center: [{{ $kantorcabang->latitude }}, {{ $kantorcabang->longitude }}],
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
    var curLocation = [{{ $kantorcabang->latitude }}, {{ $kantorcabang->longitude }}];
    map.attributionControl.setPrefix(false);

    var marker = new L.marker(curLocation, {
        draggable: 'false',
    });
    map.addLayer(marker);

    
</script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const pickUpTimeInput = document.querySelector('input[name="pickup_time"]');
    
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
