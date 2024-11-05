@extends('penyewa.layouts.app')

@section('title', 'Profile')

@section('content')

    <!-- Page Title -->
    <div class="page-title" data-aos="fade">
        <div class="heading">
          <div class="container">
            <div class="row d-flex justify-content-center text-center">
              <div class="col-lg-10">
                <h1 class="pb-3">Profile</h1>

                {{-- <div class="card"> --}}
                    <div class="card col-lg-12 ps-lg-5 card-profile" data-aos="fade-up" data-aos-delay="200">
                        @method('put')
                        @csrf
                        <div class="d-flex justify-content-between align-items-center">
                            <h3 class="card-title fs-2 mt-3">{{ $profile->name }}</h3>
                            <a href="/profile/{{ Auth::user()->id }}/edit" class="p-2 rounded shadow-sm">
                                <svg xmlns="http://www.w3.org/2000/svg" height="20" width="20"
                                    viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                    <path
                                        d="M471.6 21.7c-21.9-21.9-57.3-21.9-79.2 0L362.3 51.7l97.9 97.9 30.1-30.1c21.9-21.9 21.9-57.3 0-79.2L471.6 21.7zm-299.2 220c-6.1 6.1-10.8 13.6-13.5 21.9l-29.6 88.8c-2.9 8.6-.6 18.1 5.8 24.6s15.9 8.7 24.6 5.8l88.8-29.6c8.2-2.7 15.7-7.4 21.9-13.5L437.7 172.3 339.7 74.3 172.4 241.7zM96 64C43 64 0 107 0 160V416c0 53 43 96 96 96H352c53 0 96-43 96-96V320c0-17.7-14.3-32-32-32s-32 14.3-32 32v96c0 17.7-14.3 32-32 32H96c-17.7 0-32-14.3-32-32V160c0-17.7 14.3-32 32-32h96c17.7 0 32-14.3 32-32s-14.3-32-32-32H96z" />
                                </svg>
                            </a>
                        </div>
                        {{-- <div class="meta">
                            <p class="mb-0">email</p>
                            <p class="mb-0">phone number</p>
                        </div> --}}
                        <div class="mt-5 text-start">
                            {{-- <h5 class="mb-3">Alamat</h5> --}}
                            <table class="table table-hover">
                                <tbody>
                                    <tr>
                                        <th>Email</th>
                                        <td>{{ $profile->email }}</td>
                                    </tr>
                                    <tr>
                                        <th>Nomor Telepon</th>
                                        <td>{{ $profile->phone_number }}</td>
                                    </tr>
                                    <tr>
                                        <th>Alamat Lengkap</th>
                                        <td>{{ $profile->address }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <hr>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="tab-pane fade show active p-3  id="one" role="tabpanel" aria-labelledby="one-tab">
                                {{-- @if ($profile->transactions->isNotEmpty()) --}}
                                    <h5>Transaksi</h5>
                                    <p class="card-text">Daftar semua transaksi yang pernah kamu lakukan</p>
                                    {{-- @foreach ($profile->transactions as $transaction) --}}
                                        <div class="my-3 p-4 rounded shadow">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div>
                                                    <p class="fw-bold mb-0"></p>
                                                    <p class="mb-0"></p>
                                                </div>
                                                <p class="mb-0 bg-dark px-2 py-1 rounded badge">
                                                    Lunas</p>
                                            </div>
                                            <hr>
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div>
                                                    <p class="mb-0 meta">Total Belanja:</p>
                                                    <p class="fw-bold mb-0">Rp</p>
                                                </div>
                                                <a href="/profile/transaction/"
                                                    class="btn btn-sm btn-primary">Detail Transaksi</a>
                                            </div>
                                        </div>
                                    {{-- @endforeach --}}
                                {{-- @else --}}
                                    <!-- <p class="text-center">Kamu belum memiliki transaksi</p> -->
                                {{-- @endif --}}
                            </div>
                        </div>
                    </div>
                {{-- </div> --}}

              </div>
            </div>
          </div>
        </div>
       
    </div><!-- End Page Title -->
  
    
@endsection