<?php

namespace Database\Factories;

use App\Models\Asistencia;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class asistenciaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */

    protected $model = Asistencia::class;

    public function definition()
    {
        return [
            'material' => $this->faker->sentence(),
            'hora' => $this->faker->date(),
            'id_actividades' => rand(1,20),
            'id_inscripciones' => rand(1,20),
        ];
    }
}
