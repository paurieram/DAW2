@extends('master')

@section('titulo', $productos->nombre)
 
@section('contenido')
    <div class="col-6 offset-3">
        <table class="table table-striped">
            <tbody>
                <tr>
                    <th class="w-50">Precio</th>
                    <td class="w-50">{{$productos->precio}}</td>
                </tr>
                <tr>
                    <th class="w-50">Stock</th>
                    <td class="w-50">{{$productos->stock}}</td>
                </tr>
                <tr>
                    <th class="w-50">Categoria</th>
                    <td class="w-50">{{$productos->categoria->nombre}}</td>
                </tr>
                <tr>
                    <th class="w-100">Comentaris
                        <form action="/comentario" method="post" class="input-group mb-3">
                            @csrf
                            <input type="hidden" name="producte_id" value ="{{$productos->id}}">
                            <input name="mensage" id="mensage" type="text" class="form-control" placeholder="Comentario" required>
                            <div class="input-group-append">
                            <button class="btn btn-outline-secondary" type="submit" >Commentar</button>
                        </form>
                    </th>

                </div>
                </tr>
                <tr class="w-100">
                    <table>
                        @foreach ($productos->comentarios as $comentario)
                        <tr>
                            <td>{{$comentario->created_at}}: </td>
                            <td><b>{{$comentario->mensage}}</b></td>
                        </tr>
                        @endforeach
                    </table>
                </tr>
            </tbody>
        </table>
    </div>
@endsection