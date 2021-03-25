<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Ruben',
            'email' => 'rubenfv38@educastur.es', 
            'email_verified_at' => now(),
            'password' => Hash::make('naranco'),
            'role_id' => Role::getRoleByName('administrador')->first()->id,
            'remember_token' => Str::random(10),
        ]);

        User::factory()->times(10)->create();
    }
}
