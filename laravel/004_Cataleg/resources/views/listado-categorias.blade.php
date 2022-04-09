@extends('master')

@section('titulo', 'Listado de categories')
 
@section('contenido')
    <a role="button" href="/categoria/create" class="btn btn-primary offset-8 col-1 mb-2">Nuevo</a>
    @if (count($categoria) > 0)
        <div class="col-6 offset-3">
            <table class="table table-striped">
                <tbody>
                    <th>Nombre</th><th></th><th></th><th></th>
                    @foreach ($categoria as $categorias)
                        <tr>
                            <td class="w-100">{{$categorias->nombre}}</td>
                            <!-- <td>
                                <a class="btn btn-outline-success" role="button" href="/categoria/{{$categorias->id}}">Detalles</a>
                            </td> -->
                            <td>
                                <a class="btn btn-outline-primary" role="button" href="/categoria/{{$categorias->id}}/edit">Editar</a>
                            </td>
                            <td>
                                <form action="/categoria/{{$categorias->id}}" method="post">
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
                No hay categorias
            </div>
        </div>
    @endif
@endsection