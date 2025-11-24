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



    public function suscripciones()
    {
     return $this->hasMany(Suscripcion::class, 'id_tipo', 'id');
    }

    public function reseñas(){
        return $this->hasMany(SuscripcionReview::class,'id_tipo','id');
    }
 

    protected $casts = [
     'precio' => 'decimal:2',
    ];
}
