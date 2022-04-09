@extends('master')

@section('title','Analisis del número '.$nums->num)

@section('content')
    <b><div>Divisible entre 2: {{$nums->divi2}}</div></b>
    <b><div>Divisible entre 3: {{$nums->divi3}}</div></b>
    <b><div>Divisible entre 5: {{$nums->divi5}}</div></b>
    <b><div class="mb-4">Raiz quadrada: {{$nums->divi6}}</div></b>
    @foreach ($nums->table as $val)
        <li>{{$val}}</li>
    @endforeach
@endsection


