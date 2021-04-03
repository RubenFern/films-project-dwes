<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeliculasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('peliculas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_genero');
            $table->string('titulo');
            $table->string('director');
            $table->integer('año');
            $table->float('precio')->unsigned(); // FLoat por defecto usa 2 decimales
            $table->longText('sinopsis');
            $table->integer('cantidad')->unsigned();
            $table->string('imagen')->default('not_found.png'); // Imagen por defecto en caso de no tenerla
            $table->timestamps();

            // Clave foránea
            $table->foreign('id_genero')->references('id')->on('generos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('peliculas');
    }
}
