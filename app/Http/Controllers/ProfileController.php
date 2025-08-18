<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules;
use Barryvdh\DomPDF\Facade\Pdf;

class ProfileController extends Controller
{
    public function profile()
    {
        $profile = User::with(['transaction' => function ($query) {
            $query->with('detailtransaction')->orderBy('created_at', 'desc');
        }])->findOrFail(Auth::user()->id);

        return view('penyewa.profile.index', compact("profile"));
    }

    public function editProfile()
    {
        $user = User::findOrfail(Auth::user()->id);

        return view("penyewa.profile.edit", compact("user"));
    }

    public function updateProfile(Request $request, $id)
    {
        // Mendapatkan data user
        $user = User::findOrFail($id);

        // Validasi data yang diterima dari formulir
        $validated = $request->validate([
            'name' => ['string', 'max:100'],
            'email' => ['string', 'max:100', 'email', Rule::unique('users')->ignore($id)],
            // 'password' => ['confirmed', \Illuminate\Validation\Rules\Password::defaults()],
            'phone_number' => ['string'],
            'address' => ['string', 'max:65535'],
        ]);

        try {
            // Update data pada database berdasarkan id
            $user->update([
                'name' => $validated['name'],
                'email' => $validated['email'],
                'phone_number' => $validated['phone_number'],
                'address' => $validated['address'],
            ]);

            // Notifikasi session jika berhasil
            return redirect()->back()->with('success', 'Profile Berhasil Diubah!');
        } catch (\Exception $e) {
            // Notifikasi session jika gagal
            return redirect()->back()->with('error', 'Gagal mengubah profile. Silakan coba lagi.');
        }
    }

    public function detailTransaction(Transaction $transaction)
    {
        $details = $transaction->detailtransaction()->with('bus', 'destination')->get();
        return view("penyewa.profile.detailtransaction", compact("transaction", "details"));
    }

    public function exportPdf(Transaction $transaction)
        {
            $details = $transaction->detailtransaction()->with('bus', 'destination')->get();
            $pdf = PDF::loadView('penyewa.profile.pdf', compact('transaction', 'details'));
            return $pdf->stream('invoice_sewa.pdf');
        }

    public function changePassword(Request $request, $id)
    {
        // Mendapatkan data user
        $user = User::findOrFail($id);

        // Pastikan user hanya bisa mengubah password miliknya sendiri
        if (Auth::user()->id != $user->id) {
            return redirect()->back()->with('error', 'Unauthorized access.');
        }

        // Validasi data yang diterima dari formulir
        $validated = $request->validate([
            'current_password' => ['required'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        // Verifikasi password lama
        if (!Hash::check($validated['current_password'], $user->password)) {
            return redirect()->back()->withErrors(['current_password' => 'Password lama tidak sesuai.']);
        }

        try {
            // Update password baru
            $user->update([
                'password' => Hash::make($validated['password']),
            ]);

            // Notifikasi session jika berhasil
            return redirect()->back()->with('success', 'Password berhasil diubah!');
        } catch (\Exception $e) {
            // Notifikasi session jika gagal
            return redirect()->back()->with('error', 'Gagal mengubah password. Silakan coba lagi.');
        }
    }
}
