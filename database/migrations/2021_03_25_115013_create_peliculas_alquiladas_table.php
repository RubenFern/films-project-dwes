<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeliculasAlquiladasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('peliculas_alquiladas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_pelicula');
            $table->unsignedBigInteger('id_user');
            $table->boolean('devuelta');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('peliculas_alquiladas');
    }
}
