<?php

namespace App\Http\Controllers;

use App\Models\staff;
use App\Models\bus;
use App\Models\destination;
use App\Models\user;
use App\Models\kantor_cabang;
use App\Models\transaction;
use App\Models\detail_transaction;
use App\Models\booking;
use Illuminate\Http\Request;
use Illuminate\support\Facades\Storage;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view("admin.dashbaord");
    }

    // Staff
    public function staff()
    {
        $staff = staff::orderBy("created_at", "desc")->get();
        return view("admin.staff.index", compact("staff"));
    }

    public function showStaff($id)
    {
        $staff = staff::with(['kantor_cabang', 'rekening'])->findOrFail($id);
        return view("admin.staff.show", compact("staff"));
    }

    // Penyewa
    public function penyewa()
    {
        $penyewas = User::orderBy("created_at", "desc")->get();
        return view("admin.penyewa.index", compact("penyewas"));
    }

    public function showPenyewa($id)
    {
        $penyewa = User::findOrFail($id);
        return view("admin.penyewa.show", compact("penyewa"));
    }

    // Kantor Cabang
    public function kantorcabang()
    {
        $kantorcabangs = kantor_cabang::orderBy("created_at", "desc")->get();
        return view("admin.kantorcabang.index", compact("kantorcabangs"));
    }

    public function showKantorCabang($id)
    {
        $kantorcabang = kantor_cabang::with(['staff', 'bus'])->findOrFail($id);
        return view("admin.kantorcabang.show", compact("kantorcabang"));
    }

    public function showBus(Request $request, $id)
    {
        $bus = bus::findOrFail($id);
        return view("admin.kantorcabang.busdetail", compact("bus"));
    }

    public function showDestination(Request $request, $id)
    {
        $destination = destination::findOrFail($id);
        return view("admin.kantorcabang.destinationdetail", compact("destination"));
    }

    public function editKantorCabang($id)
    {
        $kantorcabang = kantor_cabang::findOrFail($id);
        return view("admin.kantorcabang.edit", compact("kantorcabang"));
    }

    public function updateKantorCabang(Request $request, $id)
    {
        $kantorcabang = kantor_cabang::with(['staff'])->findOrFail($id);

        $validated = $request->validate([
            'name' => 'string',
            'phone_number' => 'string',
            'image' => 'string',
            'address' => 'string',
            // 'location' => 'string',
            'longitude' => 'string',
            'latitude' => 'string',
        ]);

        if ($request->hasFile('image')) {
            Storage::delete($kantorcabang->image);

            $newImage = ['image' => Storage::putFile('public/image', $request->file('image'))];
        } else {
            // Jika tidak ada gambar baru, gunakan gambar yang sudah ada
            $newImage = ['image' => $kantorcabang->image];
        }

        $staff_id = $kantorcabang->staff->id;

        dd($validated);

        kantor_cabang::where('id', $id)->update([
            "name" => $validated["name"],
            'phone_number' => $validated['phone_number'],
            "image" => $newImage["image"],
            "address" => $validated["address"],
            // "location" => $validated["location"],
            'longitude' => $validated['longitude'],
            'latitude' => $validated['latitude'],
            "staff_id" => $staff_id,
        ]);

        return redirect('admin/kantorcabang');
    }

    public function transaction()
    {
        $transaction = booking::with(['user'])->get();

        return view('admin.transaction.index', compact('transaction'));
    }

    public function laporanAdmin()
    {
        $kantorcabangs = kantor_cabang::all();
        return view('admin.laporan.index', compact('kantorcabangs'));
    }

}
