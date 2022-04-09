@extends('master')

@section('titulo', 'Modificar producto')
 
@section('contenido')
    <div class="col-6 offset-3">
        <form method="post" action="/producto/{{$productos->id}}">
            @method('PUT')
            @csrf
            <div class="mb-3 px-5">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="nombre" name="nombre" value="{{$productos->nombre}}">
            </div>
            <div class="mb-3 px-5">
                <label for="capital" class="form-label">Precio</label>
                <input type="text" class="form-control" id="precio" name="precio" value="{{$productos->precio}}">
            </div>
            <div class="mb-3 px-5">
                <label for="superficie" class="form-label">Stock</label>
                <input type="text" class="form-control" id="stock" name="stock" value="{{$productos->stock}}">
            </div>
            <div class="mb-3 px-5">
                <label for="categoria_id" class="form-label">Categoria</label>
                <select class="form-select" id="categoria_id" name="categoria_id">
                    <option selected>Selecciona un país</option>
                    @foreach ($categorias as $categoria)
                        <option value="{{$categoria->id}}"{{$productos->categoria->id === $categoria->id ? ' selected' : ''}}>{{$categoria->nombre}}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3 px-5 text-end">
                <button type="submit" class="btn btn-success">Enviar</button>
            </div>        
        </form>
    </div>
@endsection