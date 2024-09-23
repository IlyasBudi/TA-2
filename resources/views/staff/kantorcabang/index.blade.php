@extends('staff.layouts.app')

@section('title', 'Kantor Cabang')

@section('header')
    <div class="pagetitle">
        <h1>Data Kantor Cabang</h1>
        <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/staff/dashboard">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="/staff/kantorcabang">Kantor Cabang</a></li>
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
                        <h5 class="card-title">Data Kantor Cabang</h5>
                        @if ($kantorcabangs->isEmpty())
                            <a type="button" class="btn btn-primary m-2" href="/staff/kantorcabang/add"><i
                                    class="bi bi-plus-square-fill"></i> Tambah Kantor Cabang</a>
                        @else
                            <a type="button" class="btn btn-primary m-2 disabled " href="/penjual/warung/add"><i
                                    class="bi bi-plus-square-fill"></i> Tambah Kantor Cabang</a>
                        @endif
                        <!-- Table with stripped rows -->
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    {{-- <th scope="col">#</th> --}}
                                    <th scope="col">Nama</th>
                                    <th scope="col">Gambar</th>
                                    <th scope="col">Alamat</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($kantorcabangs as $kantorcabang)
                                    <tr>
                                        {{-- <th scope="row">{{ $loop->iteration }}</th> --}}
                                        <td>{{ $kantorcabang->name }}</td>
                                        <td><img src="{{ Storage::url($kantorcabang->image) }}" alt=""
                                                style="height:40px; width:60px; object-fit: cover;">
                                        </td>
                                        <td>{{ $kantorcabang->address }}</td>
                                        <td><a href="/staff/kantorcabang/{{ $kantorcabang->id }}/edit" class="btn btn-warning"><i
                                                    class="bi bi-pencil-fill text-white"></i></a>
                                            | <a href="/staff/kantorcabang/{{ $kantorcabang->id }}" class="btn btn-primary"><i
                                                    class="bi bi-eye-fill text-white"></i></a>
                                            | <a href="/staff/kantorcabang/{{ $kantorcabang->id }}/delete" class="btn btn-danger"><i
                                                    class="bi bi-trash3-fill text-white"></i></a>
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
