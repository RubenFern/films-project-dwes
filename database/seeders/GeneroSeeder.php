<?php

namespace Database\Seeders;

use App\Models\Genero;
use Illuminate\Database\Seeder;

class GeneroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $generos = ['Accion', 'Comedia', 'Suspense', 'Drama', 'Crimen', 'Romance', 'Aventura', 'Terror', 'Musical', 'Ciencia Ficción'];

        foreach ($generos as $genero)
        {
            Genero::create([
                'genero' => $genero
            ]);
        }

        // Genero::factory()->times(10)->create();
    }
}
