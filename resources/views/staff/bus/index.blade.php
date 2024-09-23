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
                        <h5 class="card-title">Data Bus</h5>
                        <a type="button" class="btn btn-primary m-2" href="/staff/bus/add"><i
                                class="bi bi-plus-square-fill"></i> Tambah Bus</a>
                        <!-- Table with stripped rows -->
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    {{-- <th scope="col">Kode Bus</th> --}}
                                    <th scope="col">Nama Bus</th>
                                    <th scope="col">Category Bus</th>
                                    <th scope="col">Deskripsi</th>
                                    <th scope="col">Gambar Bus</th>
                                    <th scope="col">Harga</th>
                                    <th scope="col">status</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($bus as $bus)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        {{-- <td>{{ $bus->code }}</td> --}}
                                        <td>{{ $bus->name }}</td>
                                        <td>{{ $bus->category_bus->name }}</td>
                                        <td>{{ $bus->description }}</td>
                                        <td><img src="{{ Storage::url($bus->image) }}" alt=""
                                                style="height:40px; width:60px; object-fit: cover;">
                                        </td>
                                        <td>{{ $bus->price }}</td>
                                        <td>{{ $bus->status }}</td>
                                        <td><a href="/staff/bus/{{ $bus->id }}/edit" class="btn btn-warning"><i
                                                    class="bi bi-pencil-fill text-white"></i></a>
                                             <a href="/staff/bus/{{ $bus->id }}" class="btn btn-primary"><i
                                                    class="bi bi-eye-fill text-white"></i></a>
                                             <a href="/staff/bus/{{ $bus->id }}/delete"
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