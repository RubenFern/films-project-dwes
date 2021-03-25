<?php

use App\Http\Controllers\GeneroController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\PeliculaAlquiladaController;
use App\Http\Controllers\PeliculaController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Auth::routes();

Route::get('/', [MainController::class, 'index']);
Route::get('/home', [HomeController::class, 'index'])->name('home');

/*
|--------------------------------------------------------------------------
|  Rutas de las Películas
|--------------------------------------------------------------------------
*/
Route::get('peliculas', [PeliculaController::class, 'index'])->name('peliculas.index');

/**** Rutas para añadir películas ****/
Route::get('peliculas/añadir', [PeliculaController::class, 'create'])->name('peliculas.create'); // admin
Route::post('peliculas', [PeliculaController::class, 'store'])->name('peliculas.store'); // admin

Route::get('peliculas/{pelicula}', [PeliculaController::class, 'show'])->name('peliculas.show');

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
Route::get('generos', [GeneroController::class, 'index'])->name('generos.index');

Route::get('generos/añadir', [GeneroController::class, 'create'])->name('generos.create'); // admin
Route::post('generos', [GeneroController::class, 'store'])->name('generos.store'); // admin

Route::get('generos/{genero}', [GeneroController::class, 'show'])->name('generos.show');

Route::get('generos/{genero}/editar', [GeneroController::class, 'edit'])->name('generos.edit'); // admin
Route::match(['put', 'patch'], 'generos/{genero}', [GeneroController::class, 'update'])->name('generos.update'); // admin

Route::delete('generos/{genero}', [GeneroController::class, 'destroy'])->name('generos.destroy'); // admin

/*
|--------------------------------------------------------------------------
|  Ruta para visulizar las películas alquiladas
|--------------------------------------------------------------------------
*/
Route::get('peliculas-alquiladas', [PeliculaAlquiladaController::class, 'index'])->name('peliculas-alquiladas.index');

Route::get('peliculas-alquiladas/añadir', [PeliculaAlquiladaController::class, 'create'])->name('peliculas-alquiladas.create');
Route::post('peliculas-alquiladas', [PeliculaAlquiladaController::class, 'store'])->name('peliculas-alquiladas.store');

Route::delete('peliculas-alquiladas/{pelicula-alquilada}', [PeliculaAlquiladaController::class, 'destroy'])->name('peliculas-alquiladas.destroy');