@extends('layouts.plantilla')
@section('contenido')   
<hr> 
    <form @if(isset($cliente))
            {{-- action="{{ route('clientes.update', ["cliente" => $cliente->id ]) }}" @else --}}
            action="{{ route('admin.clientes.update', $cliente) }}" @else
            action="{{ route('admin.clientes.store') }}" @endif enctype="multipart/form-data" method="POST">
            {{-- @if($cliente->id) {{ method_field("PUT") }} @endif --}}
            @if(isset($cliente)) {{ method_field("PUT") }} @endif
        @csrf
        <div class="mb-3">
            <label class="form-label">Ruc</label>
            <input type="number" name="ruc" id="ruc" value="{{ isset($cliente) ? old('ruc',$cliente->ruc) : '' }}" class="form-control" >
                @error('ruc')
                <span class=" form-text" >
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
        </div>
        <div class="mb-3">
            <label class="form-label">Nombre</label>
            <input type="text" name="nombre" id="nombre" value="{{ isset($cliente) ? old('nombre',$cliente->nombre) : '' }}" class="form-control" >
                @error('nombre')
                <span class=" form-text" >
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
        </div>
        <div class="mb-3">
            <label class="form-label">email</label>
            <input type="email" name="email" id="email" value="{{ isset($cliente) ? old('email',$cliente->email) : '' }}" class="form-control" >
                @error('email')
                <span class=" form-text" >
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
        </div>
        
        <button type="submit" class="btn btn-success">Submit</button>
    
    </form>
@endsection    