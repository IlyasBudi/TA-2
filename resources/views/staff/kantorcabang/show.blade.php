@extends('staff.layouts.app')

@section('title', 'Kantor Cabang')

@section('header')
    <div class="pagetitle">
        <h1>Data Kantor Cabang</h1>
        <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/staff/dashboard">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="/staff/kantorcabang">Kantor Cabang</a></li>
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
                                    <td>{{ $warung->description }}</td>
                                </tr> --}}
                                <tr>
                                    <th>Lokasi Kantor Cabang (Longitude & Latitude)</th>
                                    <td>{{ $kantorcabang->longitude }} , {{ $kantorcabang->latitude }}</td>
                                </tr>
                                <tr>
                                    <th>Nomor Telepon</th>
                                    <td>{{ $kantorcabang->phone_number }}</td>
                                </tr>
                                <tr>
                                    <th>Alamat</th>
                                    <td>{{ $kantorcabang->address }}</td>
                                </tr>
                            </tbody>
                        </table>
                        <!-- End Table with stripped rows -->

                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection