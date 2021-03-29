<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genero extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'genero'    
    ];

    // Un género puede tener varias películas
    public function peliculas()
    {   
        return $this->hasMany(Pelicula::class, 'id');
    }

}
