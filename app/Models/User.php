<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role_id',
        'remember_token',
        'email_verified_at'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // Un usuario puede tener varias películas alquiladas
    public function pelicula_alquilada()
    {
        return $this->hasMany(PeliculaAlquilada::class);
    }

    // Un usuario pertenece a un role
    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id');
    }

    // Compruebo si el usuario es administrador
    public function isAdmin()
    {
        $idUsuario = $this->id;
        
        if ($idUsuario == 1)
        {
            return true;
        } else
        {
            return false;
        }
    }
}
