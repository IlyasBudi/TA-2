<?php

namespace App\Http\Controllers;

// use App\Enums\BookingStatus;
// use App\Models\Booking;
use App\Models\bus;
use App\Models\CategoryBus;
use App\Models\Destination;
use App\Models\DetailTransaction;
use App\Models\KantorCabang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use DateTime;
use Exception;
use App\Models\Transaction;
use Midtrans\Snap;
use Midtrans\Config;
use Midtrans\Notification;



class BookingController extends Controller
{
    private function generateUniqueCode()
    {
        do {
            $code = 'TRANS-' . mt_rand(000, 999);
        } while (Transaction::where('code', $code)->exists());

        return $code;
    }

    public function bookingpage()
    {
        $code = $this->generateUniqueCode();
        $admin_id = 1;
        $user_id = Auth::id();
        $categorybus = CategoryBus::all();

        return view('penyewa.bookingpage', ['categorybus' => $categorybus, 'user_id' => $user_id, 'admin_id' => $admin_id, 'code' => $code]);
    }

   

    public function booking(Request $request)
    {
        $code = 'TRANS-' . mt_rand(000, 999);

        $validated = $request->validate([
            'code' => 'required',
            // 'admin_id' => 'required',
            'user_id' => 'required',
            'category_bus_id' => 'required',
            'destination' => 'required',
            'departure_date' => 'required|date|after_or_equal:today',
            'return_date' => 'required|date|after_or_equal:departure_date',
            'pickup_time' => 'required',
            'longitude' => 'required|string',
            'latitude' => 'required|string',
        ]);

        $admin_id = 1;
        $user_id = Auth::id();

        //select kantor cabang terdekat [dengan kondisi data lebih dari satu maka menghitung latlong jika tidak maka ambil data pertama]
        $latitude = $validated['latitude'];
        $longitude = $validated['longitude'];
        $category_bus_id = $validated['category_bus_id'];
        //get distance
        $kantorcabang = KantorCabang::all();
        // looping cari data kantor cabang terdekat
        $minDistance = PHP_FLOAT_MAX;
        $closestLocationId = null;
        foreach ($kantorcabang as $item){
            $distance = $this->haversineDistance($latitude, $longitude, $item['latitude'], $item['longitude']);
            if ($distance < $minDistance) {
                $minDistance = $distance;
                $closestLocationId = $item['id'];
                $kantorcabang_id = $closestLocationId;
            }
        }
        // cek by category_bus_id
        $existingBus = Bus::where('category_bus_id', $category_bus_id)->where('kantor_cabang_id', $closestLocationId)->where('status', 'Tersedia')->first();
        if($existingBus){
            // $kantor_cabang_id = $existingBus['kantor_cabang_id'];
            // $kantorcabang_id = $closestLocationId;
            $bus_id = $existingBus->id;

        // Periksa ketersediaan bus_id pada tanggal yang dipilih
        $departure_date = $validated['departure_date'];
        $return_date = $validated['return_date'];
        // $bus_id = $bus_id;

        $existingBookings = Transaction::where('bus_id', $bus_id)
            ->where(function ($query) use ($departure_date, $return_date) {
                $query->whereBetween('departure_date', [$departure_date, $return_date])
                    ->orWhereBetween('return_date', [$departure_date, $return_date])
                    ->orWhere(function ($query) use ($departure_date, $return_date) {
                        $query->where('departure_date', '<=', $departure_date)
                                ->where('return_date', '>=', $return_date);
                    });
            })->exists();

            if ($existingBookings) {
                // Cari bus_id yang berbeda dari kantor cabang yang sama
                $alternativeBus = Bus::where('kantor_cabang_id', $kantorcabang_id)
                                    ->where('category_bus_id', $validated['category_bus_id'])
                                    ->where('status', 'Tersedia')
                                    ->where('id', '!=', $bus_id)
                                    ->whereDoesntHave('transaction', function ($query) use ($departure_date, $return_date) {
                                        $query->whereBetween('departure_date', [$departure_date, $return_date])
                                            ->orWhereBetween('return_date', [$departure_date, $return_date])
                                            ->orWhere(function ($query) use ($departure_date, $return_date) {
                                                $query->where('departure_date', '<=', $departure_date)
                                                      ->where('return_date', '>=', $return_date);
                                            });
                                    })
                                    ->first();
    
                if ($alternativeBus) {
                    $bus_id = $alternativeBus->id;
                } else {
                    // Jika tidak ada bus_id yang tersedia di kantor cabang yang sama, cari di kantor cabang lain yang terdekat
                    $alternativeBusFound = false;
                    $sortedBranches = $kantorcabang->sortBy(function ($item) use ($latitude, $longitude) {
                        return $this->haversineDistance($latitude, $longitude, $item->latitude, $item->longitude);
                    });
    
                    foreach ($sortedBranches as $kantorcabang) {
                        if ($kantorcabang->id != $kantorcabang_id) {
                            $alternativeBus = Bus::where('kantor_cabang_id', $kantorcabang->id)
                                                ->where('category_bus_id', $validated['category_bus_id'])
                                                ->where('status', 'Tersedia')
                                                ->whereDoesntHave('transaction', function ($query) use ($departure_date, $return_date) {
                                                    $query->whereBetween('departure_date', [$departure_date, $return_date])
                                                        ->orWhereBetween('return_date', [$departure_date, $return_date])
                                                        ->orWhere(function ($query) use ($departure_date, $return_date) {
                                                            $query->where('departure_date', '<=', $departure_date)
                                                                  ->where('return_date', '>=', $return_date);
                                                        });
                                                })
                                                ->first();
    
                            if ($alternativeBus) {
                                $bus_id = $alternativeBus->id;
                                $kantorcabang_id = $kantorcabang->id; // Update kantor cabang ID
                                $alternativeBusFound = true;
                                break;
                            }
                        }
                    }
    
                    if (!$alternativeBusFound) {
                        return back()->withInput()->withErrors(['bus' => 'Tidak ada bus yang tersedia pada tanggal yang dipilih. Silahkan pilih tanggal lain.']);
                    }
                }
            }

            // Dapatkan destination_id berdasarkan destination yang dipilih
            $destination = Destination::where('name', $validated['destination'])
            ->where('kantor_cabang_id', $kantorcabang_id)
            ->first();

            if ($destination) {
                $destination_id = $destination->id;
            } else {
                return back()->withErrors(['destination' => 'No destination found for the selected branch.']);
            }

            $roundedDistance = floor($distance);

            // Tentukan extra_charge berdasarkan jarak
            if ($roundedDistance < 25) {
                $extra_charge = 0;
            } else {
                // $extra_charge = 7000 * ($roundedDistance - 25);
                $extra_charge = 7000 * ($roundedDistance);
            }

            // Hitung jumlah hari antara departure_date dan return_date
            $departure = new DateTime($departure_date);
            $return = new DateTime($return_date);
            $interval = $departure->diff($return);
            $jumlah_hari = $interval->days + 1;

            // Ambil harga dari bus berdasarkan bus_id
            $bus_price = DB::table('buses')->where('id', $bus_id)->value('price');

            // Ambil harga dari destination berdasarkan destination_id
            $destination_price = DB::table('destinations')->where('id', $destination_id)->value('price');
            $total_destination_price = $destination_price * $jumlah_hari;

            // Hitung total_price (harga total)
            $total_price = $bus_price + $total_destination_price + $extra_charge;
            
            $validated['transaction_status'] = 'Pending';

            try {
                $booking = Transaction::create([
                    'code' => $code,
                    // 'admin_id' => $admin_id,
                    'user_id' => $user_id,
                    'kantor_cabang_id' => $kantorcabang_id,
                    'destination_id' => $destination_id,
                    'category_bus_id' => $validated['category_bus_id'],
                    'bus_id' => $bus_id,
                    // 'destination' => $validated['destination'],
                    'total_price' => $total_price,
                    'extra_charge' => $extra_charge,
                    'transaction_status' => $validated['transaction_status'],
                    'departure_date' => $validated['departure_date'],
                    'return_date' => $validated['return_date'],
                    'pickup_time' => $validated['pickup_time'],
                    'longitude' => $validated['longitude'],
                    'latitude' => $validated['latitude'],
                ]);

                DetailTransaction::create([
                    'transaction_id' => $booking->id,
                    'bus_id' => $booking->bus_id,
                    'destination_id' => $booking->destination_id,
                    'total_price' => $booking->total_price,
                    'transaction_status' => 'Pending',
                ]);

                // Midtrans Configuration
                Config::$serverKey = config('config.midtrans.serverKey');
                Config::$isProduction = config('config.midtrans.isProduction');
                Config::$isSanitized = config('config.midtrans.isSanitized');
                Config::$is3ds = config('config.midtrans.is3ds');

                //Buat array untuk dikirim ke midtrans
                $midtrans = [
                    'transaction_details' => [
                        'order_id' => $booking->id,
                        'gross_amount' => $booking->total_price,
                    ],
                    'customer_details' => [
                        'first_name' => Auth::user()->name,
                        'email' => Auth::user()->email,
                        'phone' => Auth::user()->phone,
                        'address' => Auth::user()->address,
                    ],
                    'vtweb' => []
                ];

                // get Snap Payment Page URL
                $paymentUrl = Snap::createTransaction($midtrans)->redirect_url;

                // Commit the transaction and decrement stock only if it was successful
                DB::commit();
    
                // $booking->save();
                // dd($booking);
                return redirect($paymentUrl)->with('Success', 'Booking berhasil dibuat!');
            } catch (\Exception $e) {
                // dd($booking);
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

    public function callback(Request $request)
    {
        // Set Konfigurasi Midtrans
        Config::$serverKey = config('config.midtrans.serverKey');
        Config::$isProduction = config('config.midtrans.isProduction');
        Config::$isSanitized = config('config.midtrans.isSanitized');
        Config::$is3ds = config('config.midtrans.is3ds');

        // Buat instance midtrans notification
        $notification = new Notification();

        // Assign ke variable untuk memudahkan penulisan code
        $status = $notification->transaction_status;
        $type = $notification->payment_type;
        $fraud = $notification->fraud_status;
        $order_id = $notification->order_id;

        // Cari transaksi berdasarkan ID
        $transaction = Transaction::findOrFail($order_id);

        // Handle notification status
        if ($status == 'capture') {
            if ($type == 'credit_cart') {
                if ($fraud == 'challenge') {
                    $transaction->transaction_status = 'PENDING';
                    $transaction->update(['transaction_status' => 'Pending']);
                } else {
                    $transaction->transaction_status = 'SUCCESS';
                    $transaction->update(['transaction_status' => 'Lunas']);
                }
            }
        } else if ($status == 'settlement') {
            $transaction->transaction_status = 'SUCCESS';
            $transaction->update(['transaction_status' => 'Lunas']);
        } else if ($status == 'pending') {
            $transaction->transaction_status = 'PENDING';
            $transaction->update(['transaction_status' => 'Pending']);
        } else if ($status == 'deny') {
            $transaction->transaction_status = 'CANCELLED';
            $transaction->update(['transaction_status' => 'Cancelled']);
        } else if ($status == 'expire') {
            $transaction->transaction_status = 'CANCELLED';
            $transaction->update(['transaction_status' => 'Cancelled']);
        } else if ($status == 'cancel') {
            $transaction->transaction_status = 'CANCELLED';
            $transaction->update(['transaction_status' => 'Cancelled']);
        }

        // Simpan transaksi
        $transaction->save();
    }

}
