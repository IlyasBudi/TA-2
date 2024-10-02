<?php

namespace App\Http\Controllers;

use App\Models\transaction;
use App\Models\booking;
use App\Models\admin;
use App\Models\kantor_cabang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class TransactionController extends Controller
{
    public function transaction()
    {
        $transaction = transaction::with(['user', 'category_bus'])->get();

        return view('admin.transaction.index', compact('transaction'));
    }

    public function destroy(string $id)
    {
        transaction::destroy($id);
        return redirect('/admin/transaction');
    }

    public function show(string $id)
    {
        $transaction = transaction::with(['user', 'category_bus'])->findOrFail($id);

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
        $nearestBranches = kantor_cabang::selectRaw('id, name, address, phone_number, image, longitude, latitude, ( 6371 * acos( cos( radians(?) ) * cos( radians( latitude ) ) * cos( radians( longitude ) - radians(?) ) + sin( radians(?) ) * sin( radians( latitude ) ) ) ) AS distance', [$latitude, $longitude, $latitude])
        ->orderBy('distance')
        // ->with('bus') // Ambil data bus yang terkait
        ->get();

        return view('admin.transaction.show', ['transaction' => $transaction, 'nearestBranches' => $nearestBranches, 'jumlah_hari' => $jumlah_hari]);
    }

    
}
