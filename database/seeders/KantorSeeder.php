<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KantorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('kantor_cabangs')->insert([
            [
                'id' => 1,
                'name' => 'Tangerang',
                'phone_number' => '081234567801',
                'address' => 'Jl. Kyai Maja, RT.004/RW.002, Panunggangan, Kec. Pinang, Kota Tangerang, Banten 15143',
                'image' => 'penyewatemplate/assets/img/baru2/building.jpg',
                'longitude' => '106.644225801107',
                'latitude' => '-6.222772017045218',
                'staff_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 2,
                'name' => 'Tangerang Selatan',
                'phone_number' => '081234567802',
                'address' => 'Jl. Puspitek 18, Bakti Jaya, Kec. Serpong, Kota Tangerang Selatan, Banten 15310',
                'image' => 'penyewatemplate/assets/img/baru2/office.jpeg',
                'longitude' => '106.70294633502691',
                'latitude' => '-6.347129012513048',
                'staff_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 3,
                'name' => 'Jakarta',
                'phone_number' => '081234567803',
                'address' => 'Jl. Raya Bekasi, RT.7/RW.11, Jatinegara, Kec. Cakung, Kota Jakarta Timur, Daerah Khusus Ibukota Jakarta 13250',
                'image' => 'penyewatemplate/assets/img/baru2/building.jpg',
                'longitude' => '106.90541833223901',
                'latitude' => '-6.195525870962189',
                'staff_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 4,
                'name' => 'Depok',
                'phone_number' => '081234567804',
                'address' => 'Jl. Margonda Raya 12-43, Depok, Kec. Pancoran Mas, Kota Depok, Jawa Barat 16431',
                'image' => 'penyewatemplate/assets/img/baru2/office.jpeg',
                'longitude' => '106.82434840766072',
                'latitude' => '-6.392683412438601',
                'staff_id' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 5,
                'name' => 'Bekasi',
                'phone_number' => '081234567805',
                'address' => 'Jl. Ahmad Yani, RT.004/RW.005, Marga Jaya, Kec. Bekasi Sel., Kota Bks, Jawa Barat 17144',
                'image' => 'penyewatemplate/assets/img/baru2/building.jpg',
                'longitude' => '106.9932545469535',
                'latitude' => '-6.2394260095802645',
                'staff_id' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
