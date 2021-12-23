<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VentaDetalle extends Model
{
    use HasFactory;
    protected $fillable = ['producto_id', 'venta_id', 'precio', 'cantidad', 'total_producto'];
    #relacion de uno a muchos(inversa)
    public function producto()
    {
        return $this->belongsTo(Producto::class);
    }

    #relacion de uno a muchos(inversa)
    public function venta()
    {
        return $this->belongsTo(Venta::class);
    }
}
