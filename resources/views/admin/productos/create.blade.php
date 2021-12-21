@extends('layouts.plantilla')
@section('contenido')   
<hr> 
    <form @if(isset($producto))
            {{-- action="{{ route('productos.update', ["producto" => $producto->id ]) }}" @else --}}
            action="{{ route('admin.productos.update', $producto) }}" @else
            action="{{ route('admin.productos.store') }}" @endif enctype="multipart/form-data" method="POST">
            {{-- @if($producto->id) {{ method_field("PUT") }} @endif --}}
            @if(isset($producto)) {{ method_field("PUT") }} @endif
        @csrf
        <div class="mb-3">
            <label class="form-label">Nombre</label>
            <input type="text" name="nombre" id="nombre" value="{{ isset($producto) ? old('nombre',$producto->nombre) : '' }}" class="form-control" >
                @error('nombre')
                <span class=" form-text" >
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
        </div>
        <div class="mb-3">
            <label class="form-label">Precio</label>
            <input type="number" name="precio" id="precio" value="{{ isset($producto) ? old('precio',$producto->precio) : '' }}" class="form-control" >
                @error('precio')
                <span class=" form-text" >
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
        </div>
        <div class="mb-3">
            <label class="form-label">Imagen</label>
            @if(isset($producto))
                <img class="w-20" src="{{ asset("$producto->image_url") }}" /> 
            @endif
            <input id="image" name="image" type="file" class="sr-only">
                @error('image')
                <span class=" form-text" >
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
        </div>
        <button type="submit" class="btn btn-success">Submit</button>
    
    </form>
@endsection    