<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Producto extends Model
{
     use HasFactory, SoftDeletes;

    protected $table = 'productos';
    protected $primaryKey = 'id';

    protected $fillable = [
        'id_categoria', 'nombre', 'descripcion', 'espacio',
        'instalacion', 'precio', 'imagen', 'cantidad',
    ];

    protected $casts = [
        'instalacion' => 'boolean',
        'precio'      => 'decimal:2',
        'espacio'     => 'decimal:2',
        'cantidad'    => 'integer',
    ];

    public function categoria(){
        return $this->belongsTo(Categoria::class, "id_categoria", "id");
    }

    public function contratoProducto(){
        return $this->hasMany(ContratoProducto::class, "id_producto", "id");
    }

    public function reviews(){
        return $this->hasMany(ProductoReview::class,'id_producto','id');
    }
}
