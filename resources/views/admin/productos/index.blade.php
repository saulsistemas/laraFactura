@extends('layouts.plantilla')
@section('contenido')
<hr>
<div class="row">
    <div class="col-md-6">
        <a href="{{ route('admin.productos.create') }}" class="btn btn-primary">Agregar Producto</a>
    </div>
    <div class="col-md-6">
        <form action="{{ route('admin.productos.index') }}" method="GET">
            <div class="btn-group ">
                <input type="text" name="texto" class="form-control">
                <button type="submit" class="btn btn-primary">
                    Enviar
                </button>
            </div>
        </form>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">NOMBRE</th>
                <th scope="col">IMAGEN</th>
                <th scope="col">PRECIO</th>
                <th scope="col">CREADO</th>
                <th scope="col">ACCIONES</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($productos as $producto)
                    <tr>
                        <td>{{$producto->id}}</td>
                        <td>{{$producto->nombre}}</td>
                        <td>
                            @if($producto->image_url)
                                <img src="{{$producto->image_url}}" class="img-circle" width="40px" height="40px">
                            @else 
                                <img src="https://cdn.pixabay.com/photo/2021/11/08/14/17/europe-6779227_960_720.jpg" class="img-circle" width="40px" height="40px">
                            @endif    
                        </td>
                        <td>{{$producto->precio}}</td>
                        <td>{{$producto->created_at}}</td>
                        <td class="btn-group">
                            <a href="{{ route('admin.productos.edit',$producto) }}" class="btn btn-warning ">
                                Editar
                            </a>
                            <form action="{{ route('admin.productos.destroy', $producto) }}" method="POST">
                                @csrf
                                @method('DELETE') 
                                <a href="{{ route('admin.productos.destroy',$producto) }}" class="btn btn-danger " onclick="event.preventDefault(); this.closest('form').submit();">
                                    Eliminar
                                </a>
                            </form>
                        </td>
                    </tr>  
                @endforeach


            </tbody>
          </table>
    </div>
    {!! $productos->appends(["texto" => $texto]) !!}
</div>
@endsection