<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Venta extends Model
{
    use HasFactory;

    protected $table = "ventas";

    protected $fillable = [
        "cliente_id",
        "fecha",
        "total",
    ];
    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }

    public function productos()
    {
        return $this->belongsToMany(Producto::class , 'producto_venta')->withPivot('cantidad');
    }
}
