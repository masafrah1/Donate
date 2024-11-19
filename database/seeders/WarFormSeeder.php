<?php

namespace Database\Seeders;

use App\Models\WarForm;
use Illuminate\Database\Seeder;

class WarFormSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        WarForm::factory()
            ->count(5)
            ->create();
    }
}
