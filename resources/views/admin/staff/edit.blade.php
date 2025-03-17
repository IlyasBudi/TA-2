@extends('admin.layouts.app')

@section('title', 'Staff')


@section('content')
    <div class="pagetitle">
        <h1>Edit Staff</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/admin/dashboard">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="/admin/staff">Staff</a></li>
                <li class="breadcrumb-item active">Edit Staff</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Edit Kantor Cabang</h5>

                        <!-- General Form Elements -->
                        <form action="/admin/staff/{{ $staff->id }}" method="POST" enctype="multipart/form-data">
                            @method('put')
                            @csrf
                            
                            <div class="row mb-3">
                                <label for="name" class="col-sm-2 col-form-label">Nama Staff</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                                        name="name" value="{{ $staff->name }}">
                                </div>
                                @error('name')
                                    <div class="invalid-feedback">
                                        Nama tidak boleh kosong
                                    </div>
                                @enderror
                            </div>
                            <div class="row mb-3">
                                <label for="email" class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control @error('email') is-invalid @enderror"
                                        name="email" value="{{ $staff->email }}">
                                </div>
                                @error('email')
                                    <div class="invalid-feedback">
                                        email tidak boleh kosong
                                    </div>
                                @enderror
                            </div>
                            <div class="row mb-3">
                                <label for="phone_number" class="col-sm-2 col-form-label">Nomor Telepon</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control @error('phone_number') is-invalid @enderror"
                                        name="phone_number" value="{{ $staff->phone_number }}">
                                </div>
                                @error('phone_number')
                                    <div class="invalid-feedback">
                                        Nomor Telepon tidak boleh kosong
                                    </div>
                                @enderror
                            </div>
                            <div class="row mb-3">
                                <label for="address" class="col-sm-2 col-form-label">Alamat Staff</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control @error('address') is-invalid @enderror"
                                        name="address" value="{{ $staff->address }}">
                                </div>
                                @error('address')
                                    <div class="invalid-feedback">
                                        Alamat tidak boleh kosong
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

