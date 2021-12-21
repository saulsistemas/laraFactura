<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductoStoreRequest;
use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductoController extends Controller
{
  
    public function index(Request $request)
    {
        $texto=trim($request->get('texto'));
        #$productos = Producto::latest('id')->paginate(4);
        $productos = Producto::where('nombre','LIKE','%'.$texto .'%')
                    ->orWhere('precio','LIKE','%'.$texto .'%')
                    ->latest('id')
                    ->paginate(4);
        return view('admin.productos.index',compact('productos','texto'));
    }

  
    public function create()
    {
        #$producto = New Producto();
        return view('admin.productos.create');
    }

   
    public function store(ProductoStoreRequest $request)
    {
        $data = $request->all();
        if ($request->has('image')) {
            $image_path = $request->file('image')->store('medias');
            $data['image_url'] = $image_path;
        }
        Producto::create($data);
        return redirect()->route('admin.productos.index')->with([
            'status'=>'success',
            'color'=>'green',
            'message'=>'Producto creado corectamete']);
    }

  
    public function show(Producto $producto)
    {
        //
    }

   
    public function edit(Producto $producto)
    {
        return view('admin.productos.create',compact('producto'));
    }

   
    public function update(Request $request, Producto $producto)
    {
        $data = $request->all();
        if ($request->has('image')) {
            Storage::delete($producto->image_url);
            $image_path = $request->file('image')->store('medias');
            $data['image_url'] = $image_path;
        }
        $producto->fill($data);  
        $producto->save(); 
        return redirect()->route('admin.productos.index')->with([
            'status'=>'success',
            'color'=>'green',
            'message'=>'Producto actualizado corectamete']);
    }

  
    public function destroy(Producto $producto)
    {
        $producto->delete();
        return redirect()->route('admin.productos.index')->with([
            'status'=>'success',
            'color'=>'red',
            'message'=>'Producto Eliminado corectamete']);
    }
}
