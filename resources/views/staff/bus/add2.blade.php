@extends('staff.layouts.app')

@section('title', 'Dashboard')

@section('header')
    <div class="pagetitle">
        <h1>Data Tables</h1>
        <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/staff/dashboard">dashboard</a></li>
            <li class="breadcrumb-item"><a href="/staff/bus">Bus</a></li>
            <li class="breadcrumb-item active">Tambah Bus</li>
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
                        <h5 class="card-title">Tambah Bus</h5>

                        <!-- General Form Elements -->
                        <form action="/staff/bus" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row mb-3">
                                <label for="name" class="col-sm-2 col-form-label">Nama Bus</label>
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
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Kategori Seat</label>
                                <div class="col-sm-10">
                                  <select class="form-select  @error('category_bus_id') is-invalid @enderror" aria-label="Default select example" name="category_bus_id" id='category_bus_id'>
                                    <option selected>Pilih Kategori</option>
                                    @foreach ($categorybus as $categorybus)
                                    <option value="{{ $categorybus->id }}">{{ $categorybus->name }}</option>
                                    @endforeach
                                  </select>
                                </div>
                              </div>
                            <div class="row mb-3">
                                <label for="description" class="col-sm-2 col-form-label">Deskripsi Bus</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control @error('description') is-invalid @enderror" style="height: 100px" name="description"></textarea>
                                </div>
                                @error('description')
                                    <div class="invalid-feedback">
                                        Deskripsi tidak boleh kosong
                                    </div>
                                @enderror
                            </div>
                            <div class="row mb-3">
                                <label for="price" class="col-sm-2 col-form-label">Harga Bus</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control @error('price') is-invalid @enderror"
                                        name="price">
                                </div>
                                @error('price')
                                    <div class="invalid-feedback">
                                        Harga Bus tidak boleh kosong
                                    </div>
                                @enderror
                            </div>
                            {{-- <div class="row mb-3">
                                <label for="stock" class="col-sm-2 col-form-label">Stok Produk</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control @error('stock') is-invalid @enderror"
                                        name="stock">
                                </div>
                                @error('stock')
                                    <div class="invalid-feedback">
                                        Alamat tidak boleh kosong
                                    </div>
                                @enderror
                            </div> --}}
                            <div class="row mb-3">
                                <label for="image" class="col-sm-2 col-form-label">Gambar Bus</label>
                                <div class="col-sm-10">
                                    <input class="form-control @error('image') is-invalid @enderror" type="file"
                                        name="image">
                                </div>
                            </div>
                            {{-- <div class="col-12">
                                <div class="form-check">
                                    <label class="form-check-label" for="invalidCheck2">
                                        Tersedia?
                                    </label>
                                    <input class="form-check-input  @error('is_ready') is-invalid @enderror" type="checkbox" value="1" id="invalidCheck2" name="is_ready" required>
                                </div>
                            </div> --}}
                            <div class="row mb-3">
                                <legend class="col-form-label col-sm-2 pt-0">Tersedia?</legend>
                                <div class="col-sm-10">
              
                                  <div class="form-check">
                                    <input class="form-check-input @error('is_ready') is-invalid @enderror" type="checkbox" id="gridCheck1" name='is_ready' checked>
                                    {{-- <label class="form-check-label" for="gridCheck1">
                                      Example checkbox
                                    </label> --}}
                                  </div>        
                                </div>
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