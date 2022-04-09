@extends('master')

@section('title','Calculadora')

@section('content')
<form method="post">
    @csrf
    <label for="num1">Num 1</label>
    @if (isset($res->num1))
        <input type="number" name="num1" id="num1" value="{{$res->num1}}">
    @else
        <input type="number" name="num1" id="num1" value="">
    @endif<br>
    <label for="num2">Num 2</label>
    @if (isset($res->num1))
        <input type="number" name="num2" id="num2" value="{{$res->num2}}"><br>
    @else
        <input type="number" name="num2" id="num2"><br>
    @endif<br>
    <span>
    @if (isset($res->res))
        {{$res->res}}
    @endif
    </span><br>
    <input type="submit" formaction="/calculadora/suma" value="SUMA">
    <input type="submit" formaction="/calculadora/resta" value="RESTA">
    <input type="submit" formaction="/calculadora/multiplicacion" value="MULTIP">
    <input type="submit" formaction="/calculadora/division" value="DIVISIÓ">
</form>
@endsection
