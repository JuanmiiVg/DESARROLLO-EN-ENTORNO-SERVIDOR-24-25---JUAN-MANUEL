<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    protected $table = "clientes";
    
    protected $fillable = [
        "nombre",
        "email",
        "telefono",
        "dirección"
    ];
    public function mascotas()
    {
        return $this->hasMany(Mascota::class);
    }
    public function ventas()
    {
        return $this->hasMany(Venta::class);
    }
}
