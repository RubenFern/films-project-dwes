<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PeliculaAlquilada extends Model
{
    use HasFactory;

    protected $table = "peliculas_alquiladas";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_pelicula',
        'id_user',
        'devuelta'
    ];
}
