@extends('layouts.plantilla')
@section('contenido')
<hr>
<div class="row">
    <div class="col-md-6">
        <a href="{{ route('admin.clientes.create') }}" class="btn btn-primary">Agregar cliente</a>
    </div>
    <div class="col-md-6">
        <form action="{{ route('admin.clientes.index') }}" method="GET">
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
                <th scope="col">RUC</th>
                <th scope="col">NOMBRE</th>
                <th scope="col">EMAIL</th>
                <th scope="col">CREADO</th>
                <th scope="col">ACCIONES</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($clientes as $cliente)
                    <tr>
                        <td>{{$cliente->id}}</td>
                        <td>{{$cliente->ruc}}</td>
                        <td>{{$cliente->nombre}}</td>
                        <td>{{$cliente->email}}</td>
                        <td>{{$cliente->created_at}}</td>
                        <td class="btn-group">
                            <a href="{{ route('admin.clientes.edit',$cliente) }}" class="btn btn-warning ">
                                Editar
                            </a>
                            <form action="{{ route('admin.clientes.destroy', $cliente) }}" method="POST">
                                @csrf
                                @method('DELETE') 
                                <a href="{{ route('admin.clientes.destroy',$cliente) }}" class="btn btn-danger " onclick="event.preventDefault(); this.closest('form').submit();">
                                    Eliminar
                                </a>
                            </form>
                        </td>
                    </tr>  
                @endforeach


            </tbody>
          </table>
    </div>
    {!! $clientes->appends(["texto" => $texto]) !!}
</div>
@endsection