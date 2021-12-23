@extends('layouts.plantilla')
@section('contenido')   
<div class="card">
    <div class="card-header">
        <a class="btn btn-primary" href="{{ route('admin.ventas.index') }}">
            Listado de Factura
        </a>
    </div>
    <div class="card-body">
        <table class="table">
            <thead>
                <th>ID</th>
                <th>SERIE</th>
                <th>CLIENTE</th>
                <th>ESTADO</th>
                <th>CREADO</th>
            </thead>
            <tbody>
               <tr>
                   <td>{{$venta->id}}</td>
                   <td>{{$venta->serie}}</td>
                   <td>{{$venta->cliente->nombre}}</td>
                   <td>{{$venta->estado}}</td>
                   <td>{{$venta->created_at}}</td>
               </tr>
            </tbody>
            

        </table>
    </div>
</div>
<div class="card">
    <div class="card-header">
        PRODUCTO
    </div>
    <div class="card-body">
        <form action="{{ route('admin.ventasdetalles.store') }}" method="POST">
            <input type="hidden" value="{{ $venta->id }}" name="venta_id">
            @csrf
            <div class="row">
                <div class="col-md-4">
                    <div class="mb-3">
                        <label class="form-label">Cliente</label>
                            <select name="producto_id" class="form-control">
                                <option value="">Choose one</option>
                                @foreach ($productos as $producto)
                                <option value="{{ $producto->id }}">{{ $producto->nombre }}</option>
                                @endforeach
                            </select>
            
                            @error('producto_id')
                            <span class=" form-text" >
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                    </div>                 
                </div>
                <div class="col-md-4">
                    <div class="mb-3">
                        <label class="form-label">Cantidad</label>
                            <input type="number" name="cantidad" id="cantidad" value="{{ old('cantidad') }}" class="form-control" >
                            @error('cantidad')
                            <span class=" form-text" >
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                    </div>                 
                </div>       
                <div class="col-md-4">
                    <div class="mb-3">
                        <label class="form-label">Precio</label>
                            <input type="number" name="precio" id="precio" value="{{ old('precio') }}" class="form-control" >
                            @error('precio')
                            <span class=" form-text" >
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                    </div>                 
                </div>                 
            </div>
            <div class="row">
                <div class="col-md-12">
                    <input type="submit" value="agregar" class="btn btn-success">
                </div>
            </div>
        </form>
    </div>
</div>
<div class="card">
    <div class="card-header">
        <h5>Listado de detalles</h5>
    </div>
    <div class="card-body">
        <table class="table">
            <thead>
                <th>ID</th>
                <th>PRODUCTO</th>
                <th>PRECIO</th>
                <th>CANTIDAD</th>
                <th>TOTAL</th>
            </thead>
            <tbody>
                @php
                $total= 0;
                @endphp
                @foreach ($ventadetalle as $item)
                    <tr>
                        <td>{{ str_pad($item->id, 4,0, STR_PAD_LEFT)  }}</td>
                        <td>{{$item->producto->nombre}}</td>
                        <td>{{$item->precio}}</td>
                        <td>{{$item->cantidad}}</td>
                        <td>{{$item->total_producto}}</td>
                    </tr>
                    @php
                    $total = $total + $item->total_producto;
                    @endphp    
               @endforeach
                    <tr>
                        <td colspan="4">
                            Total
                        </td>
                        <td>{{ $total }}</td>
                    </tr>
            </tbody>
            

        </table>
    </div>
    <div class="card-footer">
        <form method="POST" action="{{ route('admin.ventas.complete', ['venta'=> $venta->id]) }}">
            @csrf
            <a href="{{ route('admin.ventas.complete', ['venta'=> $venta->id]) }}" onclick="event.preventDefault();  this.closest('form').submit();"
                class="btn btn-success">
                {{ __('Complete and send') }}

            </a>
        </form>
    </div>
</div>
@endsection   