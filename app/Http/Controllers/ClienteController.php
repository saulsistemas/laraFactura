<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClienteStoreRequest;
use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    
    public function index(Request $request)
    {
        $texto=trim($request->get('texto'));
        $clientes = Cliente::where('ruc','LIKE','%'.$texto .'%')
                    ->orWhere('nombre','LIKE','%'.$texto .'%')
                    ->latest('id')
                    ->paginate(4);
        return view('admin.clientes.index',compact('clientes','texto'));
    }

    
    public function create()
    {
        return view('admin.clientes.create');
    }

   
    public function store(ClienteStoreRequest $request)
    {
        Cliente::create($request->all());
        return redirect()->route('admin.clientes.index')->with([
            'status'=>'success',
            'color'=>'green',
            'message'=>'cliente creado corectamete']);
    }

    
    public function show(Cliente $cliente)
    {
        //
    }

   
    public function edit(Cliente $cliente)
    {
        return view('admin.clientes.create',compact('cliente'));
    }

   
    public function update(ClienteStoreRequest $request, Cliente $cliente)
    {
        $cliente->fill($request->all());  
        $cliente->save(); 
        return redirect()->route('admin.clientes.index')->with([
            'status'=>'success',
            'color'=>'green',
            'message'=>'cliente actualizado corectamete']);
    }

    
    public function destroy(Cliente $cliente)
    {
        $cliente->delete();
        return redirect()->route('admin.clientes.index')->with([
            'status'=>'success',
            'color'=>'red',
            'message'=>'cliente Eliminado corectamete']);
    }
}
