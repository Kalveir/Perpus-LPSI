<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Nominal_denda;

class NominalDendaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = NominalDenda::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'nominal' => $this->faker->numberBetween(-10000, 10000),
            'status' => $this->faker->numberBetween(-10000, 10000),
            'tanggal' => $this->faker->date(),
        ];
    }
}
