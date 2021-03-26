<?php

namespace App\Http\Controllers;

use App\Models\Pelicula;
use App\Models\PeliculaAlquilada;
use Illuminate\Http\Request;

class PeliculaAlquiladaController extends Controller
{
    public function __construct()
    {
        // En caso de entrar a alquilar una película y no estar logeado. 
        // Te redirige al login, inicias sesión y vuelve a la vista de alquiler
        $this->middleware('auth');
    }

    /**
    * Sólo creo los métodos para visualizar las películas alquiladas. Para añadirla y 
    * para borrarla
    */ 
    public function index()
    {
        $peliculasAlquiladas = PeliculaAlquilada::all();

        return view('peliculas-alquiladas.index', compact('peliculasAlquiladas'));
    }

    public function create($id)
    {
        /**
         * Si existe el id de la película que se quiere alquilar se llama al método store
         * desde el formulario de confirmación de la vista create. Store se encarga de 
         * insertar la película alquilada en la base de datos
         */
        $idPelicula = Pelicula::findOrFail($id);

        return view('peliculas-alquiladas.create', compact('idPelicula'));
    }
    public function store($idPelicula)
    {
        /**
         * Saco un error flash de sesión si el usuario quiere alquilar una película
         * que ya tenga alquilada
         */  
        $comprobarAlquiler = PeliculaAlquilada::where('id_pelicula', $idPelicula)->where('devuelta', false)->count();

        if ($comprobarAlquiler > 0)
        {
            session()->flash('ya_alquilada', 'Ya tienes alquilada esta película');

            return redirect()->back();
        } else {
            PeliculaAlquilada::create([
                'id_pelicula' => $idPelicula,
                'id_user' => 1,
                'devuelta' => false
            ]);

            return redirect()->route('peliculas-alquiladas.index');
        }
    }

    // Proceso para devolver la película
    public function edit($id)
    {
        // Muestro un formulario de confirmación (Controlar que el usuario la tenga alquilada)
        return view('peliculas-alquiladas.edit', compact('id'));
    }
    public function update($id)
    {
        // Cambio el valor del booleano devuelto a true
    }
}
