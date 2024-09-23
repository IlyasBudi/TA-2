@extends('staff.layouts.app')

@section('title', 'Rekening')

@section('header')
    <div class="pagetitle">
        <h1>Data Rekening</h1>
        <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/staff/dashboard">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="/staff/rekening">Rekening</a></li>
            <li class="breadcrumb-item active">Data Rekening</li>
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
                        <h5 class="card-title">Edit Rekening</h5>
                        @if ($errors->has('error'))
                            <div class="alert alert-danger">
                                {{ $errors->first('error') }}
                            </div>
                        @endif

                        <!-- General Form Elements -->
                        <form action="/staff/rekening/{{ $rekening->id }}" method="POST" enctype="multipart/form-data">
                            @method('put')
                            @csrf
                            <div class="row mb-3">
                                <label for="name" class="col-sm-2 col-form-label">Pemilik Rekening</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                                        name="name" value="{{ $rekening->name }}">
                                </div>
                                @error('name')
                                    <div class="invalid-feedback">
                                        Nama tidak boleh kosong
                                    </div>
                                @enderror
                            </div>

                            <div class="row mb-3">
                                <label for="bank_name" class="col-sm-2 col-form-label">Nama Bank</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control @error('bank_name') is-invalid @enderror"
                                        name="bank_name" value="{{ $rekening->bank_name }}">
                                </div>
                                @error('bank_name')
                                    <div class="invalid-feedback">
                                        Nama bank tidak boleh kosong
                                    </div>
                                @enderror
                            </div>

                            <div class="row mb-3">
                                <label for="bank_number" class="col-sm-2 col-form-label">Nomor Rekening</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control @error('bank_number') is-invalid @enderror"
                                        name="bank_number" value="{{ $rekening->bank_number }}">
                                </div>
                                @error('bank_number')
                                    <div class="invalid-feedback">
                                        Nomor rekening tidak boleh kosong
                                    </div>
                                @enderror
                            </div>


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
