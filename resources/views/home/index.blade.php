@extends('layouts.app-master')

@section('content')


<h1 class="container">Home</h1>
@auth
<p>Bienvenido {{auth()->user()->name ?? auth()->user()->username}} estas autenticado</p>
           
<p> <a href="/logout">Logout</a></p>
@endauth

@guest
<p>Para ver el contenido<a href="/login">Iniciar sesion</a></p>

@endguest
@endsection