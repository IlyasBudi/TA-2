<?php

namespace App\Http\Controllers;

use App\Models\CategoryBus;
use App\Models\KantorCabang;
use App\Models\Staff;
use App\Models\Bus;
use App\Models\Destination;
use App\Models\Transaction;
use App\Models\DetailTransaction;
use App\Models\Booking;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\support\Facades\Storage;
use Exception;
use Illuminate\Validation\Rule;

class AdminController extends Controller
{
    public function dashboard()
    {
        $users = User::count();
        $staff = Staff::count();
        $kantorcabang = KantorCabang::count();
        $transaction = Transaction::count();
        
        return view("admin.dashboard", compact("users", "staff", "kantorcabang", "transaction"));
    }

    // Staff
    public function staff()
    {
        $staff = Staff::orderBy("created_at", "desc")->get();
        return view("admin.staff.index", compact("staff"));
    }

    public function showStaff($id)
    {
        $staff = Staff::with(['kantorcabang', 'rekening'])->findOrFail($id);
        return view("admin.staff.show", compact("staff"));
    }

    public function editStaff($id)
    {
        $staff = Staff::findOrFail($id);
        return view("admin.staff.edit", compact("staff"));
    }

    public function updateStaff(Request $request, $id)
    {
        $staff = Staff::findOrFail($id);

        $validated = $request->validate([
            'name' => ['string', 'max:100'],
            'email' => ['string', 'email', 'max:100', Rule::unique('staff')->ignore($id)],
            'phone_number' => ['string'],
            'address' => ['string', 'max:65535'],
        ]);

        try {
            Staff::where('id', $id)->update([
                "name" => $validated["name"],
                "email" => $validated["email"],
                "phone_number" => $validated["phone_number"],
                "address" => $validated["address"],
            ]);

            return redirect('admin/staff')->with('success', 'Staff berhasil diperbarui!');
        } catch (Exception $e) {
            return back()->withInput()->withErrors(['error' => 'Terjadi kesalahan saat menyimpan data. Periksa kembali data yang dimasukkan.']);
        }
    }

    public function destroyStaff($id)
    {
        $staff = Staff::findOrFail($id);
        $staff->delete();

        return redirect('admin/staff')->with('success', 'Staff berhasil dihapus!');
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
        $kantorcabangs = KantorCabang::orderBy("created_at", "desc")->get();
        return view("admin.kantorcabang.index", compact("kantorcabangs"));
    }

    public function showKantorCabang($id)
    {
        $kantorcabang = KantorCabang::with(['staff', 'bus'])->findOrFail($id);
        return view("admin.kantorcabang.show", compact("kantorcabang"));
    }

    public function showBus(Request $request, $id)
    {
        $bus = Bus::findOrFail($id);
        return view("admin.kantorcabang.busdetail", compact("bus"));
    }

    public function editBus($id)
    {
        $categorybus = CategoryBus::all();
        $bus = Bus::findOrFail($id);
        return view("admin.kantorcabang.editbus", compact("bus", "categorybus"));
    }

    public function updateBus(Request $request, $id)
    {
        $bus = Bus::findOrFail($id);
        $kantorcabang_id = $bus->kantor_cabang_id;

        $validated = $request->validate([
            'category_bus_id' => 'required',
            'name' => 'required|string',
            'description' => 'required|string|max:65535',
            'image' => 'mimes:jpg,jpeg,png|max:5120',
            'price' => 'required|integer',
            'status' => 'required|string',
        ]);

        if ($request->hasFile('image')) {
            Storage::delete($bus->image);

            $newImage['image'] = Storage::putFile('public/image', $request->file('image'));
        } else {
            $newImage = ['image' => $bus->image];
        }

        try {
            Bus::where('id', $id)->update([
                'category_bus_id' => $validated['category_bus_id'],
                'name' => $validated['name'],
                'description' => $validated['description'],
                'image' => $newImage['image'],
                'price' => $validated['price'],
                'status' => $validated['status'],
                'kantor_cabang_id' => $kantorcabang_id,
            ]);

            return redirect('admin/kantorcabang/' . $kantorcabang_id)->with('success', 'Bus berhasil diperbarui!');
        } catch (Exception $e) {
            return back()->withInput()->withErrors(['error' => 'Terjadi kesalahan saat menyimpan data. Periksa kembali data yang dimasukkan.']);
        }
    }

    public function destroyBus($id)
    {
        $bus = Bus::findOrFail($id);
        $kantorcabang_id = $bus->kantor_cabang_id;
        $bus->delete();

        return redirect('admin/kantorcabang/' . $kantorcabang_id)->with('success', 'Bus berhasil dihapus!');
    }

    public function showDestination(Request $request, $id)
    {
        $destination = Destination::findOrFail($id);
        return view("admin.kantorcabang.destinationdetail", compact("destination"));
    }

    public function editDestination($id)
    {
        $destination = Destination::findOrFail($id);
        return view("admin.kantorcabang.editdestination", compact("destination"));
    }

    public function updateDestination(Request $request, $id)
    {
        $destination = Destination::findOrFail($id);
        $kantorcabang_id = $destination->kantor_cabang_id;

        $validated = $request->validate([
            "name" => "required|string",
            "price" => "required|integer",
            "min_hari" => "required|integer",
        ]);

        try {
            Destination::where('id', $id)->update([
                "name" => $validated["name"],
                "price" => $validated["price"],
                "min_hari" => $validated["min_hari"],
            ]);

            return redirect('admin/kantorcabang/' . $kantorcabang_id)->with('success', 'Destinasi berhasil diperbarui!');
        } catch (Exception $e) {
            return back()->withInput()->withErrors(['error' => 'Terjadi kesalahan saat menyimpan data. Periksa kembali data yang dimasukkan.']);
        }
    }

    public function destroyDestination($id)
    {
        $destination = Destination::findOrFail($id);
        $kantorcabang_id = $destination->kantor_cabang_id;
        $destination->delete();

        return redirect('admin/kantorcabang/' . $kantorcabang_id)->with('success', 'Destinasi berhasil dihapus!');
    }

    public function editKantorCabang($id)
    {
        $kantorcabang = KantorCabang::findOrFail($id);
        return view("admin.kantorcabang.edit", compact("kantorcabang"));
    }

    public function updateKantorCabang(Request $request, $id)
    {
        $kantorcabang = KantorCabang::with(['staff'])->findOrFail($id);

        $validated = $request->validate([
            'name' => 'string',
            'phone_number' => 'string',
            'image' => 'string',
            'address' => 'string',
            // 'location' => 'string',
            'longitude' => 'string',
            'latitude' => 'string',
            // 'staff_id' => 'string',
        ]);
        
        if ($request->hasFile('image')) {
            Storage::delete($kantorcabang->image);

            $newImage = ['image' => Storage::putFile('public/image', $request->file('image'))];
        } else {
            // Jika tidak ada gambar baru, gunakan gambar yang sudah ada
            $newImage = ['image' => $kantorcabang->image];
        }

        $staff_id = $kantorcabang->staff->id;

        // dd($validated);

        try {
            KantorCabang::where('id', $id)->update([
                "name" => $validated["name"],
                'phone_number' => $validated['phone_number'],
                "image" => $newImage["image"],
                "address" => $validated["address"],
                // "location" => $validated["location"],
                'longitude' => $validated['longitude'],
                'latitude' => $validated['latitude'],
                "staff_id" => $staff_id,
            ]);
            
            return redirect('admin/kantorcabang')->with('success', 'Kantor Cabang berhasil diperbarui!');
        } catch (Exception $e) {
            return back()->withInput()->withErrors(['error' => 'Terjadi kesalahan saat menyimpan data. Periksa kembali data yang dimasukkan.']);
        }
    }

    public function destroyKantorCabang($id)
    {
        $kantorcabang = KantorCabang::findOrFail($id);
        $kantorcabang->delete();

        return redirect('admin/kantorcabang')->with('success', 'Kantor Cabang berhasil dihapus!');
    }

    // public function transaction()
    // {
    //     $transaction = Booking::with(['user'])->get();

    //     return view('admin.transaction.index', compact('transaction'));
    // }

    public function laporanAdmin()
    {
        $kantorcabangs = KantorCabang::all();
        return view('admin.laporan.index', compact('kantorcabangs'));
    }

    public function getLaporanAdmin(Request $request)
    {
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');
        $kantorcabang_id = $request->input('kantorcabang_id');

        // Validasi Tanggal
        if ($startDate > $endDate) {
            return response()->json(['error' => 'Tanggal awal tidak boleh lebih besar dari tanggal akhir'], 400);
        }

        // Get transactions within the specified range
        $laporanSewa = Transaction::whereBetween('created_at', [$startDate, $endDate])
            ->where('kantor_cabang_id', $kantorcabang_id)
            ->where('transaction_status', 'lunas')
            ->get();

        // Group transactions by formatted date
        $groupedTransactions = $laporanSewa->groupBy(function ($transaction) {
            return Carbon::parse($transaction->created_at)->isoFormat('D MMMM YYYY');
        });

        // Merge the generated date range with the actual transactions
        $mergedData = $groupedTransactions->map(function ($transactions, $date) {
            $total = $transactions->sum('total_price');

            return [
                'date' => $date,
                'total' => $total,
                'transactions' => $transactions
            ];
        });

        return response()->json($mergedData->values());
    }
}
