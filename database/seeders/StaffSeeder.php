<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class StaffSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('staff')->insert([
            // [
            //     'id' => 1,
            //     'name' => 'Tangerang',
            //     'email' => 'tgr1@gmail.com',
            //     'phone_number' => '081234567801',
            //     'password' => Hash::make('password'),
            //     'address' => 'Jl. Kyai Maja, RT.004/RW.002, Panunggangan, Kec. Pinang, Kota Tangerang, Banten 15143',
            //     'created_at' => now(),
            //     'updated_at' => now(),
            // ],
            // [
            //     'id' => 2,
            //     'name' => 'Bandung',
            //     'email' => 'bdg2@gmail.com',
            //     'phone_number' => '081234567802',
            //     'password' => Hash::make('password'),
            //     'address' => 'Jl. Asia Afrika 57-59, Braga, Kec. Sumur Bandung, Kota Bandung, Jawa Barat 40251',
            //     'created_at' => now(),
            //     'updated_at' => now(),
            // ],
            // [
            //     'id' => 3,
            //     'name' => 'Semarang',
            //     'email' => 'smg3@gmail.com',
            //     'phone_number' => '081234567803',
            //     'password' => Hash::make('password'),
            //     'address' => 'Jl. Pandanaran, Mugassari, Kec. Semarang Sel., Kota Semarang, Jawa Tengah 50249',
            //     'created_at' => now(),
            //     'updated_at' => now(),
            // ],
            // [
            //     'id' => 4,
            //     'name' => 'Solo',
            //     'email' => 'solo4@gmail.com',
            //     'phone_number' => '081234567804',
            //     'password' => Hash::make('password'),
            //     'address' => 'Jl. Sutan Syahrir 214-196, Setabelan, Kec. Banjarsari, Kota Surakarta, Jawa Tengah 57139',
            //     'created_at' => now(),
            //     'updated_at' => now(),
            // ],
            // [
            //     'id' => 5,
            //     'name' => 'Surabaya',
            //     'email' => 'sby5@gmail.com',
            //     'phone_number' => '081234567805',
            //     'password' => Hash::make('password'),
            //     'address' => 'Jl. Adityawarman No.64, Darmo, Kec. Wonokromo, Surabaya, Jawa Timur 60241',
            //     'created_at' => now(),
            //     'updated_at' => now(),
            // ],
        ]);
    }
}
