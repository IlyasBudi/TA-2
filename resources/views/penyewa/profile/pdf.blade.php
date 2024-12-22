<!DOCTYPE html>
<html xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" lang="en">
    <body style="font-family:Arial Unicode MS, Helvetica , Sans-Serif;">
        <table style="table-layout: fixed; width: 100%;">
            <tbody>
                <tr>
                    <td class="">
                        <div>
                            <img src="../public/penyewatemplate/assets/img/baru2/logo-xyz.svg" alt="Company Logo" style="max-width: 100%;">
                        </div>
                    </td>
                    <td width="15%">
                        
                    </td>
                    <td>    
                        <table class="tbl-padded">
                            <caption style="text-transform: uppercase; text-align: left; font-size: 30pt;">
                                <strong>
                                    Invoice
                                </strong>
                            </caption> 
                            <tbody>
                                <tr>
                                    <td style="padding:5px;">
                                        <strong >Invoice No.</strong>
                                    </td>
                                    <td style="padding:5px;">
                                        <div>
                                            {{ $transaction->code }}
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding:5px;">
                                        <strong >Tanggal</strong>                            
                                    </td>
                                    <td style="padding:5px;">
                                        {{ $transaction->created_at }}
                                    </td>
                                </tr>
                                <!-- <tr>
                                    <td style="padding:5px;">
                                        <strong >Due Date</strong>                            
                                    </td>
                                    <td style="padding:5px;">
                                        August 10, 2018
                                    </td>
                                </tr> -->
                                <!-- <tr>
                                    <td style="padding:5px;">
                                        <strong >Currency</strong>                                
                                    </td>
                                    <td style="padding:5px;">
                                        USD - US Dollar
                                    </td>
                                </tr> -->
                            </tbody>
                        </table>
                    </td>
                </tr>
            </tbody>
        </table>
        
        <div style="padding-top: 1cm; padding-bottom: 1cm;">
            <table style="table-layout: fixed; width: 100%;">
                <tbody>
                    <tr>
                        <td>
                            <div style="padding-bottom: 10px;">
                                <strong style="text-transform: uppercase;">Informasi Transaksi</strong>
                            </div>
                            <div>
                                <strong>PO XYZ Pariwisata</strong> <br>
                                Kantor Cabang {{ $transaction->kantorCabang->name }}<br>
                                {{ $transaction->kantorCabang->phone_number }}<br>
                                {{ $transaction->kantorCabang->address }}
                            </div>
                        </td>
                        <td width="15%">
                            
                        </td>
                        <td>
                            <div style="padding-bottom: 10px;">
                                <strong style="text-transform: uppercase;">Informasi Penyewa</strong>
                            </div>
                            <div>
                                {{ $transaction->user->name }} <br>
                                {{ $transaction->user->email }}<br>
                                {{ $transaction->user->phone_number }}<br>
                                {{ $transaction->user->address }}
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
       
        <div>
            <table style="table-layout: fixed; width: 100%;">
                <!-- <thead>
                    <tr>
                        <th  width="40%" align="left" style="border-top: 1px solid #eee; padding: 5px;">
                            Item / Description
                        </th>
                        <th align="center" style="border-top: 1px solid #eee; padding: 5px;">
                            Qty / Hr
                        </th>
                        <th align="center" style="border-top: 1px solid #eee; padding: 5px;">
                            Unit Price
                        </th>
                        <th align="right" style="border-top: 1px solid #eee; padding: 5px;">
                            Amount
                        </th>
                    </tr>
                </thead> -->
                <tbody>
                    <tr>
                        <th  width="40%" align="left" style="border-top: 1px solid #eee; padding: 5px;">
                            Destinasi
                        </th>
                        <td align="left" style="border-top: 1px solid #eee; padding: 5px;">
                        {{ $transaction->destination->name }}
                        </td>
                    </tr>
                    <tr>
                        <th  width="40%" align="left" style="border-top: 1px solid #eee; padding: 5px;">
                            Category Bus
                        </th>
                        <td align="left" style="border-top: 1px solid #eee; padding: 5px;">
                        {{ $transaction->categoryBus->name }}
                        </td>
                    </tr>
                    <tr>
                        <th  width="40%" align="left" style="border-top: 1px solid #eee; padding: 5px;">
                            Bus
                        </th>
                        <td align="left" style="border-top: 1px solid #eee; padding: 5px;">
                        {{ $transaction->bus->name }}
                        </td>
                    </tr>
                    <tr>
                        <th  width="40%" align="left" style="border-top: 1px solid #eee; padding: 5px;">
                            Tanggal Keberangkatan
                        </th>
                        <td align="left" style="border-top: 1px solid #eee; padding: 5px;">
                        {{ date('d-m-Y', strtotime($transaction->departure_date)) }}
                        </td>
                    </tr>
                    <tr>
                        <th  width="40%" align="left" style="border-top: 1px solid #eee; padding: 5px;">
                            Tanggal Kepulangan
                        </th>
                        <td align="left" style="border-top: 1px solid #eee; padding: 5px;">
                        {{ date('d-m-Y', strtotime($transaction->return_date)) }}
                        </td>
                    </tr>
                    <tr>
                        <th  width="40%" align="left" style="border-top: 1px solid #eee; padding: 5px;">
                            Waktu Penjemputan
                        </th>
                        <td align="left" style="border-top: 1px solid #eee; padding: 5px;">
                        {{ date('H:i', strtotime($transaction->pickup_time)) }}
                        </td>
                    </tr>
                    
                </tbody>
            </table>
        </div>

        <div style="border-top: 1px solid #eee;">
            <table style="table-layout: fixed; width: 100%; border-collapse: collapse;">
                <tbody>
                    <tr>
                        @php
                          $subtotal = $transaction->total_price- $transaction->extra_charge;
                        @endphp
                        <td align="right" style="padding: 5px;">
                            Subtotal
                        </td>
                        <td align="right" width="20%" style="padding: 5px;">
                        Rp {{ number_format($subtotal) }} 
                        </td>
                    </tr>
                    <tr>
                        <td align="right" style="padding: 5px;">
                            + Biaya Tambahan   
                        </td>
                        <td align="right" width="20%" style="padding: 5px;">
                          Rp {{ number_format($transaction->extra_charge) }}  
                        </td>
                    </tr>
                    <tr>
                        <td align="right" style="border-top: 2px solid #eee; padding: 8px;">
                            <span style="font-size: 16pt;">
                                Total Harga        
                            </span>
                        </td>
                        <td align="right" width="20%" style="border-top: 2px solid #eee; padding: 8px;">
                            <strong style="font-size: 16pt;">
                              Rp {{ number_format($transaction->total_price) }}
                            </strong>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div>
            <div style="padding-top:1cm; padding-bottom: 1cm;">
                <div>
                    <strong>Note</strong>
                </div>
                <p style="font-size: 10pt; line-height: 14pt;">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris eget placerat turpis, in vehicula elit. Pellentesque id pharetra ligula, sit amet interdum erat. Integer id lectus pulvinar, maximus urna quis, accumsan lacus. Etiam ac quam magna. Fusce ex lectus, pretium id commodo sit amet, egestas mattis lectus. Vestibulum id libero fringilla magna tincidunt egestas. Nam lacinia sollicitudin ante sed auctor. Suspendisse potenti.
                </p>
            </div>
        </div>
</body>

</html>