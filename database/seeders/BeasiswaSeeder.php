<?php

namespace Database\Seeders;

use App\Models\SoviaBeasiswa;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BeasiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SoviaBeasiswa::factory()->count(10)->create();
    }
}
