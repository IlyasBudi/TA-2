<?php

namespace App\Http\Controllers;

use App\Models\KantorCabang;
use App\Models\Pencairan;
use App\Models\Staff;
use App\Models\Transaction;
use App\Models\Bus;
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

            // Hitung jumlah bus yang dimiliki oleh kantor cabang
            $total_bus = Bus::where('kantor_cabang_id', $kantorcabang_id)->count();

            // Hitung jumlah transaksi hanya untuk hari ini
            $total_transaction = Transaction::where("kantor_cabang_id", $kantorcabang_id)
                ->where('transaction_status', 'lunas')
                ->whereDate('created_at', Carbon::today())
                ->count();
            
            // Hitung total pendapatan hanya untuk hari ini
            $total_pendapatan = Transaction::where("kantor_cabang_id", $kantorcabang_id)
                ->where('transaction_status', 'lunas')
                ->whereDate('created_at', Carbon::today())
                ->sum('total_price');

            return view("staff.dashboard", compact("total_bus", "total_transaction", "total_pendapatan"));
        } else {
            // Jika tidak memiliki kantor cabang, kembalikan ke halaman lain atau tampilkan pesan
            $total_bus = 0;
            $total_transaction = 0;
            $total_pendapatan = 0;

            return view("staff.dashboard", compact("total_bus", "total_transaction", "total_pendapatan"));
        }
    }


    public function staffProfile()
    {
        $profile = Staff::with(['kantorcabang'])->findOrFail(Auth::user()->id);

        return view("staff.profile.index", compact("profile"));
    }

    public function staffUpdate(Request $request, $id)
    {
        $staff = Staff::findOrFail($id);

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

            // notifikasi jika berhasil
            return redirect()->back()->with('success', 'Profile Berhasil Diubah!');
        } catch (\Exception $e) {
            // notifikasi jika gagal
            return redirect()->back()->with('error', 'Profile Gagal Diubah, Silahkan Coba Lagi!');
        }
    }

    public function pencairanStaff()
        {
            $staff_id = Auth::id();
            $kantorcabang = KantorCabang::where("staff_id", $staff_id)->first();
            $pencairans = Pencairan::where('kantor_cabang_id', 'rekening')->where('kantor_cabang_id', $kantorcabang->id)->get();

            return view('staff.pencairan.index', compact('pencairans'));
        }
    
    public function detailPencairanStaff(string $id)
    {
        $pencairan = Pencairan::with('kantor_cabang_id', 'rekening')->findOrFail($id);
        return view('admin.pencairan.show', compact('pencairan'));
    }
}
