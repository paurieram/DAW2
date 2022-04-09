@extends('master')

@section('titulo', 'Modificar categoria')
 
@section('contenido')
    <div class="col-6 offset-3">
        <form method="post" action="/categoria/{{$categoria->id}}">
            @method('PUT')
            @csrf
            <div class="mb-3 px-5">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="nombre" name="nombre" value="{{$categoria->nombre}}">
            </div>
            <div class="mb-3 px-5 text-end">
                <button type="submit" class="btn btn-success">Enviar</button>
            </div>        
        </form>
    </div>
@endsection