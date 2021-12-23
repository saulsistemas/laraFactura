@extends('layouts.plantilla')
@section('contenido')
<hr>
<div class="row">
    <div class="col-md-6">
        <a href="{{ route('admin.ventas.create') }}" class="btn btn-primary">Agregar venta</a>
    </div>
    <div class="col-md-6">
        <form action="{{ route('admin.ventas.index') }}" method="GET">
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
                <th scope="col">SERIE</th>
                <th scope="col">CLIENTE</th>
                <th scope="col">ESTADO</th>
                <th scope="col">CREADO</th>
                <th scope="col">ACCIONES</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($ventas as $venta)
                    <tr>
                        <td>{{$venta->id}}</td>
                        <td>{{$venta->serie}}</td>
                        <td>{{$venta->cliente->nombre}}</td>
                        <td>{{$venta->estado}}</td>
                        <td>{{$venta->created_at}}</td>
                        <td class="btn-group">
                            <a href="{{ route('admin.ventas.add_products',$venta) }}" class="btn btn-warning ">
                                +
                            </a>
                            <a href="{{ route('admin.ventas.edit',$venta) }}" class="btn btn-primary ">
                                Editar
                            </a>
                            <form action="{{ route('admin.ventas.destroy', $venta) }}" method="POST">
                                @csrf
                                @method('DELETE') 
                                <a href="{{ route('admin.ventas.destroy',$venta) }}" class="btn btn-danger " onclick="event.preventDefault(); this.closest('form').submit();">
                                    Eliminar
                                </a>
                            </form>
                        </td>
                    </tr>  
                @endforeach


            </tbody>
          </table>
    </div>
    {!! $ventas->appends(["texto" => $texto]) !!}
</div>
@endsection