@extends('admin.layouts.app')

@section('title', 'Transaction')

@section('content')
    <div class="pagetitle">
        <h1>Data Transaksi</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/admin/dashboard">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="/admin/transaction">Transaksi</a></li>
                <li class="breadcrumb-item active">Data Transaksi</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Data Transaksi</h5>
                        <!-- Table with stripped rows -->
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Kode Transaksi</th>
                                    <th scope="col">Nama Penyewa</th>
                                    <th scope="col">Kategori Bus</th>
                                    <th scope="col">Tanggal Keberangkatan - Kepulangan</th>
                                    <th scope="col">Tanggal</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($transaction as $item)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>{{ $item->code }}</td>
                                        <td>{{ $item->user->name }}</td>
                                        <td>{{ $item->category_bus->name }}</td>
                                        <td>{{ $item->departure_date }}|{{ $item->arrival_date }}</td>
                                        <td>{{ $item->created_at }}</td>
                                        <td><a href="/admin/transaction/{{ $item->id }}"
                                                class="btn btn-primary"><i class="bi bi-eye-fill text-white"></i></a>
                                                {{-- | <a href="/admin/transaction/{{ $item->id }}/delete" class="btn btn-danger"><i
                                                    class="bi bi-trash3-fill text-white"></i></a> --}}
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
