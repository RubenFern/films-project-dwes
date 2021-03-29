<?php

use App\Http\Controllers\GeneroController;
use App\Http\Controllers\PeliculaController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/

/*
|--------------------------------------------------------------------------
|  Rutas de las Películas
|--------------------------------------------------------------------------
*/
/**** Rutas para añadir películas ****/
Route::get('peliculas/añadir', [PeliculaController::class, 'create'])->name('peliculas.create'); // admin
Route::post('peliculas', [PeliculaController::class, 'store'])->name('peliculas.store'); // admin

/**** Rutas para editar películas ****/
Route::get('peliculas/{pelicula}/editar', [PeliculaController::class, 'edit'])->name('peliculas.edit'); // admin
// Uso el método match porque para actualizar existen 2 métodos
Route::match(['put', 'patch'], 'peliculas/{pelicula}', [PeliculaController::class, 'update'])->name('peliculas.update'); // admin

/**** Ruta para eliminar una película ****/
Route::delete('peliculas/{pelicula}', [PeliculaController::class, 'destroy'])->name('peliculas.destroy'); // admin

/*
|--------------------------------------------------------------------------
|  Rutas de los Géneros
|--------------------------------------------------------------------------
*/
Route::get('generos/añadir', [GeneroController::class, 'create'])->name('generos.create'); // admin
Route::post('generos', [GeneroController::class, 'store'])->name('generos.store'); // admin

Route::get('generos/{genero}/editar', [GeneroController::class, 'edit'])->name('generos.edit'); // admin
Route::match(['put', 'patch'], 'generos/{genero}', [GeneroController::class, 'update'])->name('generos.update'); // admin

Route::delete('generos/{genero}', [GeneroController::class, 'destroy'])->name('generos.destroy'); // admin