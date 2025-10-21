<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contrato extends Model
{
    protected $table ="contrato";
    protected $primaryKey ="id";

    protected $fillable = [
        "id_usuario",
        "fecha_inicio",
        "fecha_fin",
        "descripcion"
    ];
}
