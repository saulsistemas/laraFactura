@extends('layouts.plantilla')
@section('contenido')   
<hr> 
    <form @if(isset($venta))
            {{-- action="{{ route('ventas.update', ["venta" => $venta->id ]) }}" @else --}}
            action="{{ route('admin.ventas.update', $venta) }}" @else
            action="{{ route('admin.ventas.store') }}" @endif enctype="multipart/form-data" method="POST">
            {{-- @if($venta->id) {{ method_field("PUT") }} @endif --}}
            @if(isset($venta)) {{ method_field("PUT") }} @endif
        @csrf
        <div class="mb-3">
            <label class="form-label">Cliente</label>

                <select name="cliente_id" class="form-control">
                    <option value="">Choose one</option>
                    @foreach ($clientes as $cliente)
                    <option value="{{ $cliente->id }}">{{ $cliente->nombre }}</option>
                    @endforeach
                </select>

                @error('cliente_id')
                <span class=" form-text" >
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
        </div>        
        <div class="mb-3">
            <label class="form-label">Serie</label>
            <select name="serie" class="form-control">
                <option value="">Choose one</option>
                <option value="A">A</option>
                <option value="B">B</option>
                <option value="C">C</option>
            </select>   
                @error('serie')
                <span class=" form-text" >
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
        </div>
      
        
        <button type="submit" class="btn btn-success">Submit</button>
    
    </form>
@endsection    