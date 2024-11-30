<?php

namespace App\Http\Controllers;

use App\Models\Bus;
use App\Models\Destination;
use App\Models\DetailTransaction;
use App\Models\KantorCabang;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PenyewaController extends Controller
{
    public function landingpage()
    {
        $kantorcabangs = KantorCabang::all();
        return view("penyewa.landingpage", ["kantorcabangs" => $kantorcabangs]);
    }

    public function about()
    {
        $kantorcabangs = KantorCabang::all();
        return view("penyewa.about", ["kantorcabangs" => $kantorcabangs]);
    }

    public function detailKantorCabang($id)
    {
        // $bus = bus::all();
        $kantorcabang = KantorCabang::with('bus','destination' , 'staff')->findOrFail($id);
        return view('penyewa.detailkantorcabang', ['kantorcabang' => $kantorcabang]);
    }

    // public function payment($id)
    // {
    //     $user_id = Auth::id();

    //     $transaction = Transaction::where('user_id', $user_id)
    //     ->latest()
    //     ->first();

    //     return view('penyewa.payment', ['transaction' => $transaction]);
    // }

    public function destroy(string $id)
    {
        Transaction::destroy($id);
        DetailTransaction::where('transaction_id', $id)->delete();
        return redirect('/bookingpage');
    }

}
