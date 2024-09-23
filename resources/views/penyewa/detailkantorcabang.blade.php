@extends('penyewa.layouts.app')

@section('title', 'Detail Kantor Cabang')

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
            height: 460px;
            z-index: 0;
        }
    </style>
@endpush

@section('content')

    <!-- Page Title -->
    <div class="page-title-details" data-aos="fade">
        <div class="heading">
          <div class="container">
            <div class="row d-flex justify-content-center text-center">
              <div class="col-lg-8">
                <p class="mb-0">Kantor Cabang</p>
                <h1>{{ $kantorcabang->name }}</h1>
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
  
      <!-- Service Details Section -->
    <section id="kantorcabang-details" class="kantorcabang-details section">
  
        <div class="container">
  
          <div class="row gy-5">
  
            <div class="col-lg-8 ps-lg-5" data-aos="fade-up" data-aos-delay="200">

              <img src="{{ Storage::url($kantorcabang->image) }}" height="480" height="720" class="img-fluid services-img">
              <h4>- Nama</h4>
              <p>
                {{ $kantorcabang->name }}
              </p>
              <h4>- Nomor Telepon</h4>
              <p>
                {{ $kantorcabang->phone_number }}
              </p>
              <h4>- Alamat</h4>
              <p>
                {{ $kantorcabang->address }}
              </p>
              <h4>- Lokasi</h4>
              <div id="map"></div>
              {{-- <p>
                {{ $kantorcabang->longitude }} , {{ $kantorcabang->latitude }}
              </p> --}}
            </div>
  
          </div>
  
        </div>
  
    </section><!-- /Service Details Section -->

    <!-- Recent Posts Section -->
    <section id="recent-posts" class="recent-posts section">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
          <h2>bus</h2>
          {{-- <p>Temukan destinasi populer di seluruh dunia dengan layanan kami dan nikmati pengalaman liburan yang tak terlupakan.</p> --}}
        </div><!-- End Section Title -->
  
        <div class="container">

          <div class="row gy-4">
  
            @if ($kantorcabang->bus->isNotEmpty())
            @foreach ($kantorcabang->bus as $bus)

            <div class="col-xl-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
              <article>
  
                <div class="post-img">
                  <img src="{{ Storage::url($bus->image) }}" height="240" width="720" alt="" class="img-fluid">
                </div>
  
                <h2 class="title">
                  <a href="blog-details.html">{{ $bus->name }}</a>
                </h2>

                <p class="post-category">{{ $bus->description }}</p>
  
              </article>
            </div><!-- End post list item -->
            @endforeach
            @else
            <p class="text-center">Kantor Cabang ini belum memiliki Bus</p>
             @endif
          </div><!-- End recent posts list -->
          
          

        </div>
  
    </section><!-- /Recent Posts Section -->
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
    var curLocation = [{{ $kantorcabang->latitude }}, {{ $kantorcabang->longitude }}];
    map.attributionControl.setPrefix(false);

    var marker = new L.marker(curLocation, {
        draggable: 'false',
    });
    map.addLayer(marker);

    
</script>
@endpush