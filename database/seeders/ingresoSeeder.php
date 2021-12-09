<?php

namespace Database\Seeders;

use App\Models\Ingreso;
use Illuminate\Database\Seeder;

class ingresoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Ingreso::factory(10)->create();
    }
}
