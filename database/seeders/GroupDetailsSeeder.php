<?php

namespace Database\Seeders;

use App\Models\GroupDetail;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GroupDetailsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
//        GroupDetail::factory(5)->create();
        GroupDetail::factory(5)->create();
    }
}
