<?php

namespace App\Http\Controllers;

use App\Enums\BookingStatus;
use App\Models\admin;
use App\Models\booking;
use App\Models\category_bus;
use App\Models\destination;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class BookingController extends Controller
{
    private function generateUniqueCode()
    {
        do {
            $code = 'TRANS-' . mt_rand(000, 999);
        } while (Booking::where('code', $code)->exists());

        return $code;
    }

    public function bookingpage()
    {
        $code = $this->generateUniqueCode();
        $admin_id = 1;
        $user_id = Auth::id();
        $categorybus = category_bus::all();

        return view('penyewa.bookingpage', ['categorybus' => $categorybus, 'user_id' => $user_id, 'admin_id' => $admin_id, 'code' => $code]);
    }

    public function booking(Request $request)
    {
        $code = 'TRANS-' . mt_rand(000, 999);

        $validated = $request->validate([
            'code' => 'required',
            'admin_id' => 'required',
            'user_id' => 'required',
            'category_bus_id' => 'required',
            'destination' => 'required',
            'departure_date' => 'required|date|after_or_equal:today',
            'arrival_date' => 'required|date|after_or_equal:departure_date',
            'pickup_time' => 'required',
            'longitude' => 'required|string',
            'latitude' => 'required|string',
        ]);

        $admin_id = 1;
        $user_id = Auth::id();

        // Check date availability for the given destination
        // $departure_date = $validated['departure_date'];
        // $arrival_date = $validated['arrival_date'];
        // $destination = $validated['destination'];

        // $existingBookings = Booking::where('destination', $destination)
        //     ->where(function ($query) use ($departure_date, $arrival_date) {
        //         $query->whereBetween('departure_date', [$departure_date, $arrival_date])
        //             ->orWhereBetween('arrival_date', [$departure_date, $arrival_date])
        //             ->orWhere(function ($query) use ($departure_date, $arrival_date) {
        //                 $query->where('departure_date', '<=', $departure_date)
        //                         ->where('arrival_date', '>=', $arrival_date);
        //             });
        //     })->exists();

        // if ($existingBookings) {
        //     return back()->withErrors(['date' => 'The selected dates are not available for the chosen destination.']);
        // }

        try {
            $booking = booking::create([
                'code' => $code,
                'admin_id' => $admin_id,
                'user_id' => $user_id,
                'category_bus_id' => $validated['category_bus_id'],
                'destination' => $validated['destination'],
                'departure_date' => $validated['departure_date'],
                'arrival_date' => $validated['arrival_date'],
                'pickup_time' => $validated['pickup_time'],
                'longitude' => $validated['longitude'],
                'latitude' => $validated['latitude'],
            ]);

            // $booking->save();
            // dd($booking);
            return redirect('/')->with('Success', 'Booking berhasil dibuat!');
        } catch (\Exception $e) {
            return back()->withInput()->withErrors(['error', 'Terjadi kesalahan saat membuat booking. Periksa kembali data yang dimasukkan.']);
        }
    }
}
