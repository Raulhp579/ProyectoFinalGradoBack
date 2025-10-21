<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Suscripcion extends Model
{
    use HasFactory;
    protected $table = "suscripcion";
    protected $primaryKey = "id";
    protected $fillable = [
        'id_tipo',
        'id_contrato',
        'mensualidad',
        "id_usuario"
    ];
}
