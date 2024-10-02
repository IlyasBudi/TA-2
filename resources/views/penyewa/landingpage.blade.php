@extends('penyewa.layouts.app')

@section('title', 'Welcome')

@section('content')

    <!-- Hero Section -->
    <section id="hero" class="hero section dark-background">

        <img src="{{ asset('/penyewatemplate') }}/assets/img/baru/hr-hero.jpeg" alt="" data-aos="fade-in">
  
        <div class="container">
          <div class="row">
            <div class="col-lg-10">
              <h2 data-aos="fade-up" data-aos-delay="100">Selamat Datang di PO Haryanto Pariwisata</h2>
              <p data-aos="fade-up" data-aos-delay="200">Nikmati perjalanan yang nyaman dan mewah dengan layanan kelas atas dari kami.</p>
            </div>
            <div class="col-lg-5" data-aos="fade-up" data-aos-delay="300">
              <a class="hero-btn" href="/bookingpage">
                Book Now!
            </a>
            </div>
          </div>
        </div>
  
    </section><!-- /Hero Section -->

    <!-- Services Section -->
    <section id="services" class="services section">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
          <h2>Services</h2>
          <p>Nikmati perjalanan yang nyaman dan menyenangkan dengan layanan kami.</p>
        </div><!-- End Section Title -->
  
        <div class="container">
  
          <div class="row gy-4">
  
            <div class="col-lg-6 " data-aos="fade-up" data-aos-delay="100">
              <div class="service-item d-flex">
                <div class="icon flex-shrink-0"><i class="bi bi-card-checklist"></i></div>
                <div>
                  <h4 class="title">Fasilitas Lengkap</h4>
                  <p class="description">LED TV, karaoke, AC, Charger Plug, dan bantal untuk kenyamanan perjalanan.</p>
                </div>
              </div>
            </div>
            <!-- End Service Item -->
  
            <div class="col-lg-6 " data-aos="fade-up" data-aos-delay="200">
              <div class="service-item d-flex">
                <div class="icon flex-shrink-0"><i class="bi bi-stars"></i></div>
                <div>
                  <h4 class="title">Kebersihan dan Kenyamanan</h4>
                  <p class="description">Prioritas kami adalah menjaga kebersihan kendaraan agar Anda merasa nyaman.</p>
                </div>
              </div>
            </div><!-- End Service Item -->
  
            <div class="col-lg-6 " data-aos="fade-up" data-aos-delay="300">
              <div class="service-item d-flex">
                <div class="icon flex-shrink-0"><i class="bi bi-people-fill"></i></div>
                <div>
                  <h4 class="title">Pengemudi Berpengalaman</h4>
                  <p class="description">Pengemudi kami terlatih dan amanah.</p>
                </div>
              </div>
            </div><!-- End Service Item -->
  
            <div class="col-lg-6 " data-aos="fade-up" data-aos-delay="400">
              <div class="service-item d-flex">
                <div class="icon flex-shrink-0"><i class="bi bi-tools"></i></div>
                <div>
                  <h4 class="title">Perawatan Kendaraan Berkala</h4>
                  <p class="description">Tim mekanik siaga 24 jam memastikan armada selalu siap jalan.</p>
                </div>
              </div>
            </div><!-- End Service Item -->
  
          </div>
  
        </div>
  
      </section><!-- /Services Section -->

    <!-- Features Section -->
    <section id="features" class="features section">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
          <h2>Pilihan Bus Kami</h2>
          <p>Jelajahi berbagai pilihan bus kami yang nyaman dan andal untuk memenuhi kebutuhan perjalanan Anda.</p>
        </div><!-- End Section Title -->
  
        <div class="container">
  
          <div class="row gy-4 align-items-stretch justify-content-between features-item ">
            <div class="col-lg-6 d-flex align-items-center features-img-bg" data-aos="zoom-out">
              <img src="{{ asset('/penyewatemplate') }}/assets/img/baru/hw08-yudhistira.png" class="img-fluid" alt="">
            </div>
            <div class="col-lg-5 d-flex justify-content-center flex-column" data-aos="fade-up">
              <h3>BIG BUS Seat 46 2-2 Toilet</h3>
              <p>Capacity 46 Seat, Konf 2 - 2, Toilet, Full AC, Smoking Room, Reclining Seat, Arm rest, Leg rest (Optional), Water Dispenser, TV, Radio, Karaoke, Charging port (Not Suitable for Powerbank), Bantal/Selimut, Extra Luggage, Emergency Door, APAR Ready, Glass Breaker, Ambient Light.</p>
            </div>
          </div><!-- Features Item -->

          <div class="row gy-4 align-items-stretch justify-content-between features-item ">
            <div class="col-lg-5 d-flex justify-content-center flex-column" data-aos="fade-up">
              <h3>BIG BUS Seat 59 2-3 Non Toilet</h3>
              <p>Capacity 59 Seat, Konf 2 - 3, Non Toilet, Full AC, Reclining Seat, TV, Radio, Karaoke, Charging port (Not Suitable for Powerbank), Bantal/Selimut, Extra Luggage, Emergency Door, APAR Ready, Glass Breaker, Ambient Light.</p>
            </div>
            <div class="col-lg-6 d-flex align-items-center features-img-bg" data-aos="zoom-out">
                <img src="{{ asset('/penyewatemplate') }}/assets/img/baru/hw19-satrio-piningit.png" class="img-fluid" alt="">
              </div>
          </div><!-- Features Item -->

          <div class="row gy-4 align-items-stretch justify-content-between features-item ">
            <div class="col-lg-6 d-flex align-items-center features-img-bg" data-aos="zoom-out">
              <img src="{{ asset('/penyewatemplate') }}/assets/img/baru/hw17-rengganis.png" class="img-fluid" alt="">
            </div>
            <div class="col-lg-5 d-flex justify-content-center flex-column" data-aos="fade-up">
              <h3>BIG BUS Seat 50 2-2 Non Toilet</h3>
              <p>Capacity 50 Seat, Konf 2 - 2, NON Toilet, Full AC, Reclining Seat, Arm rest, Leg rest (Optional), Water Dispenser, TV, Radio, Karaoke, Charging port (Not Suitable for Powerbank), Bantal/Selimut, Extra Luggage, Emergency Door, P3K, APAR Ready, Glass Breaker, Ambient Light.</p>
            </div>
          </div><!-- Features Item -->

          <div class="row gy-4 align-items-stretch justify-content-between features-item ">
            <div class="col-lg-5 d-flex justify-content-center flex-column" data-aos="fade-up">
              <h3>Medium Bus Seat 35/39 2-2</h3>
              <p>Capacity 35/39 Seat, Konf 2 - 2, Non Toilet, Full AC, Reclining Seat, Arm rest, Leg rest (Optional), TV, Radio, Karaoke, Charging port (Not Suitable for Powerbank), Bantal/Selimut, Extra Luggage, Emergency Door, APAR Ready, Glass Breaker, Ambient Light.</p>
            </div>
            <div class="col-lg-6 d-flex align-items-center features-img-bg" data-aos="zoom-out">
                <img src="{{ asset('/penyewatemplate') }}/assets/img/baru/md06.png" class="img-fluid" alt="">
              </div>
          </div><!-- Features Item -->
  
        </div>
  
    </section><!-- /Features Section -->

    <section id="recent-posts" class="recent-posts section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2><a href="">Kantor Cabang</a></h2>
        <p>Kunjungi kantor cabang kami yang tersebar di berbagai lokasi untuk mendapatkan informasi lengkap terkait pemesanan bus pariwisata.</p>
      </div><!-- End Section Title -->

      <div class="container">
          
        <div class="row gy-4">
          @forelse ($kantorcabangs as $kantorcabang)
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
          
          @empty
              <p class="text-center">Belum ada data kantor cabang</p>
          @endforelse
        </div><!-- End recent posts list -->
        
      </div>

    </section><!-- /Recent Posts Section -->

    <!-- Recent Posts Section -->
    <section id="recent-posts" class="recent-posts section">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
          <h2>Destinasi Populer</h2>
          <p>Temukan destinasi populer di seluruh dunia dengan layanan kami dan nikmati pengalaman liburan yang tak terlupakan.</p>
        </div><!-- End Section Title -->
  
        <div class="container">
  
          <div class="row gy-4">
  
            <div class="col-xl-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
              <article>
  
                <div class="post-img">
                  <img src="https://images.unsplash.com/photo-1537996194471-e657df975ab4?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTV8fGJhbGl8ZW58MHx8MHx8fDA%3D" alt="" class="img-fluid">
                </div>
  
                <h2 class="title">
                  <a href="#">Bali</a>
                </h2>

                <p class="post-category">Pura Ulun Danu Bedugul.</p>
  
              </article>
            </div><!-- End post list item -->
  
            <div class="col-xl-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
              <article>
  
                <div class="post-img">
                  <img src="https://images.unsplash.com/photo-1628488321763-eb2f79b7f3b5?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8NDh8fHByYW1iYW5hbiUyMHRlbXBsZXxlbnwwfHwwfHx8MA%3D%3D" alt="" class="img-fluid">
                </div>
  
                <h2 class="title">
                  <a href="#">Yogyakarta</a>
                </h2>

                <p class="post-category">Candi Prambanan.</p>
  
              </article>
            </div><!-- End post list item -->
  
            <div class="col-xl-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
              <article>
  
                <div class="post-img">
                  <img src="https://i.pinimg.com/564x/21/1a/fb/211afbaa2a8c57b83a3576db148591fc.jpg" alt="" class="img-fluid">
                </div>
  
                <h2 class="title">
                  <a href="#">Malang</a>
                </h2>

                <p class="post-category">Bromo-Tengger-Semeru National Park.</p>

  
              </article>
            </div><!-- End post list item -->
  
          </div><!-- End recent posts list -->
  
        </div>
  
    </section><!-- /Recent Posts Section -->

    <!-- Call To Action Section -->
    <section id="call-to-action" class="call-to-action section dark-background">

        <img src="{{ asset('/penyewatemplate') }}/assets/img/baru/hr-hero.jpeg" alt="">
  
        <div class="container">
          <div class="row justify-content-center" data-aos="zoom-in" data-aos-delay="100">
            <div class="col-xl-10">
              <div class="text-center">
                <h3>Sewa Bus Kami Sekarang!</h3>
                <p>Sewa bus pariwisata kami sekarang dan nikmati perjalanan tanpa khawatir. Hubungi kami untuk penawaran terbaik.</p>
                <a class="cta-btn" href="/bookingpage">Book Now!</a>
              </div>
            </div>
          </div>
        </div>
  
      </section><!-- /Call To Action Section -->
@endsection
