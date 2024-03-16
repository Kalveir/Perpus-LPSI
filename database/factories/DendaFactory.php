<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Denda;
use App\Models\Pinjam;

class DendaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Denda::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'pinjam_id' => Pinjam::factory(),
            'denda' => $this->faker->numberBetween(-10000, 10000),
            'lama_waktu' => $this->faker->numberBetween(-10000, 10000),
            'tgl_denda' => $this->faker->date(),
        ];
    }
}
