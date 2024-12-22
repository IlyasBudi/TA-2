@extends('staff.layouts.app')

@section('title', 'Pencairan')

@section('header')
    <div class="pagetitle">
        <h1>Pencairan Pendapatan Kantor Cabang</h1>
        <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/staff/dashboard">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="/staff/pencairan">Pencairan Pendapatan</a></li>
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
                        <h5 class="card-title">Data Pencairan Pendapatan</h5>
                        <!-- Table with stripped rows -->
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nama Kantor Cabang</th>
                                    <th scope="col">Tanggal</th>
                                    <th scope="col">Total</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pencairans as $pencairan)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>{{ $pencairan->kantorcabang->name }}</td>
                                        <td>{{ $pencairan->created_at }}</td>
                                        <td>Rp{{ number_format($pencairan->total) }}</td>
                                        <td><a href="/staff/pencairan/{{ $pencairan->id }}" class="btn btn-primary"><i
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