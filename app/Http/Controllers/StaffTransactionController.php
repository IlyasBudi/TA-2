<?php

namespace App\Http\Controllers;

use App\Models\KantorCabang;
use App\Models\transaction;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StaffTransactionController extends Controller
{
    public function index()
    {
        $staff_id = Auth::id();

        $kantorcabang = KantorCabang::where('staff_id', $staff_id)->first();

        if ($kantorcabang) {
            $kantorcabang_id = $kantorcabang->id;
            $transactions = Transaction::where('kantor_cabang_id', $kantorcabang_id)->orderBy('created_at', 'desc')->get();

            return view("staff.transaction.index", compact("transactions"));
        } else {
            $transactions = [];
            return view("staff.transaction.index", compact("transactions"));
        }
    }

    public function destroy(string $id)
    {
        Transaction::destroy($id);
        return redirect('/staff/transaction');
    }

    public function show(string $id)
    {
        // $kantor_cabang = kantor_cabang::with('staff')->findOrFail($id);
        $transaction = Transaction::find($id);

        // Hitung jarak menggunakan rumus Haversine
        $distance = $this->haversineDistance($transaction->latitude, $transaction->longitude, $transaction->kantorCabang->latitude, $transaction->kantorCabang->longitude);

        return view('staff.transaction.show',['transaction' => $transaction, 'distance' => $distance]);
    }

    public function haversineDistance($lat1, $lon1, $lat2, $lon2) {
        $earthRadius = 6371;  // Earth's radius in kilometers
    
        // Convert degrees to radians
        $lat1 = deg2rad($lat1);
        $lon1 = deg2rad($lon1);
        $lat2 = deg2rad($lat2);
        $lon2 = deg2rad($lon2);
    
        // Haversine formula
        $dLat = $lat2 - $lat1;
        $dLon = $lon2 - $lon1;
    
        $a = sin($dLat / 2) * sin($dLat / 2) +
             cos($lat1) * cos($lat2) * 
             sin($dLon / 2) * sin($dLon / 2);
    
        $c = 2 * atan2(sqrt($a), sqrt(1 - $a));
    
        // Distance in kilometers
        $distance = $earthRadius * $c;
    
        return $distance;
    }
}
