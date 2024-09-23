<?php

namespace App\Http\Controllers;

use App\Models\rekening;
use Illuminate\Http\Request;
use Illuminate\support\Facades\Auth;

class RekeningController extends Controller
{
    public function index()
    {
        $staff_id = Auth::id();

        $rekenings = rekening::where("staff_id", $staff_id)->get();
        return view("staff.rekening.index", compact("rekenings"));
    }

    public function create()
    {
        return view("staff.rekening.add");
    }

    public function store(Request $request)
    {
        $staff_id = Auth::id();
        $validated = $request->validate([
            "name" => "required|string",
            "bank_name" => "required|string",
            "bank_number" => "required|string",
        ]);

        rekening::create([
            "name" => $validated["name"],
            "bank_name" => $validated["bank_name"],
            "bank_number" => $validated["bank_number"],
            "staff_id" => $staff_id
        ]);

        return redirect('staff/rekening');
    }

    public function show(string $id)
    {
        $rekening = rekening::findOrFail($id);
        return view('staff.rekening.show', compact('rekening'));
    }

    public function edit(string $id)
    {
        $rekening = rekening::findOrFail($id);
        return view('staff.rekening.edit', compact('rekening'));
    }

    public function update(Request $request, string $id)
    {
        $staff_id = Auth::id();
        $rekening = rekening::findOrFail($id);
        $validated = $request->validate([
            'name' => 'string',
            'bank_name' => 'string',
            'bank_number' => 'string',
        ]);

        rekening::where('id', $id)->update([
            'name' => $validated['name'],
            'bank_name' => $validated['bank_name'],
            'bank_number' => $validated['bank_number'],
            'staff_id' => $staff_id
        ]);

        return redirect('/staff/rekening');
    }

    public function destroy(string $id)
    {
        rekening::destroy($id);
        return redirect('/staff/rekening');
    }
}
