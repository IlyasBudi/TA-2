<?php

namespace App\Http\Controllers;

use App\Models\KantorCabang;
use App\Models\Staff;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class KantorCabangController extends Controller
{
    public function index()
    {
        $staff_id = Auth::id();

        $kantorcabangs  = KantorCabang::where('staff_id', $staff_id)->get();

        return view('staff.kantorcabang.index', ['kantorcabangs' => $kantorcabangs]);
    }

    public function create()
    {
        return view('staff.kantorcabang.add');
    }

    public function store(Request $request)
    {
        // validasi form
        $validated = $request->validate([
            'name' => 'required|string',
            'image' => 'required|mimes:jpg,jpeg,png|max:5120',
            'phone_number' => 'required|string',
            'address' => 'required|string',
            // 'location' => 'string',
            'longitude' => 'string',
            'latitude' => 'string',
        ]);

        // menyimpan file image ke dalam storage
        $saveImage['image'] = Storage::putFile('public/image', $request->file('image'));

        $staff_id = Auth::id();

        KantorCabang::create([
            'name' => $validated['name'],
            'image' => $saveImage['image'],
            'phone_number' => $validated['phone_number'],
            'address' => $validated['address'],
            'longitude' => $validated['longitude'],
            'latitude' => $validated['latitude'],
            // 'location' => $validated['location'],
            'staff_id' => $staff_id,
        ]);

        return redirect('/staff/kantorcabang');
    }

    public function show(string $id)
    {
        $kantorcabang = KantorCabang::with('staff')->findOrFail($id);
        return view('staff.kantorcabang.show', ['kantorcabang' => $kantorcabang]);
    }

    public function edit(string $id)
    {
        $kantorcabang = KantorCabang::findOrFail($id);
        return view('staff.kantorcabang.edit', ['kantorcabang' => $kantorcabang]);
    }
    
    public function update(Request $request, string $id)
    {
        $kantorcabang = KantorCabang::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string',
            'image' => 'mimes:jpg,jpeg,png|max:5120',
            'phone_number' => 'required|string',
            'address' => 'required|string',
            // 'location' => 'string',
            'longitude' => 'required|string',
            'latitude' => 'required|string',
        ]);

        if ($request->hasFile('image')) {
            // hapus image lama
            Storage::delete($kantorcabang->image);

            // simpan image baru
            $newImage = ['image' => Storage::putFile('public/image', $request->file('image'))];
        } else {
            // jika tidak ada image baru, gunakan foto lama
            $newImage = ['image' => $kantorcabang->image];
        }

        // mengambil id staff
        $staff_id = Auth::id();
        
        // update data
        KantorCabang::where('id', $id)->update([
            'name' => $validated['name'],
            'image' => $newImage['image'],
            'phone_number' => $validated['phone_number'],
            'address' => $validated['address'],
            // 'location' => $validated['location'],
            'longitude' => $validated['longitude'],
            'latitude' => $validated['latitude'],
            'staff_id' => $staff_id,
        ]);

        return redirect('/staff/kantorcabang');
    }

    public function destroy(string $id)
    {
        KantorCabang::destroy($id);
        return redirect('/staff/kantorcabang');
    }
}
