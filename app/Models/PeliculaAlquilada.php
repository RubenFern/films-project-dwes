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


    // Uso la instancia de Carbon para el manejo de fechas
    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'fecha_alquiler',
        'fecha_devolucion'
    ];

    // Una película alquilada pertenece a una película
    public function pelicula()
    {
        return $this->belongsTo(Pelicula::class);
    }

    // Una película alquilada pertenece a un usuario
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
