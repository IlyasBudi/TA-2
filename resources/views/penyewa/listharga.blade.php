@extends('penyewa.layouts.app')

@section('title', 'Daftar Harga')

@section('content')
<!-- Page Title -->
<div class="page-title" data-aos="fade">
        <div class="heading">
          <div class="container">
            <div class="row d-flex justify-content-center text-center">
              <div class="col-lg-12">
                <h1 class="pb-3">Daftar Harga</h1>
                <!-- <p class="mb-0">Kami telah meringkas daftar harga sewa untuk mempermudah kamu dalam mengumpulkan informasi.</p> -->

                {{-- <div class="card"> --}}
                    <div class="card col-lg-12 ps-lg-5 card-profile" data-aos="fade-up" data-aos-delay="200">
                        <div class="d-flex justify-content-between align-items-center">
                            <h3 class="card-title fs-2 mt-3">Kantor Cabang Tangerang</h3>
                        </div>
                        <div class="mt-5 text-start">
                            {{-- <h5 class="mb-3">Alamat</h5> --}}
                            <table class="table datatable">
                            <thead>
                                <tr>
                                    {{-- <th scope="col">#</th> --}}
                                    <th scope="col">Tujuan</th>
                                    <th scope="col">Big Bus Seat 46 konf 2-2</th>
                                    <th scope="col">Big Bus Seat 50 konf 2-2</th>
                                    <th scope="col">Big Bus Seat 59 konf 2-3</th>
                                    <th scope="col">Medium Bus Seat 35 konf 2-2</th>
                                    <th scope="col">Micro Bus Elf Seat 18</th>
                                    <th scope="col">Micro Bus Hiace Seat 14</th>
                                    <th scope="col">Minimal Sewa</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                                    <tr>
                                        <td>Jakarta / Ancol / TMII</td>
                                        <td>Rp. 3.200.000</td>
                                        <td>Rp. 3.200.000</td>
                                        <td>Rp. 3.200.000</td>
                                        <td>Rp. 2.700.000</td>
                                        <td>Rp. 2.400.000</td>
                                        <td>Rp. 2.400.000</td>
                                        <td>1 hari</td>
                                    </tr>

                                    <tr>
                                        <td>Bogor / Puncak</td>
                                        <td>Rp. 4.000.000</td>
                                        <td>Rp. 4.000.000</td>
                                        <td>Rp. 4.000.000</td>
                                        <td>Rp. 3.500.000</td>
                                        <td>Rp. 3.200.000</td>
                                        <td>Rp. 3.200.000</td>
                                        <td>1 hari</td>
                                    </tr>

                                    <tr>
                                        <td>P. Carita / P. Anyer</td>
                                        <td>Rp. 5.000.000</td>
                                        <td>Rp. 5.000.000</td>
                                        <td>Rp. 5.000.000</td>
                                        <td>Rp. 4.500.000</td>
                                        <td>Rp. 4.200.000</td>
                                        <td>Rp. 4.200.000</td>
                                        <td>1 hari</td>
                                    </tr>

                                    <tr>
                                        <td>Bandung / Ciater</td>
                                        <td>Rp. 5.200.000</td>
                                        <td>Rp. 5.200.000</td>
                                        <td>Rp. 5.200.000</td>
                                        <td>Rp. 4.700.000</td>
                                        <td>Rp. 4.400.000</td>
                                        <td>Rp. 4.400.000</td>
                                        <td>1 hari</td>
                                    </tr>

                                    <tr>
                                        <td>Pangandaran</td>
                                        <td>Rp. 9.500.000</td>
                                        <td>Rp. 9.500.000</td>
                                        <td>Rp. 9.500.000</td>
                                        <td>Rp. 7.500.000</td>
                                        <td>Rp. 7.200.000</td>
                                        <td>Rp. 7.200.000</td>
                                        <td>2 hari</td>
                                    </tr>
                                    
                                    <tr>
                                        <td>Pelabuhan Ratu / Tanjung Lesung</td>
                                        <td>Rp. 7.000.000</td>
                                        <td>Rp. 7.000.000</td>
                                        <td>Rp. 7.000.000</td>
                                        <td>Rp. 6.000.000</td>
                                        <td>Rp. 5.400.000</td>
                                        <td>Rp. 5.400.000</td>
                                        <td>2 hari</td>
                                    </tr>

                                    <tr>
                                        <td>Garut / Tasik</td>
                                        <td>Rp. 7.500.000</td>
                                        <td>Rp. 7.500.000</td>
                                        <td>Rp. 7.500.000</td>
                                        <td>Rp. 6.500.000</td>
                                        <td>Rp. 5.900.000</td>
                                        <td>Rp. 5.900.000</td>
                                        <td>2 hari</td>
                                    </tr>

                                    <tr>
                                        <td>Tegal / Guci</td>
                                        <td>Rp. 9.000.000</td>
                                        <td>Rp. 9.000.000</td>
                                        <td>Rp. 9.000.000</td>
                                        <td>Rp. 8.000.000</td>
                                        <td>Rp. 7.400.000</td>
                                        <td>Rp. 7.400.000</td>
                                        <td>2 hari</td>
                                    </tr>

                                    <tr>
                                        <td>Cilacap / Purwokerto / Dieng</td>
                                        <td>Rp. 10.000.000</td>
                                        <td>Rp. 10.000.000</td>
                                        <td>Rp. 10.000.000</td>
                                        <td>Rp. 9.000.000</td>
                                        <td>Rp. 8.400.000</td>
                                        <td>Rp. 8.400.000</td>
                                        <td>2 hari</td>
                                    </tr>

                                    <tr>
                                        <td>Semarang</td>
                                        <td>Rp. 12.000.000</td>
                                        <td>Rp. 12.000.000</td>
                                        <td>Rp. 12.000.000</td>
                                        <td>Rp. 10.500.000</td>
                                        <td>Rp. 9.600.000</td>
                                        <td>Rp. 9.600.000</td>
                                        <td>2 hari</td>
                                    </tr>

                                    <tr>
                                        <td>Semarang</td>
                                        <td>Rp. 12.000.000</td>
                                        <td>Rp. 12.000.000</td>
                                        <td>Rp. 12.000.000</td>
                                        <td>Rp. 10.500.000</td>
                                        <td>Rp. 9.600.000</td>
                                        <td>Rp. 9.600.000</td>
                                        <td>3 hari</td>
                                    </tr>

                                    <tr>
                                        <td>Jogja / Solo</td>
                                        <td>Rp. 15.000.000</td>
                                        <td>Rp. 15.000.000</td>
                                        <td>Rp. 15.000.000</td>
                                        <td>Rp. 13.500.000</td>
                                        <td>Rp. 12.600.000</td>
                                        <td>Rp. 12.600.000</td>
                                        <td>3 hari</td>
                                    </tr>

                                    <tr>
                                        <td>Surabaya / Madura</td>
                                        <td>Rp. 17.000.000</td>
                                        <td>Rp. 17.000.000</td>
                                        <td>Rp. 17.000.000</td>
                                        <td>Rp. 15.000.000</td>
                                        <td>Rp. 13.800.000</td>
                                        <td>Rp. 13.800.000</td>
                                        <td>4 hari</td>
                                    </tr>

                                    <tr>
                                        <td>Malang / Batu</td>
                                        <td>Rp. 18.000.000</td>
                                        <td>Rp. 18.000.000</td>
                                        <td>Rp. 18.000.000</td>
                                        <td>Rp. 16.000.000</td>
                                        <td>Rp. 14.800.000</td>
                                        <td>Rp. 14.800.000</td>
                                        <td>4 hari</td>
                                    </tr>

                                    <tr>
                                        <td>Bali</td>
                                        <td>Rp. 24.000.000</td>
                                        <td>Rp. 24.000.000</td>
                                        <td>Rp. 24.000.000</td>
                                        <td>Rp. 20.500.000</td>
                                        <td>Rp. 18.400.000</td>
                                        <td>Rp. 18.400.000</td>
                                        <td>7 hari</td>
                                    </tr>

                                    <tr>
                                        <td>Lampung</td>
                                        <td>Rp. 9.000.000</td>
                                        <td>Rp. 9.000.000</td>
                                        <td>Rp. 9.000.000</td>
                                        <td>Rp. 7.500.000</td>
                                        <td>Rp. 6.600.000</td>
                                        <td>Rp. 6.600.000</td>
                                        <td>3 hari</td>
                                    </tr>

                                    <tr>
                                        <td>Palembang</td>
                                        <td>Rp. 12.000.000</td>
                                        <td>Rp. 12.000.000</td>
                                        <td>Rp. 12.000.000</td>
                                        <td>Rp. 10.500.000</td>
                                        <td>Rp. 9.600.000</td>
                                        <td>Rp. 9.600.000</td>
                                        <td>3 hari</td>
                                    </tr>
                                
                            </tbody>
                        </table>
                        </div>
                    </div>

                    <div class="mt-3 card col-lg-12 ps-lg-5 card-profile" data-aos="fade-up" data-aos-delay="200">
                        <div class="d-flex justify-content-between align-items-center">
                            <h3 class="card-title fs-2 mt-3">Kantor Cabang Tangerang Selatan</h3>
                        </div>
                        <div class="mt-5 text-start">
                            {{-- <h5 class="mb-3">Alamat</h5> --}}
                            <table class="table datatable">
                            <thead>
                                <tr>
                                    {{-- <th scope="col">#</th> --}}
                                    <th scope="col">Tujuan</th>
                                    <th scope="col">Big Bus Seat 46 konf 2-2</th>
                                    <th scope="col">Big Bus Seat 50 konf 2-2</th>
                                    <th scope="col">Big Bus Seat 59 konf 2-3</th>
                                    <th scope="col">Medium Bus Seat 35 konf 2-2</th>
                                    <th scope="col">Micro Bus Elf Seat 18</th>
                                    <th scope="col">Micro Bus Hiace Seat 14</th>
                                    <th scope="col">Minimal Sewa</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                                    <tr>
                                        <td>Jakarta / Ancol / TMII</td>
                                        <td>Rp. 3.200.000</td>
                                        <td>Rp. 3.200.000</td>
                                        <td>Rp. 3.200.000</td>
                                        <td>Rp. 2.700.000</td>
                                        <td>Rp. 2.400.000</td>
                                        <td>Rp. 2.400.000</td>
                                        <td>1 hari</td>
                                    </tr>

                                    <tr>
                                        <td>Bogor / Puncak</td>
                                        <td>Rp. 4.000.000</td>
                                        <td>Rp. 4.000.000</td>
                                        <td>Rp. 4.000.000</td>
                                        <td>Rp. 3.500.000</td>
                                        <td>Rp. 3.200.000</td>
                                        <td>Rp. 3.200.000</td>
                                        <td>1 hari</td>
                                    </tr>

                                    <tr>
                                        <td>P. Carita / P. Anyer</td>
                                        <td>Rp. 5.000.000</td>
                                        <td>Rp. 5.000.000</td>
                                        <td>Rp. 5.000.000</td>
                                        <td>Rp. 4.500.000</td>
                                        <td>Rp. 4.200.000</td>
                                        <td>Rp. 4.200.000</td>
                                        <td>1 hari</td>
                                    </tr>

                                    <tr>
                                        <td>Bandung / Ciater</td>
                                        <td>Rp. 5.200.000</td>
                                        <td>Rp. 5.200.000</td>
                                        <td>Rp. 5.200.000</td>
                                        <td>Rp. 4.700.000</td>
                                        <td>Rp. 4.400.000</td>
                                        <td>Rp. 4.400.000</td>
                                        <td>1 hari</td>
                                    </tr>

                                    <tr>
                                        <td>Pangandaran</td>
                                        <td>Rp. 9.500.000</td>
                                        <td>Rp. 9.500.000</td>
                                        <td>Rp. 9.500.000</td>
                                        <td>Rp. 7.500.000</td>
                                        <td>Rp. 7.200.000</td>
                                        <td>Rp. 7.200.000</td>
                                        <td>2 hari</td>
                                    </tr>
                                    
                                    <tr>
                                        <td>Pelabuhan Ratu / Tanjung Lesung</td>
                                        <td>Rp. 7.000.000</td>
                                        <td>Rp. 7.000.000</td>
                                        <td>Rp. 7.000.000</td>
                                        <td>Rp. 6.000.000</td>
                                        <td>Rp. 5.400.000</td>
                                        <td>Rp. 5.400.000</td>
                                        <td>2 hari</td>
                                    </tr>

                                    <tr>
                                        <td>Garut / Tasik</td>
                                        <td>Rp. 7.500.000</td>
                                        <td>Rp. 7.500.000</td>
                                        <td>Rp. 7.500.000</td>
                                        <td>Rp. 6.500.000</td>
                                        <td>Rp. 5.900.000</td>
                                        <td>Rp. 5.900.000</td>
                                        <td>2 hari</td>
                                    </tr>

                                    <tr>
                                        <td>Tegal / Guci</td>
                                        <td>Rp. 9.000.000</td>
                                        <td>Rp. 9.000.000</td>
                                        <td>Rp. 9.000.000</td>
                                        <td>Rp. 8.000.000</td>
                                        <td>Rp. 7.400.000</td>
                                        <td>Rp. 7.400.000</td>
                                        <td>2 hari</td>
                                    </tr>

                                    <tr>
                                        <td>Cilacap / Purwokerto / Dieng</td>
                                        <td>Rp. 10.000.000</td>
                                        <td>Rp. 10.000.000</td>
                                        <td>Rp. 10.000.000</td>
                                        <td>Rp. 9.000.000</td>
                                        <td>Rp. 8.400.000</td>
                                        <td>Rp. 8.400.000</td>
                                        <td>2 hari</td>
                                    </tr>

                                    <tr>
                                        <td>Semarang</td>
                                        <td>Rp. 12.000.000</td>
                                        <td>Rp. 12.000.000</td>
                                        <td>Rp. 12.000.000</td>
                                        <td>Rp. 10.500.000</td>
                                        <td>Rp. 9.600.000</td>
                                        <td>Rp. 9.600.000</td>
                                        <td>2 hari</td>
                                    </tr>

                                    <tr>
                                        <td>Semarang</td>
                                        <td>Rp. 12.000.000</td>
                                        <td>Rp. 12.000.000</td>
                                        <td>Rp. 12.000.000</td>
                                        <td>Rp. 10.500.000</td>
                                        <td>Rp. 9.600.000</td>
                                        <td>Rp. 9.600.000</td>
                                        <td>3 hari</td>
                                    </tr>

                                    <tr>
                                        <td>Jogja / Solo</td>
                                        <td>Rp. 15.000.000</td>
                                        <td>Rp. 15.000.000</td>
                                        <td>Rp. 15.000.000</td>
                                        <td>Rp. 13.500.000</td>
                                        <td>Rp. 12.600.000</td>
                                        <td>Rp. 12.600.000</td>
                                        <td>3 hari</td>
                                    </tr>

                                    <tr>
                                        <td>Surabaya / Madura</td>
                                        <td>Rp. 17.000.000</td>
                                        <td>Rp. 17.000.000</td>
                                        <td>Rp. 17.000.000</td>
                                        <td>Rp. 15.000.000</td>
                                        <td>Rp. 13.800.000</td>
                                        <td>Rp. 13.800.000</td>
                                        <td>4 hari</td>
                                    </tr>

                                    <tr>
                                        <td>Malang / Batu</td>
                                        <td>Rp. 18.000.000</td>
                                        <td>Rp. 18.000.000</td>
                                        <td>Rp. 18.000.000</td>
                                        <td>Rp. 16.000.000</td>
                                        <td>Rp. 14.800.000</td>
                                        <td>Rp. 14.800.000</td>
                                        <td>4 hari</td>
                                    </tr>

                                    <tr>
                                        <td>Bali</td>
                                        <td>Rp. 24.000.000</td>
                                        <td>Rp. 24.000.000</td>
                                        <td>Rp. 24.000.000</td>
                                        <td>Rp. 20.500.000</td>
                                        <td>Rp. 18.400.000</td>
                                        <td>Rp. 18.400.000</td>
                                        <td>7 hari</td>
                                    </tr>

                                    <tr>
                                        <td>Lampung</td>
                                        <td>Rp. 9.000.000</td>
                                        <td>Rp. 9.000.000</td>
                                        <td>Rp. 9.000.000</td>
                                        <td>Rp. 7.500.000</td>
                                        <td>Rp. 6.600.000</td>
                                        <td>Rp. 6.600.000</td>
                                        <td>3 hari</td>
                                    </tr>

                                    <tr>
                                        <td>Palembang</td>
                                        <td>Rp. 12.000.000</td>
                                        <td>Rp. 12.000.000</td>
                                        <td>Rp. 12.000.000</td>
                                        <td>Rp. 10.500.000</td>
                                        <td>Rp. 9.600.000</td>
                                        <td>Rp. 9.600.000</td>
                                        <td>3 hari</td>
                                    </tr>
                                
                            </tbody>
                        </table>
                        </div>
                    </div>
                
              </div>
            </div>
          </div>
        </div>
       
    </div><!-- End Page Title -->
@endsection