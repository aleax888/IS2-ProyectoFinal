<?php

namespace Database\Factories;

use App\Models\Gasto;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class gastoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */

    protected $model = Gasto::class;
    
    public function definition()
    {
        return [
            'fecha' => $this->faker->date(),
            'descripcion' => $this->faker->paragraph(),
            'monto' => $this->faker->randomNumber($nbDigits = NULL, $strict = false),
            'evidencia' => $this->faker->sentence(),
            'id_evento' => rand(1,20),
            'id_usuario' => rand(1,20),
            'id_tipos_gasto' => rand(1,20)
        ];
    }
}
