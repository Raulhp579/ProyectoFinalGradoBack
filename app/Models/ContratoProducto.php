<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContratoProducto extends Model
{
    use HasFactory;
    protected $table ="contrato_producto";
    protected $primaryKey ="id";

    protected $fillable = [
        "mensualidad",
        "id_producto",
        "id_contrato"
        
    ];

    public function productos(){
        return $this->hasMany(Producto::class, "id_producto","id");
    }

    public function contrato(){
        return $this->belongsTo(Contrato::class,"id_contrato","id");
    }
}
