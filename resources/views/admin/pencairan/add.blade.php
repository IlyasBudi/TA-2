@extends('admin.layouts.app')

@section('title', 'Tambah Data Pencairan')

@section('header')
    <div class="pagetitle">
        <h1>Pencairan Pendapatan Kantor Cabang</h1>
        <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/admin/dashboard">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="/admin/pencairan">Pencairan Pendapatan</a></li>
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
                        <h5 class="card-title">Tambah Data Pencairan Pendapatan Kantor Cabang {{ $kantorcabang->name }}</h5>
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <!-- General Form Elements -->
                        <form action="/admin/pencairan" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input class="form-control" name="status" type="hidden" value="Success">
                            <div class="row mb-3">
                                <label for="name" class="col-sm-2 col-form-label">Nama Kantor Cabang</label>
                                <div class="col-sm-10">
                                    <input class="form-control" name="kantor_cabang_id" type="hidden" value="{{ $kantorcabang->id }}">
                                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                                        value="{{ $kantorcabang->name }}" disabled>
                                </div>
                            </div>
                            <!-- <div class="row mb-3">
                                <label for="name" class="col-sm-2 col-form-label">Nama Staff Kantor Cabang</label>
                                <div class="col-sm-10">
                                    <input class="form-control" name="staff_id" type="hidden"
                                        value="{{ $kantorcabang->staff->id }}">
                                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                                        value="{{ $kantorcabang->staff->name }}" disabled>
                                </div>
                            </div> -->
                            <div class="row mb-3">
                                <label for="name" class="col-sm-2 col-form-label">Nama Bank</label>
                                <div class="col-sm-10">
                                    <input class="form-control" name="rekening_id" type="hidden"
                                        value="{{ $kantorcabang->staff->rekening->id }}">
                                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                                        value="{{ $kantorcabang->staff->rekening->bank_name }}" disabled>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="name" class="col-sm-2 col-form-label">Nomor Rekening</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                                        value="{{ $kantorcabang->staff->rekening->bank_number }}" disabled>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="name" class="col-sm-2 col-form-label">Nama Rekening</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                                        value="{{ $kantorcabang->staff->rekening->name }}" disabled>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="total" class="col-sm-2 col-form-label">Total Pendapatan Hari Ini</label>
                                <div class="col-sm-10">
                                    <input type="text" name="total"
                                        class="form-control @error('total') is-invalid @enderror"
                                        value="{{ $total_pendapatan_hari_ini }}">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="image" class="col-sm-2 col-form-label">Bukti Pencairan Pendapatan</label>
                                <div class="col-sm-10">
                                    <input class="form-control @error('image') is-invalid @enderror" type="file"
                                        name="image">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Submit Button</label>
                                <div class="col-sm-10">
                                    <button id="submitButton" type="submit" class="btn btn-primary">Simpan</button>
                                </div>
                            </div>

                        </form><!-- End General Form Elements -->
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

