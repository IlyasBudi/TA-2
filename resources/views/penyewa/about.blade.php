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
                <p class="mb-0">Gambaran Umum PT Haryanto Motor Indonesia.</p>
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
            <h1>PT HARYANTO MOTOR INDONESIA</h1>
              <img src="{{ asset('/penyewatemplate') }}/assets/img/baru/logo-hr.svg" alt="" class="img-fluid services-img">
              <h3>Sejarah PO Haryanto</h3>
              <p>
                PO Haryanto didirikan pada tahun 2002 oleh H. Haryanto asal Kudus, Jawa Tengah setelah purna bertugas di Batalyon Artileri Pertahanan Udara Ringan 1/Kostrad TNI Angkatan Darat di Tangerang. Sebelumnya, ia adalah seorang tentara yang memiliki berbagai pekerjaan sampingan, salah satunya adalah agen tiket bus.

                    Dengan mendapatkan pinjaman dari bank, ia membeli enam buah bus dan menggunakan armadanya tersebut untuk trayek perkotaan dengan rute Cikarang-Cimone.
              </p>
              <p>
                Tetapi setelah beberapa waktu, rute tersebut dianggap kurang menguntungkan dikarenakan sepinya penumpang. Akhirnya ia mengubah armada tersebut menjadi kelas eksekutif dan mengalihkan trayeknya ke trayek antarkota dengan rute Jakarta-Kudus, Jakarta-Pati dan Jakarta-Jepara.
                Mulai saat itulah perusahaan busnya mulai berkembang. Pada tahun 2009, PO Haryanto melakukan ekspansi bisnis pertamanya di luar Muria Raya dan juga di luar Pulau Jawa, yakni di Pulau Madura dengan trayek Jakarta-Pamekasan-Sumenep.
              </p>
              <p>
                Tiga tahun kemudian tepatnya di tahun 2012, PO Haryanto kembali melakukan ekspansi bisnisnya, kali ini berada di jalur selatan jawa dengan trayek pertama yakni Jakarta-Solo-Ponorogo, serta kota-kota lain di sekitar Solo Raya seperti Klaten dan Gemolong.

                Di tahun yang sama pula, PO Haryanto juga merintis trayek menuju Bojonegoro dan Purwodadi dengan bantuan adiknya, H. Annas. Saat ini, PO Haryanto telah melayani lebih dari 20 kota di Pulau Jawa dengan beberapa divisi.
              </p>
              <h3>Ciri Khas PO Haryanto</h3>
              <p>
                PO Haryanto dikenal dengan penggunaan skema warna bodi bus yang beragam dan meriah, serta mengangkat potensi pariwisata Kudus. Masjid Menara Kudus menjadi ikon dari bus-bus Haryanto, ditempel pada bodi samping bus. Rian Mahendra selaku Direktur Operasional (pada waktu itu) mengatakan bahwa dalam menjalankan bisnisnya, Haryanto memanfaatkan filosofi "ilmu langit", maksudnya "nilai-nilai keagamaan Islam dijadikan acuan dalam berbisnis (bus)". Untuk mewujudkan misi korporatnya itu, kaligrafi sholawat "ṣalā-llāhu ʿala Muḥammad" ditempel di seluruh armada bus Haryanto.

                Sebagian armada (khususnya armada keluaran 2018 keatas) juga dilengkapi dengan gambar wayang kulit, biasanya bergambar Werkudara atau Rama dan Sinta.
              </p>
              <p>
                Selain ciri khas dalam armada, Haryanto juga memiliki ciri khas dalam pelayanan. Seperti peraturan untuk berhenti melaksanakan ibadah sholat (hanya khusus untuk yang Muslim) ketika dalam perjalanan, atau uang tiket konsumen yang dimana akan disumbangkan kepada yang membutuhkan sebesar 2,5 persen.

                Manajemen Haryanto juga memiliki tradisi untuk memberangkatkan para anak buahnya untuk melaksanakan haji/umrah yang masih tetap dipertahankan hingga sekarang.
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