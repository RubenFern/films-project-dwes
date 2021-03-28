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
        return $this->belongsTo(Genero::class);
    }

    // Una película puede tener varias películas alquiladas
    public function peliculas_alquiladas()
    {
        return $this->hasMany(PeliculaAlquilada::class);
    }
}
