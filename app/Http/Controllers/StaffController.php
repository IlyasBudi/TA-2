<?php

namespace App\Http\Controllers;

use App\Models\staff;
use App\Models\kantor_cabang;
use App\Models\detail_transaction;
use App\Models\transaction;
use App\Models\bus;
use App\Models\destination;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\validation\Rule;
use Carbon\Carbon;

class StaffController extends Controller
{

    public function dashboard()
    {
        // Mendapatkan penjual yang sedang login
        $staff = Auth::user();

        // Memeriksa apakah penjual memiliki kantor cabang
    if ($staff->kantorcabang) {
        // Jika memiliki kantor cabang, dapatkan kantorcabang_id
        $kantorcabang_id = $staff->kantorcabang->id;
        return view("staff.dashboard");
    } else {
        // Jika tidak memiliki kantor cabang, kembalikan ke halaman lain atau tampilkan pesan
        return redirect()->route('staff.dashboard')->with('error', 'Anda tidak memiliki kantor cabang.');
    }
    }


    public function staffProfile()
    {
        $profile = staff::with(['kantor_cabang'])->findOrFail(Auth::user()->id);

        return view("staff.profile.index", compact("profile"));
    }

    public function staffUpdate(Request $request, $id)
    {
        $staff = staff::findOrFail($id);

        $validated = $request->validate([
            'name' => ['string', 'max:100'],
            'email' => ['string', 'email', 'max:100', Rule::unique('staff')->ignore($id)],
            'phone_number' => ['string'],
            'address' => ['string', 'max:65535'],
        ]);

        try {
            $staff->update([
                'name' => $validated['name'],
                'email' => $validated['email'],
                'phone_number' => $validated['phone_number'],
                'address' => $validated['address'],
            ]);

            // notifikasi jima berhasil
            return redirect()->back()->with('success', 'Profile Berhasil Diubah!');
        } catch (\Exception $e) {
            // notifikasi jika gagal
            return redirect()->back()->with('error', 'Profile Gagal Diubah, Silahkan Coba Lagi!');
        }
    }
}
