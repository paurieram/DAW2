@extends('master')

@section('title','Agregar nuevo pais')

@section('listado')
<style>
    tr,td{
        border: solid 1px black;
        padding: 5px;
    }
</style>
<table>
    <tr>
        <td>Nom Pais</td>
        <td>{{$request->nom}}</td>
    </tr>
    <tr>
        <td>Nom Capital</td>
        <td>{{$request->capital}}</td>
    </tr>
    <tr>
        <td>Superficie</td>
        <td>{{$request->superficie}}</td>
    </tr>
    <tr>
        <td>Habitants</td>
        <td>{{$request->habitants}}</td>
    </tr>
    <tr>
        <td>Densitat de poblacio</td>
        <td>{{$request->density}}</td>
    </tr>
</table>
@endsection
