@extends('master')

@section('title','Editar personaje')

@section('listado')
<form action="/personajes/{{$personaje->id}}" method="post">
    @method('PUT')
    @csrf
    <label for="nombre">Nombre</label>
    <input type="text" name="nombre" id="nombre" value="{{$personaje->nombre}}"><br>
    <label for="apellidos">Apellidos</label>
    <input type="text" name="apellidos" id="apellidos" value="{{$personaje->apellidos}}"><br>
    <label for="profesion">Profesion</label>
    <input type="text" name="profesion" id="profesion" value="{{$personaje->profesion}}"><br>
    <input type="submit" value="Enviar">
</form>
@endsection
