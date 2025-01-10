@extends('penyewa.layouts.app')

@section('title', 'Detail Kantor Cabang')

@section('content')

    <!-- Page Title -->
    <div class="page-title-details" data-aos="fade">
        <div class="heading">
          <div class="container">
            <div class="row d-flex justify-content-center text-center">
              <div class="col-lg-8">
                <p class="mb-0">Bus</p>
                <h1>{{ $bus->name }}</h1>
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

              <img src="{{ Storage::url($bus->image) }}" height="480" height="720" class="img-fluid services-img">
              <h4>- Nama</h4>
              <p>
                {{ $bus->name }}
              </p>
              <h4>- Category Bus</h4>
              <p>
                {{ $bus->categoryBus->name }}
              </p>
              <h4>- Description</h4>
              <p>
                {{ $bus->description }}
              </p>
              <h4>- Status</h4>
              <p>
                {{ $bus->status }}
              </p>
              {{-- <p>
                {{ $kantorcabang->longitude }} , {{ $kantorcabang->latitude }}
              </p> --}}
            </div>
  
          </div>
  
        </div>
  
    </section><!-- /Service Details Section -->
@endsection