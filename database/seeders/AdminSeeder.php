<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('admins')->insert([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('password'),
    ]);

    DB::table('category_buses')->insert([
        [
            'name' => 'Big Bus Seat 46 2-2 Toilet',
        ],
        [
            'name' => 'Big Bus Seat 50 2-2 Non Toilet',
        ],
        [
            'name' => 'Big Bus Seat 59 2-3 Non Toilet',
        ],
        // [
        //     'name' => 'Medium Bus Seat 30 2-2',
        // ],
        [
            'name' => 'Medium Bus Seat 35 2-2',
        ],
        [
            'name' => 'Medium Bus Seat 39 2-2',
        ],
    ]);
    }
}
