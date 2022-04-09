@extends('master')

@section('title','Analizador de números')

@section('content')
    <form action="/analisis" method="post">
        @csrf
        <label for="num">Número a analizar</label>
        <input type="number" name="num" id="num">
        <input type="submit" value="Enviar">
    </form>
@endsection
