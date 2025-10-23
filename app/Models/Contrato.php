<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contrato extends Model
{
    use HasFactory;
    protected $table ="contrato";
    protected $primaryKey ="id";

    protected $fillable = [
        "id_usuario",
        "fecha_inicio",
        "fecha_fin",
        "descripcion"
    ];

    public function contratosProducto(){
        return $this->hasMany(ContratoProducto::class,"id_contrato","id");
    }

    public function usuario(){
        return $this->belongsTo(User::class,"id_usuario","id");
    }

    public function suscripcion(){
        return $this->hasOne(Suscripcion::class,"id_contrato","id");
    }

}
