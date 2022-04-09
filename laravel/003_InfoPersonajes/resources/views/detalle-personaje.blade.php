@extends('master')

@section('title','Detalle personaje')

@section('listado')
    <table class="table">
        <tr>
            <th>Nombre</th>
            <th>Apellidos</th>
            <th>Profesion</th>
        </tr>
        <tr>
            <td>{{$personaje->nombre}}</td>
            <td>{{$personaje->apellidos}}</td>
            <td>{{$personaje->profesion}}</td>
        </tr>
    </table>
@endsection
