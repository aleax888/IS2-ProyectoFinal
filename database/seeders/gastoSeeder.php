<?php

namespace Database\Seeders;

use App\Models\Gasto;
use Illuminate\Database\Seeder;

class gastoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Gasto::factory(10)->create();
    }
}
