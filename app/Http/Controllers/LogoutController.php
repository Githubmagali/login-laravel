<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class LogoutController extends Controller
{
    //

    public function logout(){
        //flush nos permite actualizar el flujo de las sesiones liberar lo que se tenga que librar 
        Session::flush();
        
        Auth::logout();
return redirect()->to('/login');
    }
}
