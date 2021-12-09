<?php

namespace Database\Factories;

use App\Models\Ingreso;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ingresoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */

    protected $model = Ingreso::class;

    public function definition()
    {
        return [
            'num_transaccion' => $this->faker->randomNumber($nbDigits = NULL, $strict = false),
            'id_evento' => rand(1,20)
        ];
    }
}
