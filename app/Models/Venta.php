<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    use HasFactory;
    protected $fillable=['serie','estado','cliente_id'];
    public function cliente(){
        #relacion de uno a muchos(inversa)
        return $this->belongsTo(Cliente::class);
    }
    #relacion uno a muchos
    public function ventadetalles(){
        return $this->hasMany(VentaDetalle::class);
    }
}
