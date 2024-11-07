<?php

namespace App\Http\Controllers;

use App\Models\KantorCabang;
use App\Models\Staff;
use App\Models\Destination;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class DestinasiController extends Controller
{
    public function index()
    {
        $staff_id = Auth::id();

        $kantorcabang_id = KantorCabang::where("staff_id", $staff_id)->first()->id;

        $destinations = Destination::where("kantor_cabang_id", $kantorcabang_id)->get();
        return view("staff.destination.index", ["destination" => $destinations]);
    }

    public function create()
    {
        return view("staff.destination.add");
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $validated = $request->validate([
            "name" => "required|string",
            // "description" => "required|string|max:65535",
            "price" => "required|integer",
            // "image" => "mimes:jpg, jpeg, png|max:10240",
        ]);

        // $saveImage['image'] = Storage::putFile('public/image', $request->file('image'));

        $staff_id = Auth::id();
        $kantorcabang_id = KantorCabang::where("staff_id", $staff_id)->first()->id;

        Destination::create([
            'name' => $validated['name'],
            // 'description' => $validated['description'],
            'price' => $validated['price'],
            // 'image' => $saveImage['image'],
            'kantor_cabang_id' => $kantorcabang_id,
        ]);

        // dd($request->all());
        return redirect('/staff/destination');
    }
    
    public function show(String $id)
    {
        $destination = Destination::find($id);

        return view("staff.destination.show", ["destination" => $destination]);
    }

    public function edit(string $id)
    {
        $destination = Destination::findOrFail($id);
        return view("staff.destination.edit", ["destination" => $destination]);
    }

    public function update(Request $request, string $id)
    {
        $destination = Destination::findOrFail($id);

        $validated = $request->validate([
            "name" => "required|string",
            // "description" => "required|string|max:65535",
            "price" => "required|integer",
            // "image" =>"mimes:jpg, jpeg, png|max:10240",
        ]);

        // if ($request->hasFile('image')) {
        //     Storage::delete($destination->image);

        //     $newImage = ['image' => Storage::putFile('public/image', $request->file('image'))];
        // } else {
        //     $newImage = ['image' => $destination->image];
        // }

        $destination->update([
            "name" => $validated["name"],
            // "description" => $validated["description"],
            "price" => $validated["price"],
            // "image" => $newImage["image"],
        ]);

        return redirect('/staff/destination');
    }

    public function destroy(string $id)
    {
        Destination::destroy($id);
        return redirect('/staff/destination');
    }
}
