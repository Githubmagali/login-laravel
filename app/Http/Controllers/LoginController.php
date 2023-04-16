<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; //clase para manejar autenticacion
use App\Http\Requests\LoginRequest;



class LoginController extends Controller
{ 
    //

    public function show(){
        if(Auth::check()){// valida si hay un usuario
            return redirect()->route('home.index');
        }
        return view('auth.login');
    }

public function login(LoginRequest $request){
 $credentials = $request->getCredentials(); //$credentials objtiene las credenciales contraseña y usuario

//Auth::validate va a validar las credenciales obtenidas en loginrequest. Aca si no existen los usuarios lo redirige al login
 if (!Auth::validate($credentials)); // !; si  el usuario es incorrecto lo redireccionamos
{ return redirect()->to('login')->withErrors('auth.failed');

}
//si pasa la validacion 
$user = Auth::getProvider()->retrieveByCredentials($credentials);
Auth::login($user);//si las credenciales pasan va a crear el usuario

return $this->authenticated($request, $user);//($request, $user) envia la solicitud

}
public function authenticated(Request $request, $user){
    return redirect('home.index');
}


}
