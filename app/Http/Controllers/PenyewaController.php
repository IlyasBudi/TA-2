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
        // $kantorcabangs = KantorCabang::all();
        $kantorcabangs = KantorCabang::latest()->take(6)->get();
        return view("penyewa.landingpage", ["kantorcabangs" => $kantorcabangs]);
    }

    public function about(Request $request)
    {
        // Ambil page size dari query (?per_page=), batasi agar wajar
        $perPage = (int) $request->get('per_page', 6);     // default 6 per halaman
        $perPage = max(3, min($perPage, 50));              // clamp 3–50

        // Jika butuh urutan tertentu, silakan ganti orderBy sesuai kebutuhan
        $kantorcabangs = KantorCabang::orderBy('created_at', 'asc')
            ->paginate($perPage)              // atau ->simplePaginate($perPage)
            ->withQueryString();              // pertahankan query string (per_page, filter, dll)

        return view('penyewa.about', compact('kantorcabangs'));
    }

    public function detailKantorCabang(Request $request, $id)
    {
        // ukuran halaman (boleh override via query string)
        $busPerPage  = max(1, (int) $request->get('bus_per_page', 10));
        $destPerPage = max(1, (int) $request->get('dest_per_page', 6));
        $staffPerPage= max(1, (int) $request->get('staff_per_page', 6));

        // ambil kantor cabang + hitung total item tiap relasi (opsional untuk badge)
        $kantorcabang = KantorCabang::query()
            ->findOrFail($id)
            ->loadCount(['bus', 'destination', 'staff']);

        // paginate tiap relasi (tidak bisa lewat with, harus query relasinya)
        $buses = $kantorcabang->bus()               // sesuaikan: ->with('tipe') dst kalau perlu
            ->latest('created_at')
            ->paginate($busPerPage, ['*'], 'bus_page')
            ->withQueryString();

        $destinations = $kantorcabang->destination() // sesuaikan eager lain kalau perlu
            ->latest('created_at')
            ->paginate($destPerPage, ['*'], 'dest_page')
            ->withQueryString();

        $staffs = $kantorcabang->staff()
            ->latest('created_at')
            ->paginate($staffPerPage, ['*'], 'staff_page')
            ->withQueryString();

        return view('penyewa.detailkantorcabang', compact(
            'kantorcabang', 'buses', 'destinations', 'staffs'
        ));
    }

    public function detailBus($id)
    {
        $bus = Bus::with('kantorcabang')->findOrFail($id);
        return view('penyewa.detailbus', ['bus' => $bus]);
    }

    // public function payment($id)
    // {
    //     $user_id = Auth::id();

    //     $transaction = Transaction::where('user_id', $user_id)
    //     ->latest()
    //     ->first();

    //     return view('penyewa.payment', ['transaction' => $transaction]);
    // }

    public function success()
    {
        return view('penyewa.success');
    }

    public function destroy(string $id)
    {
        Transaction::destroy($id);
        DetailTransaction::where('transaction_id', $id)->delete();
        return redirect('/bookingpage');
    }

    public function listHarga()
    {
        return view('penyewa.listharga');
    }

    public function maps()
    {
        $kantorcabangs = KantorCabang::all();
        return view('penyewa.map', ['kantorcabangs' => $kantorcabangs]);
    }

    public function getRoute($id)
    {
        // menampilkan rute berdasarkan lokasi yang dipilih
        $kantorcabangs = KantorCabang::where('id', $id)->first();
        return view('penyewa.route', ['kantorcabangs' => $kantorcabangs]);
    }

    public function kantorCabang()
    {
        $kantorcabangs = KantorCabang::all();
        return view('penyewa.listkantorcabang', ['kantorcabangs' => $kantorcabangs]);
    }

}
