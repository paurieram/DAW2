@extends('master')

@section('title','Taductor')

@section('content')
    @foreach ($num as $n)
        <li>{{$n}}</li>
    @endforeach
@endsection