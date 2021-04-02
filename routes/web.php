<?php

use App\Http\Controllers\GeneroController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\PeliculaAlquiladaController;
use App\Http\Controllers\PeliculaController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', [MainController::class, 'index'])->name('welcome');
Route::get('/home', [HomeController::class, 'index'])->name('home');

/*
|--------------------------------------------------------------------------
|  Rutas de las Películas
|--------------------------------------------------------------------------
*/
Route::get('peliculas', [PeliculaController::class, 'index'])->name('peliculas.index');
Route::get('peliculas/{pelicula}', [PeliculaController::class, 'show'])->name('peliculas.show');


/*
|--------------------------------------------------------------------------
|  Rutas de los Géneros
|--------------------------------------------------------------------------
*/
Route::get('generos', [GeneroController::class, 'index'])->name('generos.index');
Route::get('generos/{genero}', [GeneroController::class, 'show'])->name('generos.show');

/*
|--------------------------------------------------------------------------
|  Ruta para visulizar las películas alquiladas
|--------------------------------------------------------------------------
*/
Route::get('peliculas-alquiladas', [PeliculaAlquiladaController::class, 'index'])->name('peliculas-alquiladas.index');

// Uso la url de películas para controlar el id de la película que quiero alquilar
Route::get('peliculas/{pelicula}/alquilar', [PeliculaAlquiladaController::class, 'create'])->name('peliculas-alquiladas.create');
Route::post('peliculas/{pelicula}', [PeliculaAlquiladaController::class, 'store'])->name('peliculas-alquiladas.store');

Route::get('peliculas-alquiladas/{pelicula_alquilada}/devolver', [PeliculaAlquiladaController::class, 'edit'])->name('peliculas-alquiladas.edit');
Route::match(['put', 'patch'], 'peliculas_alquiladas/{pelicula-alquilada}', [PeliculaAlquiladaController::class, 'update'])->name('peliculas-alquiladas.update');