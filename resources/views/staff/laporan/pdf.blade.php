<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Laporan Sewa</title>

    <style>
        .styled-table {
            border-collapse: collapse;
            margin: 25px 0;
            font-size: 0.9em;
            font-family: 'Arial', sans-serif;
            min-width: 400px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
        }

        .styled-table thead tr {
            background-color: #009879;
            color: #ffffff;
            text-align: left;
        }

        .styled-table th,
        .styled-table td {
            padding: 12px 15px;
        }

        .styled-table tbody tr {
            border-bottom: 1px solid #dddddd;
        }

        .styled-table tbody tr:nth-of-type(even) {
            background-color: #f3f3f3;
        }

        .styled-table tbody tr:last-of-type {
            border-bottom: 2px solid #009879;
        }

        .styled-table tbody tr.active-row {
            font-weight: bold;
            color: #009879;
        }

        @media print {
            body {
                font-family: 'Arial', sans-serif;
                font-size: 12px;
            }

            .container {
                width: 100%;
                margin: 0 auto;
            }

            .header, .footer {
                text-align: center;
                padding: 10px;
            }

            .content {
                margin: 20px 0;
            }

            table {
                width: 100%;
                border-collapse: collapse;
            }

            table, th, td {
                border: 1px solid black;
            }

            th, td {
                padding: 10px;
                text-align: left;
            }

            /* Hide elements that should not be printed */
            .no-print {
                display: none;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col">
                @foreach ($kantorcabangs as $kantorcabang)
                    <h3 class="text-center mb-3">Data Laporan Sewa Kantor Cabang {{ $kantorcabang->name }}</h3>
                @endforeach
            </div>
        </div>
        <div class="row">
            <div class="col">
                @php
                    $total = 0; // Definisikan variabel total di sini
                @endphp
                <table class="styled-table">
                    <thead>
                        <tr>
                            <th scope="col">No.</th>
                            <th scope="col">Tanggal</th>
                            <th scope="col">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- @foreach ($laporanSewa as $index => $transaction)
                            @php
                                $total += $transaction->total;
                            @endphp
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $transaction->formatted_created_at }}</td>
                                <td>Rp{{ number_format($transaction->total) }}</td>
                            </tr>
                        @endforeach --}}
                        @foreach ($laporanSewa as $index => $data)
                            @php
                                $total += $data['total'];
                            @endphp
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $data['date'] }}</td>
                                <td>Rp{{ number_format($data['total']) }}</td>
                            </tr>
                        @endforeach

                        <tr class="active-row">
                            <th colspan="2">Total </th>
                            <th>Rp{{ number_format($total) }}</th>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>
