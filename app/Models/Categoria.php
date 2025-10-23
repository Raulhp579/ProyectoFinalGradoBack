<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Categoria extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'servicios';

    protected $fillable = [
        'id_categoria', 'nombre', 'descripcion',
        'precio', 'instalacion', 'periodicidad',
    ];

    protected $casts = [
        'instalacion' => 'boolean',
        'precio'      => 'decimal:2',
    ];


    //
}
