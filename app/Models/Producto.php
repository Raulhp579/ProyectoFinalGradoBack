<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Producto extends Model
{
     use HasFactory, SoftDeletes;

    protected $table = 'productos';

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

    //
}
