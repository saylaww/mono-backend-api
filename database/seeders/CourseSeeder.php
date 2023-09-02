<?php

namespace Database\Seeders;

use App\Models\Course;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Course::create([
            'name'=>'Kompyutre operator',
            'desc'=>'KO haqqinda',
            'user_id'=>1,
            'company_id'=>1,
            'is_active'=>false,
        ]);
        Course::create([
            'name'=>'1C buxgalteriya',
            'desc'=>'Buxgalteriya haqqinda',
            'user_id'=>2,
            'company_id'=>1,
            'is_active'=>false,
        ]);
        Course::create([
            'name'=>'Kompyuter sawatxanligi',
            'desc'=>'Sawatxanliq haqqinda',
            'user_id'=>3,
            'company_id'=>2,
            'is_active'=>false,
        ]);
    }
}
