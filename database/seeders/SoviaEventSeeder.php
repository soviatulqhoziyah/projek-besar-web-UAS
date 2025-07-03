<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SoviaEvent;

class SoviaEventSeeder extends Seeder
{
    public function run(): void
    {
        SoviaEvent::factory()->count(10)->create();
    }
}
