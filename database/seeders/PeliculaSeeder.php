<?php

namespace Database\Seeders;

use App\Models\Pelicula;
use Illuminate\Database\Seeder;

class PeliculaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Pelicula::factory()->times(15)->create();
    }
}
