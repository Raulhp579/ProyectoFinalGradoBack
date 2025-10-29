<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ContratoProducto extends Model
{
    use HasFactory, SoftDeletes;
    protected $table ="contrato_producto";
    protected $primaryKey ="id";

    protected $fillable = [
        "mensualidad",
        "id_producto",
        "id_contrato"
        
    ];

    public function producto(){
        return $this->hasOne(Producto::class, "id","id_producto"); /////preguntar a javiP
    }

    public function contrato(){
        return $this->belongsTo(Contrato::class,"id_contrato","id");
    }

}
