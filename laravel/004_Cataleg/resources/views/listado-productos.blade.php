@extends('master')

@section('titulo', 'Listado de productos')
 
@section('contenido')
    <a role="button" href="/producto/create" class="btn btn-primary offset-8 col-1 mb-2">Nuevo</a>
    @if (count($productos) > 0)
        <div class="col-6 offset-3">
            <table class="table table-striped">
                <tbody>
                    <th>Nombre</th><th>categoria</th><th></th><th></th><th></th>
                    @foreach ($productos as $producto)
                        <tr>
                            <td class="w-100">{{$producto->nombre}}</td>
                            <td class="w-100">{{$producto->categoria->nombre}}</td>
                            <td>
                                <a class="btn btn-outline-success" role="button" href="/producto/{{$producto->id}}">Detalles</a>
                            </td>
                            <td>
                                <a class="btn btn-outline-primary" role="button" href="/producto/{{$producto->id}}/edit">Editar</a>
                            </td>
                            <td>
                                <form action="/producto/{{$producto->id}}" method="post">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="btn btn-outline-danger">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        <div class="col-6 offset-3">
            <div class="alert alert-danger" role="alert">
                No hay productos
            </div>
        </div>
    @endif
@endsection