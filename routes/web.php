<?php

use App\Http\Controllers\HomeController;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

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
Route::get('peliculas/{pelicula}/editar', [PeliculaController::class, 'edit'])->name('peliculas.edit');
// Uso el método match porque para actualizar existen 2 métodos
Route::match(['put', 'patch'], 'peliculas/{pelicula}', [PeliculaController::class, 'update'])->name('peliculas.update'); 

/**** Ruta para eliminar una película ****/
Route::delete('peliculas/{pelicula}', [PeliculaController::class, 'destroy'])->name('peliculas.destroy');

/*
|--------------------------------------------------------------------------
|  Rutas de los Géneros
|--------------------------------------------------------------------------
*/


/*
|--------------------------------------------------------------------------
|  Rutas para alquilar
|--------------------------------------------------------------------------
*/