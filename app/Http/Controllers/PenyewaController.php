<?php

namespace App\Http\Controllers;

use App\Models\bus;
use App\Models\Destination;
use App\Models\KantorCabang;
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

    

}
