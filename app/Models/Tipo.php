<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tipo extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = "tipo_suscripcion";
    protected $primaryKey = "id";
    protected $fillable = [
        'nombre',
        'precio',
        'descripcion',
        "imagen"
    ];


    // 1 : N  (un Tipo tiene muchas Suscripciones)
    public function suscripciones()
    {
     return $this->hasMany(Suscripcion::class, 'id_tipo', 'id');
    }
 
    // (opcional) castear precio si quieres 2 decimales
    protected $casts = [
     'precio' => 'decimal:2',
    ];
}
