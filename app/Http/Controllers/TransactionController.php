<?php

namespace App\Http\Controllers;

use App\Models\KantorCabang;
use App\Models\Transaction;
use App\Models\Booking;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class TransactionController extends Controller
{
    public function transaction()
    {
        $transaction = Transaction::with(['user', 'categorybus'])->get();

        return view('admin.transaction.index', compact('transaction'));
    }

    public function destroy(string $id)
    {
        Transaction::destroy($id);
        return redirect('/admin/transaction');
    }

    public function show(string $id)
    {
        $transaction = Transaction::with(['user', 'categorybus'])->findOrFail($id);

        // Hitung jumlah hari antara departure_date dan return_date
        $departureDate = Carbon::parse($transaction->departure_date);
        $returnDate = Carbon::parse($transaction->return_date);
        $daysDifference = $departureDate->diffInDays($returnDate);
        $jumlah_hari = $daysDifference + 1;

        // $category_bus = $transaction->category_bus;
        $longitude = $transaction->longitude;
        $latitude = $transaction->latitude;

        // $nearestBranches = kantor_cabang::selectRaw('id, name, address, phone_number, image, longitude, latitude, ( 6371 * acos( cos( radians(?) ) * cos( radians( latitude ) ) * cos( radians( longitude ) - radians(?) ) + sin( radians(?) ) * sin( radians( latitude ) ) ) ) AS distance', [$latitude, $longitude, $latitude])
        //     ->orderBy('distance')
        //     ->get();

        // Hitung jarak menggunakan rumus Haversine dan urutkan berdasarkan jarak terdekat
        $nearestBranches = KantorCabang::selectRaw('id, name, address, phone_number, image, longitude, latitude, ( 6371 * acos( cos( radians(?) ) * cos( radians( latitude ) ) * cos( radians( longitude ) - radians(?) ) + sin( radians(?) ) * sin( radians( latitude ) ) ) ) AS distance', [$latitude, $longitude, $latitude])
        ->orderBy('distance')
        // ->with('bus') // Ambil data bus yang terkait
        ->get();

        // Hitung jarak menggunakan rumus Haversine
        $distance = $this->haversineDistance($transaction->latitude, $transaction->longitude, $transaction->kantorCabang->latitude, $transaction->kantorCabang->longitude);
        $roundedDistance = round($distance, 2);

        return view('admin.transaction.show', ['transaction' => $transaction, 'nearestBranches' => $nearestBranches, 'jumlah_hari' => $jumlah_hari, 'distance' => $distance]);
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
