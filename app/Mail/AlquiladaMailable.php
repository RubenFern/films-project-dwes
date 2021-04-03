<?php

namespace App\Mail;

use App\Models\PeliculaAlquilada;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Auth;

class AlquiladaMailable extends Mailable
{
    use Queueable, SerializesModels;
    
    public $subject = "Has alquilado una película";

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        // Mnado la información de la película alquilada
        $peliculaAlquilada = PeliculaAlquilada::orderBy('fecha_alquiler', 'DESC')->first();
        $usuario = Auth::user();

        return $this->view('emails.pelicula-alquilada', compact('peliculaAlquilada', 'usuario'));
    }
}
