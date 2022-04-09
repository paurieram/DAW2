@extends('master')

@section('title','Listado personajes')

@section('listado')
    @if (count($personajes) >= 1)
        <table class="table">
            <tr>
                <th>Nombre</th>
                <th>Apellidos</th>
                <th>Profesion</th>
            </tr>
            @foreach ($personajes as $personaje)
                <tr>
                    <td href="/personajes/{{ $personaje->id }}">{{ $personaje->nombre }}</td>
                    <td href="/personajes/{{ $personaje->id }}">{{ $personaje->apellidos }}</td>
                    <td href="/personajes/{{ $personaje->id }}">{{ $personaje->profesion }}</td>
                    <td>
                        <a class="btn btn-success" href="/personajes/{{ $personaje->id }}">Detalles</a>
                    </td>
                    <td>
                        <a class="btn btn-primary" href="/personajes/{{ $personaje->id }}/edit">Editar</action>
                    </td>
                    <td>
                        <form action="/personajes/{{ $personaje->id }}" method="post">
                            @method("DELETE")
                            @csrf
                            <button type="submit" class="btn btn-danger">Eliminar</a>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
    @else
        <a href="/personajes"></a>No hay personajes</a>
    @endif
@endsection