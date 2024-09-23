@extends('staff.layouts.app')

@section('title', 'Destinasi')

@section('header')
    <div class="pagetitle">
        <h1>Data Destinasi</h1>
        <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/staff/dashboard">dashboard</a></li>
            <li class="breadcrumb-item"><a href="/staff/destination">Destination</a></li>
            <li class="breadcrumb-item active">Tambah Destinasi</li>
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
                        <h5 class="card-title">Tambah Destinasi</h5>

                        @if ($errors->has('error'))
                            <div class="alert alert-danger">
                                {{ $errors->first('error') }}
                            </div>
                        @endif

                        <!-- General Form Elements -->
                        <form action="{{ route('destination.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row mb-3">
                                <label for="name" class="col-sm-2 col-form-label">Nama Destinasi</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                                        name="name">
                                </div>
                                @error('name')
                                    <div class="invalid-feedback">
                                        Nama tidak boleh kosong
                                    </div>
                                @enderror
                            </div>
                            {{-- <div class="row mb-3">
                                <label for="description" class="col-sm-2 col-form-label">Deskripsi Destinasi</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control @error('description') is-invalid @enderror" style="height: 100px" name="description"></textarea>
                                </div>
                                @error('description')
                                    <div class="invalid-feedback">
                                        Deskripsi tidak boleh kosong
                                    </div>
                                @enderror
                            </div> --}}
                            <div class="row mb-3">
                                <label for="price" class="col-sm-2 col-form-label">Harga Destinasi</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control @error('price') is-invalid @enderror"
                                        name="price">
                                </div>
                                @error('price')
                                    <div class="invalid-feedback">
                                        Alamat tidak boleh kosong
                                    </div>
                                @enderror
                            </div>
                            
                            {{-- <div class="row mb-3">
                                <label for="image" class="col-sm-2 col-form-label">Gambar Destinasi</label>
                                <div class="col-sm-10">
                                    <input class="form-control @error('image') is-invalid @enderror" type="file"
                                        name="image">
                                </div>
                            </div> --}}
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Submit Button</label>
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </div>
                            </div>
                        </form><!-- End General Form Elements -->
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection