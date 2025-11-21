<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Suscripcion extends Model
{
    use HasFactory,SoftDeletes;

    protected $table = 'suscripcion';  
    protected $primaryKey = 'id';

    protected $fillable = ['id_tipo','id_contrato','mensualidad'];


    public function tipo()
    {
        return $this->belongsTo(Tipo::class, 'id_tipo', 'id');
    }


    public function usuario()
    {
        return $this->hasOne(User::class, 'id_suscripcion', 'id'); //probar cuando se termine usuario
    }



    // castear campos
    protected $casts = [
        
        'mensualidad' => 'decimal:2',
    ];
}