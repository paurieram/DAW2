@extends('master')

@section('title','Agregar nuevo pais')

@section('listado')
<form action="/pais" method="post" class="">
    @csrf
    <label for="nom">Nom pais</label>
    <input type="text" name="nom" id="nom"><br>
    <label for="capital">Nom Capital</label>
    <input type="text" name="capital" id="capital"><br>
    <label for="superficie">Superficie</label>
    <input type="number" name="superficie" id="superficie"><br>
    <label for="habitants">Habitants</label>
    <input type="number" name="habitants" id="habitants"><br>
    <input type="submit" value="Enviar">
</form>
@endsection
