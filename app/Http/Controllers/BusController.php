<?php

namespace App\Http\Controllers;

use App\Models\CategoryBus;
use App\Models\bus;
use App\Models\KantorCabang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class BusController extends Controller
{
    public function index()
    {
        $staff_id = Auth::id();
        $kantorcabang_id = KantorCabang::where('staff_id', $staff_id)->first()->id;

        $bus = Bus::where('kantor_cabang_id', $kantorcabang_id)->get();
        return view('staff.bus.index', ['bus' => $bus]);
    }

    public function create()
    {
        $categorybus = CategoryBus::all();
        return view('staff.bus.add', ['categorybus' => $categorybus]);
    }

    public function store(Request $request)
    {
        // dd($request->all());

        $validated = $request->validate([
            'category_bus_id' => 'required',
            'name' => 'required|string',
            'description' => 'required|string|max:65535',
            'image' => 'required|mimes:jpg,jpeg,png|max:10240',
            'price' => 'required|integer',
            'status' => 'required|string',
        ]);

        $saveImage['image'] = Storage::putFile('public/image', $request->file('image'));

        // kantor cabang id
        $staff_id = Auth::id();
        $kantorcabang_id = KantorCabang::where('staff_id', $staff_id)->first()->id;

        Bus::create([
            'category_bus_id' => $validated['category_bus_id'],
            'name' => $validated['name'],
            'description' => $validated['description'],
            'image' => $saveImage['image'],
            'price' => $validated['price'],
            'status' => $validated['status'],
            // dump($request->boolean( key: 'is_ready')),
            // 'is_ready' => $validated['is_ready'],
            // 'is_ready' => $request->has('is_ready') ? 1 : 0, // Menggunakan kondisi untuk menetapkan nilai
            'kantor_cabang_id' => $kantorcabang_id,
        ]);

        return redirect('/staff/bus');
    }

    public function show(string $id)
    {
        $bus = Bus::find($id);
        return view('staff.bus.show', ['bus' => $bus]);
    }

    public function edit(string $id)
    {
        $categorybus = CategoryBus::all();
        $bus = Bus::findOrfail($id);
        return view('staff.bus.edit', ['bus' => $bus], ['categorybus' => $categorybus]);
    }

    public function update(Request $request, string $id)
    {
        
        $bus = Bus::findOrfail($id);

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

        $bus->update([
            'category_bus_id' => $validated['category_bus_id'],
            'name' => $validated['name'],
            'description' => $validated['description'],
            'image' => $newImage['image'],
            'price' => $validated['price'],
            'status' => $validated['status'],
        ]);

        return redirect('/staff/bus');
    }

    public function destroy(string $id)
    {
        Bus::destroy($id);
        return redirect('/staff/bus');
    }
}
