<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        User::create([
            'first_name'=>"Saylaubay",
            'last_name'=>"Bekmurzaev",
            'username'=>'saylau',
            'password'=>Hash::make('123'),
            'phone'=>"974748061",
            'role_id'=>1,
            'is_active'=>true,
        ]);
        User::create([
            'first_name'=>"Nawriz",
            'last_name'=>"Urazov",
            'username'=>'nawriz',
            'password'=>Hash::make('456'),
            'phone'=>"4456987123",
            'role_id'=>2,
            'is_active'=>true,
        ]);
        User::create([
            'first_name'=>"Batir",
            'last_name'=>"Duysenbaev",
            'username'=>'batir',
            'password'=>Hash::make('789'),
            'phone'=>"987654321",
            'role_id'=>1,
            'is_active'=>true,
        ]);


    }
}
