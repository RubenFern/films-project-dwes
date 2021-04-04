<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\GeneroController;
use App\Http\Controllers\PeliculaController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/
// Ruta principal (nombre_app/admin)
Route::get('/', [AdminController::class, 'index'])->name('admin.index');

/*
|--------------------------------------------------------------------------
|  Rutas de las Películas
|--------------------------------------------------------------------------
*/
/**** Rutas para añadir películas ****/
Route::get('peliculas/añadir', [PeliculaController::class, 'create'])->name('peliculas.create');
Route::post('peliculas', [PeliculaController::class, 'store'])->name('peliculas.store');

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
Route::get('generos/añadir', [GeneroController::class, 'create'])->name('generos.create');
Route::post('generos', [GeneroController::class, 'store'])->name('generos.store');

Route::get('generos/{genero}/editar', [GeneroController::class, 'edit'])->name('generos.edit'); 
Route::match(['put', 'patch'], 'generos/{genero}', [GeneroController::class, 'update'])->name('generos.update');

Route::delete('generos/{genero}', [GeneroController::class, 'destroy'])->name('generos.destroy');

/*
|--------------------------------------------------------------------------
|  Rutas de los Usuarios
|--------------------------------------------------------------------------
*/
Route::get('usuarios', [UserController::class, 'index'])->name('usuarios.index');
Route::get('usuarios/{usuario}', [UserController::class, 'show'])->name('usuarios.show');

Route::get('usuarios/{usuario}/editar', [UserController::class, 'edit'])->name('usuarios.edit');
Route::match(['put', 'patch'], 'usuarios/{usuario}', [UserController::class, 'update'])->name('usuarios.update');

Route::delete('usuarios/{usuario}', [UserController::class, 'destroy'])->name('usuarios.destroy');