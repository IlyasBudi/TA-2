@extends('penyewa.layouts.app')

@section('title', 'About')

@section('content')

    <!-- Page Title -->
    <div class="page-title" data-aos="fade">
        <div class="heading">
          <div class="container">
            <div class="row d-flex justify-content-center text-center">
              <div class="col-lg-8">
                <h1>Kantor Cabang</h1>
                <p class="mb-0">Kunjungi kantor cabang kami yang tersebar di berbagai lokasi untuk mendapatkan informasi lengkap terkait pemesanan bus pariwisata.</p>
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
    
    <div class="container">
            
          <div class="row gy-4">
            @foreach ($kantorcabangs as $kantorcabang)
            <div class="col-xl-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
              <article>
  
                <div class="post-img">
                  <img src="{{ Storage::url($kantorcabang->image) }}" height="240" width="720" alt="" class="img-fluid">
                </div>
  
                <h2 class="title">
                  <a href="/kantorcabang/{{ $kantorcabang->id }}">{{ $kantorcabang->name }}</a>
                </h2>

                <p class="post-category">{{ $kantorcabang->address }}</p>
  
              </article>
            </div><!-- End post list item -->
  
            
            @endforeach
          </div><!-- End recent posts list -->
          
    </div>
@endsection