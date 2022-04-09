@extends('master')

@section('title','Listado')

@section('listado')
    @if (count($paises) >= 1)
        <table class="table">
            <tr>
                <th>Nombre</th>
                <th>Capital</th>
                <th>Superficie</th>
                <th>Poblacion</th>
            </tr>
            @foreach ($paises as $pais)
                <tr>
                    <td href="/paises/{{ $pais->id }}">{{ $pais->nombre }}</td>
                    <td href="/paises/{{ $pais->id }}">{{ $pais->capital }}</td>
                    <td href="/paises/{{ $pais->id }}">{{ $pais->superficie }}</td>
                    <td href="/paises/{{ $pais->id }}">{{ $pais->poblacion }}</td>
                    <td>
                        <a class="btn btn-success" href="/paises/{{ $pais->id }}">Detalles</a>
                    </td>
                    <td>
                        <a class="btn btn-primary" href="/paises/{{ $pais->id }}/edit">Editar</action>
                    </td>
                    <td>
                        <form action="/paises/{{ $pais->id }}" method="post">
                            @method("DELETE")
                            @csrf
                            <button type="submit" class="btn btn-danger">Eliminar</a>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
    @else
        <a href="/paises"></a>No hay paises</a>
    @endif
@endsection