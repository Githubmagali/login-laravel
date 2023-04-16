<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Factory as ValidationFactory;//Factory es un contrato o una interfase que nos permite entrar a un modulo de validacion

class LoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'username'=>'required',
            'password'=>'required',
        ];
    }
    public function getCredentials(){
        $username = $this->get('username'); 

        if($this->isEmail($username)){ //si es correo

            return [
            'email'=> $username, //email pasa a ser username
            'password'=> $this->get('password')
        ];

        }
          return $this->only('username', 'password'); //si lo anterior no se cumple. ONLY regresa los parametros no hay forma de avanzar
    }
    //public function isEmail ; regla de valor
//isEmail tiene que devolver un valor boleano para saber si un valor es un correo electronico o no
    public function isEmail($value){ //por si el usuario quiere ingresar por correo electronico
$factory = $this->container->make(ValidationFactory::class);//ValidationFactory nos permite acceder a un modulo de validacion

return !$factory->make(['username' => $value], ['username'=>'email'])->fails();//el metodo make me devuelve un objeto de tipo validation, que este tiene un metodo 'fails'
    } //fails va a avisar que no es un correo electronico si es falso 'username' => valor; asignacion del valor. ['username'=>'email']; valida que el usename se igual a un correo
}
