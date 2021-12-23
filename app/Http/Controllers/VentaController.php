<?php

namespace App\Http\Controllers;

use App\Http\Requests\VentaStoreRequest;
use App\Models\Cliente;
use App\Models\Venta;
use App\Models\VentaDetalle;
use Illuminate\Http\Request;

class VentaController extends Controller
{
  
    public function index(Request $request)
    {
        $texto=trim($request->get('texto'));
        $ventas = Venta::where('serie','LIKE','%'.$texto .'%')
                    ->orWhere('estado','LIKE','%'.$texto .'%')
                    ->latest('id')
                    ->paginate(4);
        return view('admin.ventas.index',compact('ventas','texto'));
    }

   
    public function create()
    {
        $clientes = Cliente::all();
        return view('admin.ventas.create',compact('clientes'));
    }

  
    public function store(VentaStoreRequest $request)
    {
        $venta = Venta::create($request->all());
        return redirect()->route('admin.ventas.add_products',$venta)->with([
            'status'=>'success',
            'color'=>'green',
            'message'=>'Venta creado corectamete']);
    }

    
    public function show(Venta $venta)
    {
        //
    }

   
    public function edit(Venta $venta)
    {
        $clientes = Cliente::all();
        return view('admin.ventas.create',compact('clientes','venta'));
    }

   
    public function update(Request $request, Venta $venta)
    {
        #return 'editra';
        $venta->fill($request->all());
        $venta->save();
        return redirect()->route('admin.ventas.index')->with(['status' => 'Success', 'color' => 'blue', 'message' => 'Product updated successfully']);
    }

    
    public function destroy(Venta $venta)
    {
        #return $venta;
        #try {
            $venta->delete();
            $venta->ventadetalles()->delete();
            #return $VentaDetalle= VentaDetalle::where('venta_id',$venta->id)->get();
        #    $result = ['status' => 'success', 'color' => 'green', 'message' => 'Deleted successfully'];
        #} catch (\Exception $e) {
        #    $result = ['status' => 'error', 'color' => 'red', 'message' => 'venta cannot be delete'];
        #}
        return redirect()->route('admin.ventas.index');#->with($result);
    }
    public function completeSend(Request $request, Venta $venta)
    {
        $details = VentaDetalle::with('producto')
            ->where('venta_id', $venta->id)
            ->get();

        #try {
        #    Mail::to($venta->buyer->email)
        #        ->queue(new ventaMail($venta, $details));
        #    $result = ['status' => 'success', 'color' => 'green', 'message' => 'Mail sent successfully'];
        #} catch (\Exception $e) {
        #    $result = ['status' => 'success', 'color' => 'green', 'message' => $e->getMessage()];
        #}

        $venta->estado = 'complete';
        $venta->save();

        return redirect()->route('admin.ventas.index');
    }    
}
