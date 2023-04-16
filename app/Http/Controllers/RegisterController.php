<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class RegisterController extends Controller
{
    //

    public function show(){
        return view('auth.register');
    }

    public function register(RegisterRequest $request){ //escribimos $request para poder atrapar los datos cuando hacemos 'submit'. Request es el objeto
//creamos un objeto que nos permita manipular la solicitud
$user= User::create($request->validated()); //metodo para crear el objeto .LLama las reglas de Request y permite crear el usuario. Si se cumple se ingresa un nvo usiario en la base de datos
auth()->login($user);
return redirect('/home')->with('success', 'Account created successfully');//with es el mensaje que le vamos a enviar
    }
}
