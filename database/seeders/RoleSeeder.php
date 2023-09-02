<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::create([
            'name'=>"DIRECTOR",
            'company_id'=>1,
            'is_active'=>false,
        ]);
        Role::create([
            'name'=>"STUDENT",
            'company_id'=>1,
            'is_active'=>true,
        ]);
        Role::create([
            'name'=>"MANAGER",
            'company_id'=>2,
            'is_active'=>true,
        ]);
    }






}
