@extends('master')

@section('title','Agregar nuevo pais')

@section('listado')
<form action="/paises" method="post" class="">
    @csrf
    <label for="nombre">Nom pais</label>
    <input type="text" name="nombre" id="nombre"><br>
    <label for="capital">Nom Capital</label>
    <input type="text" name="capital" id="capital"><br>
    <label for="superficie">Superficie</label>
    <input type="number" name="superficie" id="superficie"><br>
    <label for="poblacion">Població</label>
    <input type="number" name="poblacion" id="poblacion"><br>
    <input type="submit" value="Enviar">
</form>
@endsection
