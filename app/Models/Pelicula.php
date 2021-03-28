<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelicula extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_genero',
        'titulo',
        'director',
        'año',
        'precio',
        'sinopsis',
        'cantidad',
        'imagen'
    ];

    // Una película pertenece a un género
    public function genero()
    {
        // Asigno el nombre que le puse a la clave foránea y 
        // ya puedo acceder al género de la película en específico
        return $this->belongsTo(Genero::class, 'id_genero');
    }

    // Una película puede tener varias películas alquiladas
    public function peliculas_alquiladas()
    {
        return $this->hasMany(PeliculaAlquilada::class);
    }
}
