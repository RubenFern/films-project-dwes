<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MainController extends Controller
{
    public function index()
    {
        if (Auth::user())
        {
            // En el controlador de home compruebo si es admin o el usuario para mostarles su respectivo home
            return redirect()->route('home');
        } else
        {
            return view('welcome');
        }
        
    }
}
