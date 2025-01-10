@extends('admin.layouts.app')

@section('title', 'Pencairan Pendapatan Admin')

@section('header')
    <div class="pagetitle">
        <h1>Pencairan Pendapatan Kantor Cabang</h1>
        <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/admin/dashboard">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="/admin/pencairan">Pencairan Pendapatan</a></li>
            <li class="breadcrumb-item active">Pencairan Pendapatan Kantor Cabang</li>
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
                        <h5 class="card-title">Data Pendapatan Kantor Cabang Hari Ini</h5>
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                        @if (session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif
                        <!-- Table with stripped rows -->
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th scope="col">No.</th>
                                    <th scope="col">Nama Kantor Cabang</th>
                                    <!-- <th scope="col">Staff Kantor Cabang</th> -->
                                    <th scope="col">Pendapatan Hari Ini</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($kantorcabangs as $kantorcabang)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>{{ $kantorcabang->name }}</td>
                                        <!-- <td>{{ $kantorcabang->staff->name }}</td> -->
                                        <td>Rp{{ number_format($kantorcabang->total_pendapatan_hari_ini) }}</td>
                                        <td>
                                            <a id="btnCash" href="/admin/pencairan/{{ $kantorcabang->id }}/add"
                                                class="btn btn-success"><i class="bi bi-cash"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <!-- End Table with stripped rows -->
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">History Pencairan Pendapatan Kantor Cabang</h5>
                        <!-- Table with stripped rows -->
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th scope="col">No.</th>
                                    <th scope="col">Nama Kantor Cabang</th>
                                    <!-- <th scope="col">Staff Kantor Cabang</th> -->
                                    <th scope="col">Total</th>
                                    <th scope="col">Status Pencairan</th>
                                    <th scope="col">Tanggal Pencairan</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pencairans as $pencairan)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>{{ $pencairan->kantorcabang->name }}</td>
                                        
                                        <td>Rp{{ number_format($pencairan->total) }}</td>
                                        <td>{{ $pencairan->status }}</td>
                                        <td>{{ $pencairan->created_at }}</td>
                                        <td>
                                            <a href="/admin/pencairan/{{ $pencairan->id }}/edit" class="btn btn-warning"><i
                                                    class="bi bi-pencil-fill text-white"></i></a>
                                            |
                                            <a href="/admin/pencairan/{{ $pencairan->id }}" class="btn btn-primary"><i
                                                    class="bi bi-eye-fill text-white"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <!-- End Table with stripped rows -->
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection