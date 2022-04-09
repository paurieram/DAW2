@extends('master')

@section('title','Agregar nuevo personaje')

@section('listado')
<form action="/personajes" method="post" class="">
    @csrf
    <label for="nombre">Nombre</label>
    <input type="text" name="nombre" id="nombre"><br>
    <label for="apellidos">Apellidos</label>
    <input type="text" name="apellidos" id="apellidos"><br>
    <label for="profesion">Profesion</label>
    <input type="text" name="profesion" id="profesion"><br>
    <input type="submit" value="Enviar">
</form>
@endsection
