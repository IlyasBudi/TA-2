@extends('staff.layouts.app')

@section('title', 'Laporan')

@section('header')
    <div class="pagetitle">
        <h1>Laporan Penyewaan</h1>
        <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/staff/dashboard">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="/staff/laporan">Laporan</a></li>
            <li class="breadcrumb-item active">Laporan Penyewaan</li>
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
                        <h5 class="card-title">Data Laporan Penyewaan</h5>
                        <form action="" method="get">
                            @csrf
                            <table class="table table-borderless">
                                <tbody>
                                    <tr>
                                        <th>
                                            <label for="start_date" class="form-label">Tanggal Awal</label>
                                        </th>
                                        <td>
                                            <input type="date" name="start_date" required class="form-control">
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            <label for="end_date">Tanggal Akhir</label>
                                        </th>
                                        <td>
                                            <input type="date" name="end_date" required class="form-control">
                                        </td>
                                    </tr>
                                    <tr>
                                        <th></th>
                                        <td>
                                            <button type="submit" class="btn btn-md btn-primary">Buat
                                                Laporan</button>
                                            <button id="downloadPdfBtn" class="btn btn-md btn-success" disabled>Unduh
                                                Laporan
                                                PDF</button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </form>

                        <!-- Table with stripped rows -->
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">No.</th>
                                    <th scope="col">Tanggal</th>
                                    <th scope="col">Total</th>
                                </tr>
                            </thead>
                            <tbody class="bodyLaporan">

                            </tbody>
                            <tfoot id="footerTable" style="display: none;">
                                <tr>
                                    <td colspan="2"><strong>Total Pendapatan:</strong></td>
                                    <td id="totalPendapatan"><strong>Rp0</strong></td>
                                </tr>
                            </tfoot>
                        </table>
                        <!-- End Table with stripped rows -->
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection