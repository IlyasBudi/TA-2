<?php

namespace App\Http\Controllers;

use App\Enums\BookingStatus;
use App\Models\admin;
use App\Models\booking;
use App\Models\category_bus;
use App\Models\bus;
use App\Models\destination;
use App\Models\User;
use App\Models\kantor_cabang;
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

        //select kantor cabang terdekat [dengan kondisi data lebih dari satu maka menghitung latlong jika tidak maka ambil data pertama]
        $latitude = $validated['latitude'];
        $longitude = $validated['longitude'];
        $category_bus_id = $validated['category_bus_id'];
        //get ditance
        $kantor_cabang = kantor_cabang::all();
        // looping cari data terdekat
        $minDistance = PHP_FLOAT_MAX;
        $closestLocationId = null;
        foreach ($kantor_cabang as $item){
            $distance = $this->haversineDistance($latitude, $longitude, $item['latitude'], $item['longitude']);
            if ($distance < $minDistance) {
                $minDistance = $distance;
                $closestLocationId = $item['id'];
                $kantorcabang_id = $closestLocationId;
            }
        }
        // cek by category_bus_id
        $existingBus = bus::where('category_bus_id', $category_bus_id)->where('kantor_cabang_id', $closestLocationId)->where('status', 'Tersedia')->first();
        if($existingBus){
            // $kantor_cabang_id = $existingBus['kantor_cabang_id'];
            // $kantorcabang_id = $closestLocationId;
            $bus_id = $existingBus->id;

            try {
                $booking = booking::create([
                    'code' => $code,
                    'admin_id' => $admin_id,
                    'user_id' => $user_id,
                    'kantor_cabang_id' => $kantorcabang_id,
                    'category_bus_id' => $validated['category_bus_id'],
                    'bus_id' => $bus_id,
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
        }else{
            return back()->withInput()->withErrors(['error', 'Type Bus tidak tersedia di lokasi kantor cabang terdekat. silahkan pilih type bus lain nya']);
        }
    }
    public function haversineDistance($lat1, $lon1, $lat2, $lon2) {
        $earthRadius = 6371;  // Earth's radius in kilometers
    
        // Convert degrees to radians
        $lat1 = deg2rad($lat1);
        $lon1 = deg2rad($lon1);
        $lat2 = deg2rad($lat2);
        $lon2 = deg2rad($lon2);
    
        // Haversine formula
        $dLat = $lat2 - $lat1;
        $dLon = $lon2 - $lon1;
    
        $a = sin($dLat / 2) * sin($dLat / 2) +
             cos($lat1) * cos($lat2) * 
             sin($dLon / 2) * sin($dLon / 2);
    
        $c = 2 * atan2(sqrt($a), sqrt(1 - $a));
    
        // Distance in kilometers
        $distance = $earthRadius * $c;
    
        return $distance;
    }

}
