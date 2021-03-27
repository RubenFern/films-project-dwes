<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PeliculaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        // Compruebo que los campos del formulario estén correctos
        return [
            'id_genero' => 'required',
            'titulo' => 'required',
            'director' => 'required',
            'año' => ['required', 'regex:/^(19|20)\d{2}$/'],
            'precio' => 'required|numeric|between:2.99,49.99',
            'sinopsis' => 'required',
            'cantidad' => 'required|numeric|min:1',
            'imagen' => 'required'
        ];
    }

    // Mensajes de error
    public function messages()
    {
        return [
            'titulo.required' => 'Debes introducir el título de la película',
            'director.required' => 'Debes introducir el nombre del director',
            'año.required' => 'Debes introducir el año de la película',
            'año.regex' => 'El año debe ser válido',
            'precio.required' => 'Debes introducir el precio de la película',
            'precio.numeric' => 'El precio debe ser un número',
            'precio.between' => 'El precio debe de ser como mínimo 2.99€ y como máximo 49.99€',
            'sinopsis.required' => 'Debes introducir una sinopsis de la película',
            'cantidad.required' => 'Debes introducir la cantidad de películas que hay',
            'cantidad.numeric' => 'La cantidad debe de ser un número',
            'cantidad.min' => 'La cantidad mínima es de 1 unidad',
            'imagen.required' => 'Debes seleccionar una imagen'
        ];
    }
}
