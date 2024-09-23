@extends('staff.layouts.app')

@section('title', 'Bus')

@section('header')
    <div class="pagetitle">
        <h1>Data Bus</h1>
        <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/staff/dashboard">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="/staff/bus">Bus</a></li>
            <li class="breadcrumb-item active">Data Bus</li>
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
                        <h5 class="card-title">Data Bus {{ $bus->name }}</h5>
                        <!-- Table with stripped rows -->
                        <table class="table">
                            <tbody>
                                {{-- <tr>
                                    <th>Kode bus</th>
                                    <td>{{ $bus->code }}</td>
                                </tr> --}}
                                <tr>
                                    <th>Nama bus</th>
                                    <td>{{ $bus->name }}</td>
                                </tr>
                                <tr>
                                    <th>Category Bus</th>
                                    <td>{{ $bus->category_bus->name }}</td>
                                </tr>
                                <tr>
                                    <th>Gambar bus</th>
                                    <td><img src="{{ Storage::url($bus->image) }}" alt=""
                                            style="height:200px; width:220px; object-fit: cover;"></td>
                                </tr>
                                <tr>
                                    <th>Deskripsi</th>
                                    <td>{{ $bus->description }}</td>
                                </tr>
                                <tr>
                                    <th>Harga</th>
                                    <td>Rp{{ number_format($bus->price) }}</td>
                                </tr>
                                <tr>
                                    <th>Status</th>
                                    <td>{{ $bus->status }}</td>
                                </tr>
                                {{-- <tr>
                                    <th>Stok</th>
                                    <td>{{ $bus->stock }}</td>
                                </tr> --}}
                            </tbody>
                        </table>
                        <!-- End Table with stripped rows -->
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection