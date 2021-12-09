<?php

namespace Database\Factories;

use App\Models\Inscripcion;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class inscripcionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */

    protected $model = Inscripcion::class;

    public function definition()
    {
        return [
            'tipos_inscrito' => $this->faker->randomElement(['profesional', 'colaborador', 'encargado']),
            'fecha_inscripcion' => $this->faker->date(),
            'id_paquete' => rand(1,20),
            'id_evento' => rand(1,20),
            'id_usuario' => rand(1,20),
            'id_actividad' => rand(1,20)
        ];
    }
}
