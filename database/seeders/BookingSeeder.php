<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class BookingSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        DB::table('bookings')->insert([
            'code' => 'TRANS-' . mt_rand(100, 999),
            'admin_id' => 1, // Sesuaikan dengan ID admin yang ada
            'user_id' => 1, // Sesuaikan dengan ID user yang ada
            'destination_id' => 1, // Sesuaikan dengan ID destination yang ada
            'category_bus_id' => 1, // Sesuaikan dengan ID category_bus yang ada
            'departure_date' => now(),
            'arrival_date' => now()->addDays(1),
            'pickup_time' => now()->format('H:i:s'),
            'longitude' => '106.84513', // Contoh koordinat
            'latitude' => '-6.21462', // Contoh koordinat
        ]);
            
    }
}
