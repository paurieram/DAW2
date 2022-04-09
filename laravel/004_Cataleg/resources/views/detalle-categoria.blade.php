@extends('master')

@section('titulo', $categoria->nombre)
 
@section('contenido')
    <div class="col-6 offset-3">
        <table class="table table-striped">
            <tbody>
                <tr>
                    <th class="w-50">Nombre</th>
                    <td class="w-50">{{$categoria->nombre}}</td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="col-6 offset-3">
        <h3>Productos</h3>
        <table class="table table-striped">
            <tbody>
                @foreach ($categoria->productos as $producto)
                    <tr>
                        <td class="w-100">{{$producto->nombre}}</td><td>{{$producto->precio}}</td><td>({{$producto->stock}})</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection