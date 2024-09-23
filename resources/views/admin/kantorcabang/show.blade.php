@extends('admin.layouts.app')

@section('title', 'Kantor Cabang')

@section('header')
    <div class="pagetitle">
        <h1>Data Kantor Cabang</h1>
        <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/admin/dashboard">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="/admin/kantorcabang">Kantor Cabang</a></li>
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
                                    <td>{{ $kantorcabang->description }}</td>
                                </tr> --}}
                                <tr>
                                    <th>Lokasi Kantor Cabang (Longitude & Latitude)</th>
                                    <td>{{ $kantorcabang->longitude }}, {{ $kantorcabang->latitude }}</td>
                                </tr>
                                <tr>
                                    <th>Alamat</th>
                                    <td>{{ $kantorcabang->phone_number }}</td>
                                </tr>
                                <tr>
                                    <th>Alamat</th>
                                    <td>{{ $kantorcabang->address }}</td>
                                </tr>
                            </tbody>
                        </table>
                        <!-- End Table with stripped rows -->

                        <h5 class="card-title">Data Staff Kantor Cabang {{ $kantorcabang->name }}</h5>
                        <!-- Table with stripped rows -->
                        <table class="table table-hover">
                            <tbody>
                                <tr>
                                    <th>Nama Staff</th>
                                    <td>{{ $kantorcabang->staff->name }}</td>
                                </tr>
                                <tr>
                                    <th>Email Staff</th>
                                    <td>{{ $kantorcabang->staff->email }}</td>
                                </tr>
                                <tr>
                                    <th>Phone Number Staff</th>
                                    <td>{{ $kantorcabang->staff->phone_number }}</td>
                                </tr>
                                <tr>
                                    <th>Alamat Lengkap Staff</th>
                                    <td>{{ $kantorcabang->staff->address }}</td>
                                </tr>
                            </tbody>
                        </table>
                        <!-- End Table with stripped rows -->

                        <h5 class="card-title">Data Bus Kantor Cabang {{ $kantorcabang->name }}</h5>
                        <!-- Table with stripped rows -->
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    {{-- <th scope="col">Kode Bus</th> --}}
                                    <th scope="col">Nama Bus</th>
                                    <th scope="col">Category Seat</th>
                                    <th scope="col">Deskripsi</th>
                                    <th scope="col">Gambar Bus</th>
                                    <th scope="col">Harga</th>
                                    <th scope="col">status</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($kantorcabang->bus as $bus)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        {{-- <td>{{ $bus->code }}</td> --}}
                                        <td>{{ $bus->name }}</td>
                                        <td>{{ $bus->category_bus->name }}</td>
                                        <td>{{ $bus->description }}</td>
                                        <td>{{ $bus->price }}</td>
                                        <td><img src="{{ Storage::url($bus->image) }}" alt=""
                                                style="height:40px; width:60px; object-fit: cover;">
                                        </td>
                                        <td>{{ $bus->status }}</td>
                                        <td>
                                            
                                            <a href="/admin/kantorcabang/bus/{{ $bus->id }}" class="btn btn-primary"><i
                                                    class="bi bi-eye-fill text-white"></i></a>
                                            
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <h5 class="card-title">Data Destinasi Kantor Cabang {{ $kantorcabang->name }}</h5>
                        <!-- Table with stripped rows -->
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    {{-- <th scope="col">Kode Destinasi</th> --}}
                                    <th scope="col">Nama Destinasi</th>
                                    <th scope="col">Deskripsi</th>
                                    <th scope="col">Gambar Destinasi</th>
                                    <th scope="col">Harga</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($kantorcabang->destination as $destination)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        {{-- <td>{{ $bus->code }}</td> --}}
                                        <td>{{ $destination->name }}</td>
                                        <td>{{ $destination->description }}</td>
                                        <td>{{ $destination->price }}</td>
                                        <td><img src="{{ Storage::url($destination->image) }}" alt=""
                                                style="height:40px; width:60px; object-fit: cover;">
                                        </td>
                                        <td>
                                            
                                            <a href="/admin/kantorcabang/destination/{{ $destination->id }}" class="btn btn-primary"><i
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