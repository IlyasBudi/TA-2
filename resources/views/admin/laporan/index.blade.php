@extends('admin.layouts.app')

@section('title', 'Kantor Cabang')

@section('header')
    <div class="pagetitle">
        <h1>Laporan Kantor Cabang</h1>
        <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/admin/dashboard">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="/admin/laporan">Laporan Kantor Cabang</a></li>
            <li class="breadcrumb-item active">Laporan Kantor Cabang</li>
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
                        <h5 class="card-title">Data Laporan Penjualan</h5>
                        <form action="{{ route('laporan.getLaporanAdmin') }}" method="get">
                            @csrf
                            <table class="table table-borderless">
                                <tbody>
                                    <tr>
                                        <th>
                                            <label for="kantorcabang_id" class="form-label">Pilih Kantor Cabang</label>
                                        </th>
                                        <td>
                                            <select class="form-select" aria-label="Default select example"
                                                name="kantorcabang_id">
                                                <option selected>-- Pilih Kantor Cabang --</option>
                                                @foreach ($kantorcabangs as $kantorcabang)
                                                    <option value="{{ $kantorcabang->id }}">{{ $kantorcabang->name }}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                    </tr>
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
                            <tbody class="bodyLaporanAdmin">

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

@push('javascript')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    <script>
        $('form').submit(function(event) {
            event.preventDefault();

            // Periksa apakah kantorcabang_id sudah dipilih
            var selectedKantorCabang = $('select[name="kantorcabang_id"]').val();
            if (!selectedKantorCabang || selectedKantorCabang === '-- Pilih Kantor Cabang --') {
                alert('Harap pilih kantor cabang terlebih dahulu.');
                return; // Berhenti jika Kantorcabang_id belum dipilih
            }

            $.ajax({
                url: '{{ route('laporan.getLaporanAdmin') }}',
                type: 'GET',
                data: $('form').serialize(),
                success: function(response) {
                    // Hapus data lama dari tabel
                    $('table tbody.bodyLaporanAdmin').empty();

                    var totalPendapatan = 0; // Inisialisasi total pendapatan

                    // Iterasi melalui data dan tambahkan ke tabel
                    if (response.length > 0) {
                        $.each(response, function(index, data) {
                            var row = '<tr>' +
                                '<td>' + (index + 1) + '</td>' +
                                '<td>' + data.date + '</td>' +
                                '<td>' + 'Rp' + data.total + '</td>' +
                                '</tr>';

                            $('table tbody.bodyLaporanAdmin').append(row);

                            // Tambahkan total pendapatan dari setiap data
                            totalPendapatan += data.total;
                        });
                        $('#footerTable').show(); // tampilkan footer tabel
                    } else {
                        // Tampilkan pesan jika tidak ada data
                        var emptyRow =
                            '<tr><td colspan="3" class="text-center">Tidak ada data penjualan dalam rentang tanggal yang diminta</td></tr>';
                        $('table tbody.bodyLaporanAdmin').append(emptyRow);
                        $('#footerTable').hide(); // sembunyikan footer tabel
                    }

                    // Set total pendapatan ke dalam kolom total pendapatan pada tabel
                    $('#totalPendapatan').html('<strong>Rp' + totalPendapatan + '</strong>');
                },
                error: function(xhr, status, error) {
                    var errorMessage = 'Terjadi kesalahan. Silakan coba lagi.';

                    // Jika terdapat pesan kesalahan dalam respons server, gunakan pesan tersebut
                    if (xhr.responseJSON && xhr.responseJSON.error) {
                        errorMessage = xhr.responseJSON.error;
                    }

                    alert(errorMessage);
                }
            });
        });
    </script>
@endpush
