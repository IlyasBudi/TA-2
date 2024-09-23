@extends('admin.layouts.app')

@section('title', 'Penyewa')

@section('header')
    <div class="pagetitle">
        <h1>Data Staff</h1>
        <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/admin/dashboard">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="/admin/staff">Staff</a></li>
            <li class="breadcrumb-item active">Data Staff</li>
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
                        <h5 class="card-title">Data Staff {{ $staff->name }}</h5>
                        <!-- Table with stripped rows -->
                        <table class="table">
                            <tbody>
                                <tr>
                                    <th>Nama</th>
                                    <td>{{ $staff->name }}</td>
                                </tr>
                                <tr>
                                    <th>Email</th>
                                    <td>{{ $staff->email }}</td>
                                </tr>
                                <tr>
                                    <th>Phone Number</th>
                                    <td>{{ $staff->phone_number }}</td>
                                </tr>
                                {{-- <tr>
                                    <th>Provinsi</th>
                                    <td>{{ $staff->province->name }}</td>
                                </tr>
                                <tr>
                                    <th>Kabupaten Kota</th>
                                    <td>{{ $staff->regency->name }}</td>
                                </tr> --}}
                                <tr>
                                    <th>Alamat Lengkap</th>
                                    <td>{{ $staff->address }}</td>
                                </tr>
                            </tbody>
                        </table>
                        <!-- End Table with stripped rows -->

                        <h5 class="card-title">Kantor Cabang</h5>
                        <!-- Table with stripped rows -->
                        <table class="table table-hover">
                            <tbody>
                                @if ($staff->kantor_cabang)
                                    <tr>
                                        <th>Nama Kantor Cabang</th>
                                        <td>{{ $staff->kantor_cabang->name }}</td>
                                    </tr>
                                    <tr>
                                        <th>Gambar Kantor Cabang</th>
                                        <td><img src="{{ Storage::url($staff->kantor_cabang->image) }}" alt=""
                                                style="height:200px; width:250px; object-fit: cover;"></td>
                                    </tr>
                                    {{-- <tr>
                                        <th>Deskripsi Kantor Cabang</th>
                                        <td>{{ $staff->kantor_cabang->description }}</td>
                                    </tr> --}}
                                    <tr>
                                        <th>Lokasi Kantor Cabang (Lang, Lat)</th>
                                        <td>{{ $staff->kantor_cabang->location }}</td>
                                    </tr>
                                    <tr>
                                        <th>Alamat Lengkap Kantor Cabang</th>
                                        <td>{{ $staff->kantor_cabang->phone_number }}</td>
                                    </tr>
                                    <tr>
                                        <th>Alamat Lengkap Kantor Cabang</th>
                                        <td>{{ $staff->kantor_cabang->address }}</td>
                                    </tr>
                                @else
                                    <tr>
                                        <td colspan="2">staff belum membuat kantor cabang.</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                        <!-- End Table with stripped rows -->

                        <h5 class="card-title">Rekening Kantor Cabang {{ $staff->kantor_cabang->name }}</h5>
                        <!-- Table with stripped rows -->
                        <table class="table table-hover">
                            <tbody>
                                @if ($staff->rekening)
                                    <tr>
                                        <th>Pemilik Rekening</th>
                                        <td>{{ $staff->rekening->name }}</td>
                                    </tr>
                                    <tr>
                                        <th>Nama Bank</th>
                                        <td>{{ $staff->rekening->bank_name }}</td>
                                    </tr>
                                    <tr>
                                        <th>Nomor Rekening</th>
                                        <td>{{ $staff->rekening->bank_number }}</td>
                                    </tr>
                                @else
                                    <tr>
                                        <td colspan="2">Staff belum memasukan data rekening.</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                        <!-- End Table with stripped rows -->
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
