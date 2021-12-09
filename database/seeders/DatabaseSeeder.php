<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Asistencia;
use App\Models\Gasto;
use App\Models\Ingreso;
use App\Models\Inscripcion;
use App\Models\Material;
use App\Models\Usuario;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(asistenciaSeeder::class);
        // $this->call(gastoSeeder::class);
        // $this->call(ingresoSeeder::class);
        // $this->call(inscripcionSeeder::class);
        // $this->call(materialSeeder::class);
        // $this->call(usuarioSeeder::class);

        //Asistencia::factory(10)->create();
        Gasto::factory(10)->create();
        Ingreso::factory(10)->create();
        Inscripcion::factory(10)->create();
        Material::factory(10)->create();
        Usuario::factory(10)->create();
    }
}
