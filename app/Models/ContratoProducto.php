<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContratoProducto extends Model
{
    protected $table ="contrato_producto";
    protected $primaryKey ="id";

    protected $fillable = [
        "mensualidad",
        "id_producto",
        "id_contrato"
        
    ];
}
