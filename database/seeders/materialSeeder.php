<?php

namespace Database\Seeders;

use App\Models\Material;
use Illuminate\Database\Seeder;

class materialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Material::factory(10)->create();
    }
}
