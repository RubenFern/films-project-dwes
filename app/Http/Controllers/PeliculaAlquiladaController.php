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

    public function create($PeliculaAlquilada)
    {
        /**
         * Si existe el id de la película que se quiere alquilar se llama al método store
         * desde el formulario de confirmación de la vista create. Store se encarga de 
         * insertar la película alquilada en la base de datos
         */

        // Si no existe la película por el id manda un error 404
        $PeliculaAlquilada = Pelicula::findOrFail($PeliculaAlquilada); 

        return view('peliculas-alquiladas.create', compact('PeliculaAlquilada'));
    }

    public function store($PeliculaAlquilada)
    {
        /**
         * Saco un error flash de sesión si el usuario quiere alquilar una película
         * que ya tenga alquilada
         */
        $comprobarAlquiler = PeliculaAlquilada::where('id_pelicula', $PeliculaAlquilada)->where('devuelta', false)->count();

        if ($comprobarAlquiler > 0)
        {
            return redirect()->back()
                    ->withInput(request()->all())
                    ->withErrors('Ya tienes alquilada esta película');
        } else {
            /**
             * Si no está alquilada la inserto en la BD y creo un mensaje de éxito
             */
            $PeliculaAlquilada = Pelicula::findOrFail($PeliculaAlquilada); 

            PeliculaAlquilada::create([
                'id_pelicula' => $PeliculaAlquilada->id,
                'id_user' => 1, // QUITAR EL ID POR DEFECTO DE 1
                'devuelta' => false
            ]);

            return redirect()
                    ->route('peliculas-alquiladas.create', ['pelicula' => $PeliculaAlquilada])
                    ->withSuccess('Has alquilado con éxito la película');
        }
    }

    // Proceso para devolver la película
    public function edit(PeliculaAlquilada $PeliculaAlquilada)
    {
        // Muestro un formulario de confirmación (Controlar que el usuario la tenga alquilada)
        return view('peliculas-alquiladas.edit', compact('PeliculaAlquilada'));
    }

    public function update(PeliculaAlquilada $PeliculaAlquilada)
    {
        // Cambio el valor del booleano devuelto a true
    }
}
