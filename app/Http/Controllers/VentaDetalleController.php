<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Venta;
use App\Models\VentaDetalle;
use Illuminate\Http\Request;

class VentaDetalleController extends Controller
{
    
    public function index()
    {
        //
    }

    
    public function create(Venta $venta)
    {
        $productos = Producto::all();
        $ventadetalle=VentaDetalle::where('venta_id',$venta->id)->get();
        return view('admin.ventas.createdetalle', compact('productos', 'venta', 'ventadetalle'));
    }

   
    public function store(Request $request)
    {
        $this->validate($request, [
            'venta_id' => 'required',
            'producto_id' => 'required',
            'cantidad' => 'required'
        ]);
        #return $request;
        $data = $request->only(['producto_id', 'venta_id', 'precio', 'cantidad']);
        if ($data['precio'] !== "") {
            $data['precio'] = Producto::find($data['producto_id'])->precio;
        }
        $data['total_producto'] = $data['precio'] * $data['cantidad'];
        VentaDetalle::create($data);
        return redirect()->route('admin.ventas.add_products',['venta' => $data['venta_id']])->with([
            'status'=>'success',
            'color'=>'green',
            'message'=>'Venta creado corectamete']);
    }

   
    public function show(VentaDetalle $ventaDetalle)
    {
        //
    }

    
    public function edit(VentaDetalle $ventaDetalle)
    {
        //
    }

    
    public function update(Request $request, VentaDetalle $ventaDetalle)
    {
        //
    }

    
    public function destroy(VentaDetalle $ventaDetalle)
    {
        //
    }
}
