<?php

namespace App\Http\Controllers;

use App\Models\kantor_cabang;
use App\Models\transaction;
use App\Models\booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StaffTransactionController extends Controller
{
    public function index()
    {
        $staff_id = Auth::id();

        $kantorcabang = kantor_cabang::where('staff_id', $staff_id)->first();

        if ($kantorcabang) {
            $kantorcabang_id = $kantorcabang->id;
            $transactions = transaction::where('kantor_cabang_id', $kantorcabang_id)->orderBy('created_at', 'desc')->get();

            return view("staff.transaction.index", compact("transactions"));
        } else {
            $transactions = [];
            return view("staff.transaction.index", compact("transactions"));
        }
    }

    public function destroy(string $id)
    {
        transaction::destroy($id);
        return redirect('/staff/transaction');
    }

    public function show(string $id)
    {
        // $kantor_cabang = kantor_cabang::with('staff')->findOrFail($id);
        $transaction = transaction::find($id);

        return view('staff.transaction.show',['transaction' => $transaction]);
    }
}
