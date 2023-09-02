<?php

namespace Database\Seeders;

use App\Models\Company;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Company::create([
           'name'=>'Mono Main office',
           'company_id'=>null,
           'is_active'=>true
        ]);

        Company::create([
            'name'=>'Mono 1 filial',
           'company_id'=>1,
            'is_active'=>true
        ]);

        Company::create([
            'name'=>'Mono 2 filial',
           'company_id'=>1,
            'is_active'=>true
        ]);

    }
}
