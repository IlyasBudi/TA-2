@extends('staff.layouts.app')

@section('title', 'Destinasi')

@section('header')
    <div class="pagetitle">
        <h1>Data Destinasi</h1>
        <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/staff/dashboard">dashboard</a></li>
            <li class="breadcrumb-item"><a href="/staff/destination">Destinasi</a></li>
            <li class="breadcrumb-item active">Detail Destinasi</li>
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
                        <h5 class="card-title">Data Destinasi {{ $destination->name }}</h5>
                        <!-- Table with stripped rows -->
                        <table class="table">
                            <tbody>
                                {{-- <tr>
                                    <th>Kode Destinasi</th>
                                    <td>{{ $destination->code }}</td>
                                </tr> --}}
                                <tr>
                                    <th>Nama Destinasi</th>
                                    <td>{{ $destination->name }}</td>
                                </tr>
                                {{-- <tr>
                                    <th>Gambar Destinasi</th>
                                    <td><img src="{{ Storage::url($destination->image) }}" alt=""
                                            style="height:200px; width:220px; object-fit: cover;"></td>
                                </tr> --}}
                                {{-- <tr>
                                    <th>Deskripsi</th>
                                    <td>{{ $destination->description }}</td>
                                </tr> --}}
                                <tr>
                                    <th>Harga</th>
                                    <td>Rp{{ number_format($destination->price) }}</td>
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
