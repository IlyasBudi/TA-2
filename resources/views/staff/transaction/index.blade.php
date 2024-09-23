@extends('staff.layouts.app')

@section('title', 'Transaction')

@section('header')
    <div class="pagetitle">
        <h1>Data Transaksi</h1>
        <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/staff/dashboard">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="/staff/transaction">Transaksi</a></li>
            <li class="breadcrumb-item active">Data Transaksi</li>
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
                        <h5 class="card-title">Data Transaksi</h5>
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
                                    <th scope="col">#</th>
                                    <th scope="col">Kode Transaksi</th>
                                    <th scope="col">Nama Penyewa</th>
                                    <th scope="col">Kategori Bus</th>
                                    <th scope="col">Destinasi</th>
                                    <th scope="col">Tanggal Berangkat - Tanggal Pulang</th>
                                    {{-- <th scope="col">Status Pembayaran</th> --}}
                                    {{-- <th scope="col">Tanggal</th> --}}
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($transactions as $transaction)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>{{ $transaction->code }}</td>
                                        <td>{{ $transaction->user->name }}</td>
                                        <td>{{ $transaction->category_bus->name }}</td>
                                        <td>{{ $transaction->destination->name }}</td>
                                        <td>{{ $transaction->departure_date }} - {{ $transaction->arrival_date }}</td>
                                        {{-- <td>{{ $transaction->transaction_status }}</td> --}}
                                        {{-- <td>{{ $transaction->created_at }}</td> --}}
                                        <td>
                                            {{-- <a href="/penjual/transaction/{{ $transaction->id }}/edit"
                                                class="btn btn-warning"><i class="bi bi-pencil-fill text-white"></i></a>
                                            | --}}
                                            <a href="/staff/transaction/{{ $transaction->id }}"
                                                class="btn btn-primary"><i class="bi bi-eye-fill text-white"></i></a>
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
