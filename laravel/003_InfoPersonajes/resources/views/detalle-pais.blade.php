@extends('master')

@section('title','Detalle pais')

@section('listado')
    <table class="table">
        <tr>
            <th>Nombre</th>
            <th>Capital</th>
            <th>Superficie</th>
            <th>Poblacion</th>
            <th>Densidad</th>
        </tr>
        <tr>
            <td>{{$pais->nombre}}</td>
            <td>{{$pais->capital}}</td>
            <td>{{$pais->superficie}}</td>
            <td>{{$pais->poblacion}}</td>
            <td>{{$pais->densidad}}</td>
        </tr>
    </table>
@endsection
