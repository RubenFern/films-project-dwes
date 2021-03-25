<?php

namespace Database\Factories;

use App\Models\Genero;
use App\Models\Pelicula;
use Illuminate\Database\Eloquent\Factories\Factory;

class PeliculaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Pelicula::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //'id_genero' => Genero::getGeneroByName('accion')->first()->id, // Obtengo el id de cada categoría. Con datos reales uso este método
            'id_genero' => Genero::inRandomOrder()->first()->id,
            'titulo' => $this->faker->sentence(3),
            'director' => $this->faker->name,
            'año' => $this->faker->year,
            'precio' => $this->faker->randomFloat($maximoDecimales = 2, $precioMin = 5, $precioMax = 25),
            'sinopsis' => $this->faker->paragraph(3),
            'cantidad' => $this->faker->numberBetween(2, 7),
            'imagen' => $this->faker->imageUrl(1000, 1500),
        ];
    }
}
