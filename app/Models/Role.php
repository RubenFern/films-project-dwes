<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'role'
    ];

    public static function getRoleByName(String $rolename)
    {
        return Role::select('id')->where('role', $rolename);
    }

    // Un rol puede tener varios usuarios
    public function user()
    {
        return $this->hasMany(User::class);
    }
}
