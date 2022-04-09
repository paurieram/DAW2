@extends('master')

@section('title','Listado')

@section('listado')
<ul>
    @if (count($paisos) > 1)
        @foreach ($paisos as $pais)
            <li><a href="/pais/{{ $pais }}">{{ $pais }}</a></li>
        @endforeach
    @else
        <li><a href="/listado"></a>No hay paises</a></li>
    @endif

</ul>
@endsection