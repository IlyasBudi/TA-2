@extends('staff.layouts.app')

@section('title', 'Destinasi')

@section('header')
    <div class="pagetitle">
        <h1>Data Destinasi</h1>
        <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/staff/dashboard">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="/staff/destination">Destination</a></li>
            <li class="breadcrumb-item active">Data Destinasi</li>
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
                        <h5 class="card-title">Data Destinasi</h5>
                        <a type="button" class="btn btn-primary m-2" href="/staff/destination/add"><i
                                class="bi bi-plus-square-fill"></i> Tambah Destinasi</a>
                        <!-- Table with stripped rows -->
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nama</th>
                                    {{-- <th scope="col">Deskripsi</th> --}}
                                    <th scope="col">Harga</th>
                                    {{-- <th scope="col">Gambar</th> --}}
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($destination as $destination)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        {{-- <td>{{ $bus->code }}</td> --}}
                                        <td>{{ $destination->name }}</td>
                                        {{-- <td>{{ $destination->description }}</td> --}}
                                        <td>{{ $destination->price }}</td>
                                        {{-- <td><img src="{{ Storage::url($destination->image) }}" alt=""
                                                style="height:40px; width:60px; object-fit: cover;">
                                        </td> --}}
                                        <td><a href="/staff/destination/{{ $destination->id }}/edit" class="btn btn-warning"><i
                                                    class="bi bi-pencil-fill text-white"></i></a>
                                             <a href="/staff/destination/{{ $destination->id }}" class="btn btn-primary"><i
                                                    class="bi bi-eye-fill text-white"></i></a>
                                             <a href="/staff/destination/{{ $destination->id }}/delete"
                                                class="btn btn-danger"><i class="bi bi-trash3-fill text-white"></i></a>
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