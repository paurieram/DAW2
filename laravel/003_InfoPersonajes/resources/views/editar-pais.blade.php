@extends('master')

@section('title','Editar pais')

@section('listado')
<form action="/paises/{{$pais->id}}" method="post">
    @method('PUT')
    @csrf
    <label for="nombre">Nom pais</label>
    <input type="text" name="nombre" id="nombre" value="{{$pais->nombre}}"><br>
    <label for="capital">Nom Capital</label>
    <input type="text" name="capital" id="capital" value="{{$pais->capital}}"><br>
    <label for="superficie">Superficie</label>
    <input type="number" name="superficie" id="superficie" value="{{$pais->superficie}}"><br>
    <label for="poblacion">Població</label>
    <input type="number" name="poblacion" id="poblacion" value="{{$pais->poblacion}}"><br>
    <input type="submit" value="Enviar">
</form>
@endsection
