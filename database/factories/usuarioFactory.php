<?php

namespace Database\Factories;

use App\Models\Usuario;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class usuarioFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */

    protected $model = Usuario::class;

    public function definition()
    {
        return [
            'QR' => $this->faker->sentence(),
            'nombre' => $this->faker->sentence(),
            'apellido' => $this->faker->sentence(),
            'email' => $this->faker->sentence(),
            'contraseña' => $this->faker->sentence(),
            'id_rol' => $factory->create(App\User::class)->id
        ];
    }
}
