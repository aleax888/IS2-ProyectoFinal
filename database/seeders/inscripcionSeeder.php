<?php

namespace Database\Seeders;

use App\Models\Inscripcion;
use Illuminate\Database\Seeder;

class inscripcionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Inscripcion::factory(10)->create();
    }
}
