<?php

namespace Database\Factories;

use App\Models\SoviaEvent;
use Illuminate\Database\Eloquent\Factories\Factory;

class SoviaEventFactory extends Factory
{
    protected $model = SoviaEvent::class;

    public function definition(): array
    {
        return [
            'image' => 'https://picsum.photos/seed/' . $this->faker->uuid . '/640/480',
            'nama_kegiatan'       => $this->faker->sentence(3),
            'deskripsi'           => $this->faker->paragraph(),
            'tanggal_kegiatan'    => $this->faker->dateTimeBetween('+1 week', '+6 months')->format('Y-m-d'),
            'waktu'               => $this->faker->time('H:i:s'),
            'tempat'              => $this->faker->city(),
            'tanggal_pendaftaran' => $this->faker->dateTimeBetween('now', '+1 week')->format('Y-m-d'),
            'insert'              => $this->faker->name(),
            'contact_person'      => $this->faker->phoneNumber(),
            'benefitnya'          => $this->faker->sentence(6),
        ];
    }
}
