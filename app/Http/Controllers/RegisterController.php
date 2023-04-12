<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
use App\Models\User;

class RegisterController extends Controller
{
    //

    public function show(){
        return view('auth.rregister');
    }

    public function register(RegisterRequest $request){ //escribimos $request para poder atrapar los datos cuando hacemos 'submit'. Request es el objeto
//creamos un objeto que nos permita manipular la solicitud

$user= User::create($request->validated()); //metodo para crear el objeto .LLama las reglas de Request y permite crear el usuario. Si se cumple se ingresa un nvo usiario en la base de datos
return redirect('/login')->with('success', 'Account created successfully');
    }
}
