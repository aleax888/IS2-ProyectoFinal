<?php

namespace Databases\Factories;

use App\Model\Material;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class materialFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */

    protected $model = Material::class;

    public function definition()
    {
        return [
            'descripcion' => $this->faker->paragraph(),
            'cantidad' => $this->faker->randomNumber($nbDigits = NULL, $strict = false),
            'nombre' => $this->faker->sentence(),
            'id_actividad' => rand(1,20),
            'id_tipo_materiales' => rand(1,20)
        ];
    }
}
