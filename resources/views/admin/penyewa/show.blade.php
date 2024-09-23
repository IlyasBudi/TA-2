@extends('admin.layouts.app')

@section('title', 'Penyewa')

@section('header')
    <div class="pagetitle">
        <h1>Data Penyewa</h1>
        <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/admin/dashboard">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="/admin/penyewa">Penyewa</a></li>
            <li class="breadcrumb-item active">Data Penyewa</li>
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
                        <h5 class="card-title">Data Penyewa {{ $penyewa->name }}</h5>
                        <!-- Table with stripped rows -->
                        <table class="table">
                            <tbody>
                                <tr>
                                    <th>Nama</th>
                                    <td>{{ $penyewa->name }}</td>
                                </tr>
                                <tr>
                                    <th>Email</th>
                                    <td>{{ $penyewa->email }}</td>
                                </tr>
                                <tr>
                                    <th>Phone Number</th>
                                    <td>{{ $penyewa->phone_number }}</td>
                                </tr>
                                <tr>
                                    <th>Alamat Lengkap</th>
                                    <td>{{ $penyewa->address }}</td>
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
