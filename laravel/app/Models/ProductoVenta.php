<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProductoVenta extends Model
{
    protected $table = "producto_venta";

    use HasFactory;

    protected $fillable = [
        "venta_id",
        "producto_id",
        "cantidad",
    ];
    public function venta()
    {
        return $this->belongsTo(Venta::class);
    }
    public function producto()
    {
        return $this->belongsTo(Producto::class);
    }
}
