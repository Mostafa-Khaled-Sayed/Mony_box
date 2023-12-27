<?php

namespace Database\Seeders;

use App\Models\Taxrule;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TaxruleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Taxrule::query()->create(['tax_rule' => 0]);
    }
}
