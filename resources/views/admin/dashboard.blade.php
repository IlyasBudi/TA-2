@extends('admin.layouts.app')

@section('title', 'Dashboard')

@section('header')
    <div class="pagetitle">
        <h1>Dashboard</h1>
        <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item active">Dashboard</li>
        </ol>
        </nav>
    </div><!-- End Page Title -->
@endsection

@section('content')
    <section class='section dashboard'>
        <div class="row">
            <!-- Left side columns -->
            <div class="col-lg-12">
                <div class="row">
                    <!-- Sales Card -->
                <div class="col-xxl-6 col-xl-6 col-md-6">
                    <div class="card info-card sales-card">
                    <div class="card-body">
                        <h5 class="card-title">Penyewa</h5>
    
                        <div class="d-flex align-items-center">
                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                            <i class="bi bi-people"></i>
                        </div>
                        <div class="ps-3">
                            <h6>{{ $users }}</h6>
                            <span class="text-muted small pt-2 ps-1">Penyewa</span>
                        </div>
                        </div>
                    </div>
    
                    </div>
                </div><!-- End Sales Card -->
    
                <!-- Revenue Card -->
                <div class="col-xxl-4 col-md-6">
                    <div class="card info-card revenue-card">
                    <div class="card-body">
                        <h5 class="card-title">Staff</h5>
    
                        <div class="d-flex align-items-center">
                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                            <i class="bi bi-people"></i>
                        </div>
                        <div class="ps-3">
                            <h6>{{ $staff }}</h6>
                            <span class="text-muted small pt-2 ps-1">Staff</span>
    
                        </div>
                        </div>
                    </div>
    
                    </div>
                </div><!-- End Revenue Card -->

                <div class="col-xxl-6 col-xl-6 col-md-6">
                    <div class="card info-card sales-card">
                    <div class="card-body">
                        <h5 class="card-title">Kantor Cabang</h5>
    
                        <div class="d-flex align-items-center">
                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                            <i class="bi bi-building"></i>
                        </div>
                        <div class="ps-3">
                            <h6>{{ $kantorcabang }}</h6>
                            <span class="text-muted small pt-2 ps-1">Kantor Cabang</span>
                        </div>
                        </div>
                    </div>
    
                    </div>
                </div><!-- End Sales Card -->
    
                <!-- Revenue Card -->
                <div class="col-xxl-4 col-md-6">
                    <div class="card info-card revenue-card">
                    <div class="card-body">
                        <h5 class="card-title">Transaksi</h5>
    
                        <div class="d-flex align-items-center">
                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                            <i class="bi bi-cart"></i>
                        </div>
                        <div class="ps-3">
                            <h6>{{ $transaction }}</h6>
                            <span class="text-muted small pt-2 ps-1">Transaksi</span>
    
                        </div>
                        </div>
                    </div>
    
                    </div>
                </div><!-- End Revenue Card -->
    
                <!-- Customers Card -->
                <!-- <div class="col-xxl-4 col-xl-12">
    
                    <div class="card info-card customers-card">
    
                    <div class="filter">
                        <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                        <li class="dropdown-header text-start">
                            <h6>Filter</h6>
                        </li>
    
                        <li><a class="dropdown-item" href="#">Today</a></li>
                        <li><a class="dropdown-item" href="#">This Month</a></li>
                        <li><a class="dropdown-item" href="#">This Year</a></li>
                        </ul>
                    </div>
    
                    <div class="card-body">
                        <h5 class="card-title">Customers <span>| This Year</span></h5>
    
                        <div class="d-flex align-items-center">
                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                            <i class="bi bi-people"></i>
                        </div>
                        <div class="ps-3">
                            <h6>1244</h6>
                            <span class="text-danger small pt-1 fw-bold">12%</span> <span class="text-muted small pt-2 ps-1">decrease</span>
    
                        </div>
                        </div>
    
                    </div>
                    </div>
    
                </div>End Customers Card -->
                </div>
            </div>
        </div>
    </section>
@endsection