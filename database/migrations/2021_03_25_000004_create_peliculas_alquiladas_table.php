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
            $table->boolean('devuelta')->default(0);
            $table->timestamp('fecha_alquiler')->nullable();
            $table->timestamp('fecha_devolucion')->nullable();
            $table->timestamps();

            /**
             * Cuando el administrador borre el usuario, quiero que se borren también sus
             * películas alquiladas. Pero si el administrador elimina una película, no
             * me interesa eliminar su registro en la tabla de las películas alquiladas.
             */
            //$table->foreign('id_pelicula')->references('id')->on('peliculas');
            $table->foreign('id_user')->references('id')->on('users');
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
