<?php

namespace App\Http\Controllers;

use App\Models\KantorCabang;
use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Barryvdh\DomPDF\Facade\Pdf;

class LaporanController extends Controller
{
    //
    public function index()
    {
        return view('staff.laporan.index');
    }

    public function getData(Request $request)
    {
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');
        $staff_id = Auth::user()->id;
        $kantorcabang_id = KantorCabang::where('staff_id', $staff_id)->pluck('id')->first();

        // Validasi Tanggal
        if ($startDate > $endDate) {
            return response()->json(['error' => 'Tanggal awal tidak boleh lebih besar dari tanggal akhir'], 400);
        }

        // Generate a list of all dates within the specified range
        $dateRange = Carbon::parse($startDate)->toPeriod($endDate)->toArray();

        // Get transactions within the specified range
        $laporanSewa = Transaction::whereBetween('created_at', [$startDate, $endDate])
            ->whereIn('kantor_cabang_id', [$kantorcabang_id])
            ->where('transaction_status', 'lunas')
            ->with('kantorcabang')
            ->get();

        // Group transactions by formatted date
        $groupedTransactions = $laporanSewa->groupBy(function ($transaction) {
            return Carbon::parse($transaction->created_at)->isoFormat('D MMMM YYYY');
        });

        // Initialize an empty array to store merged data
        $mergedData = [];

        // Iterate through the date range
        foreach ($dateRange as $date) {
            $formattedDate = Carbon::parse($date)->isoFormat('D MMMM YYYY');
            $transactions = $groupedTransactions[$formattedDate] ?? collect();

            // Check if transactions exist for the date
            if ($transactions->isNotEmpty()) {
                $total = $transactions->sum('total_price');

                $mergedData[] = [
                    'date' => $formattedDate,
                    'total' => $total,
                    'transactions' => $transactions
                ];
            }
        }

        return response()->json($mergedData);
    }

    public function exportPdf(Request $request)
    {
        $staff_id = Auth::user()->id;
        $kantorcabang = KantorCabang::where('staff_id', $staff_id)->get();
        $laporanSewa = $this->getData($request)->original;
        $pdf = PDF::loadView('staff.laporan.pdf', ['laporanSewa' => $laporanSewa, 'kantorcabangs' => $kantorcabang]);
        return $pdf->stream('laporan_sewa.pdf');
    }
}
