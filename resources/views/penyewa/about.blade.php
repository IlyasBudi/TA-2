@extends('penyewa.layouts.app')

@section('title', 'About')

@section('content')

    <!-- Page Title -->
    <div class="page-title" data-aos="fade">
        <div class="heading">
          <div class="container">
            <div class="row d-flex justify-content-center text-center">
              <div class="col-lg-8">
                <h1>About Us</h1>
                <p class="mb-0">Gambaran Umum PT XYZ Indonesia.</p>
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
    <section id="service-details" class="service-details section">
  
        <div class="container">
  
          <div class="row gy-5">
  
            {{-- <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
  
              <div class="service-box">
                <h4>Serices List</h4>
                <div class="services-list">
                  <a href="#" class="active"><i class="bi bi-arrow-right-circle"></i><span>Web Design</span></a>
                  <a href="#"><i class="bi bi-arrow-right-circle"></i><span>Web Design</span></a>
                  <a href="#"><i class="bi bi-arrow-right-circle"></i><span>Product Management</span></a>
                  <a href="#"><i class="bi bi-arrow-right-circle"></i><span>Graphic Design</span></a>
                  <a href="#"><i class="bi bi-arrow-right-circle"></i><span>Marketing</span></a>
                </div>
              </div><!-- End Services List -->
  
              <div class="service-box">
                <h4>Download Catalog</h4>
                <div class="download-catalog">
                  <a href="#"><i class="bi bi-filetype-pdf"></i><span>Catalog PDF</span></a>
                  <a href="#"><i class="bi bi-file-earmark-word"></i><span>Catalog DOC</span></a>
                </div>
              </div><!-- End Services List -->
  
              <div class="help-box d-flex flex-column justify-content-center align-items-center">
                <i class="bi bi-headset help-icon"></i>
                <h4>Have a Question?</h4>
                <p class="d-flex align-items-center mt-2 mb-0"><i class="bi bi-telephone me-2"></i> <span>+1 5589 55488 55</span></p>
                <p class="d-flex align-items-center mt-1 mb-0"><i class="bi bi-envelope me-2"></i> <a href="mailto:contact@example.com">contact@example.com</a></p>
              </div>
  
            </div> --}}
  
            <div class="col-lg-8 ps-lg-5" data-aos="fade-up" data-aos-delay="200">
            <h1>PO XYZ INDONESIA</h1>
              <img src="{{ asset('/penyewatemplate') }}/assets/img/baru2/logo-XYZ.svg" alt="" class="img-fluid services-img">
              <h3>Tentang PT XYZ</h3>
              <p>
              PO XYZ Indonesia adalah perusahaan penyewaan bus pariwisata yang berdiri di Indonesia untuk memenuhi kebutuhan transportasi masyarakat yang mengutamakan kenyamanan, keselamatan, dan pelayanan terbaik. 
              Sejak awal berdiri, kami telah berkembang menjadi salah satu penyedia jasa transportasi yang terpercaya di Indonesia, melayani berbagai keperluan perjalanan mulai dari wisata lokal, kunjungan kerja, hingga perjalanan lintas provinsi.
              </p>
              <p>
              Sebagai perusahaan yang berfokus pada kepuasan pelanggan, kami terus meningkatkan kualitas layanan melalui pembaruan armada, pelatihan staf, dan penerapan teknologi terkini. 
              Dengan moto <strong>"Perjalanan Nyaman, Kenangan Indah"</strong>, kami berkomitmen untuk memberikan pengalaman perjalanan yang menyenangkan dan berkesan bagi setiap pelanggan kami.
              </p>
              <p>
              Kami memahami bahwa setiap perjalanan adalah cerita baru yang berharga, dan karena itu, kami berusaha memastikan setiap detail layanan kami memenuhi kebutuhan pelanggan. 
              Mulai dari proses pemesanan yang mudah, fasilitas bus yang lengkap, hingga pelayanan sopir yang ramah, semua kami siapkan untuk memastikan Anda mendapatkan pengalaman terbaik bersama PO XYZ Indonesia.
              </p>
              <h3>Sejarah PO XYZ</h3>
              <p>
              PO XYZ didirikan, PO XYZ mempunyai visi besar untuk mendukung pertumbuhan pariwisata di Indonesia. Dimulai dengan hanya beberapa armada bus, 
              perusahaan ini kini telah berkembang menjadi salah satu pemain utama dalam industri transportasi pariwisata dengan ratusan armada modern dan jaringan operasional yang luas.
              </p>
              <p>
              Kami bangga telah menjadi bagian dari banyak momen berharga pelanggan kami, dari perjalanan wisata keluarga, rombongan sekolah, hingga acara korporasi. 
              Kepercayaan yang telah kami bangun selama bertahun-tahun adalah bukti dedikasi kami untuk memberikan layanan terbaik.
              </p>
            </div>
  
          </div>
  
        </div>
  
    </section><!-- /Service Details Section -->

    <!-- Recent Posts Section -->
    <section id="recent-posts" class="recent-posts section">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
          <h2>Kantor Cabang</h2>
          <p>Kunjungi kantor cabang kami yang tersebar di berbagai lokasi untuk mendapatkan informasi lengkap terkait pemesanan bus pariwisata.</p>
        </div><!-- End Section Title -->
  
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
  
    </section><!-- /Recent Posts Section -->
@endsection