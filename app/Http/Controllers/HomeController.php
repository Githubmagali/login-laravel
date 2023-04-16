<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
 //public function __construct() //todo lo que este debajo va a sr exclusivo para los usuarios
    //{
       // $this->middleware('auth');
   // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        //si el usuario esta autenticado podemos 
        //Auh::user()->id; id o cualquier propiedad como password, email etc
       
        return view('home.index'); //vamos a tener acceso a esta vista solo si estamos autenticados mediante el __construct
    }
}
