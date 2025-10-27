<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Suscripcion extends Model
{
    use HasFactory;

    protected $table = 'suscripcion';  
    protected $primaryKey = 'id';

    protected $fillable = ['id_tipo','id_contrato','mensualidad','id_usuario'];

    // N:1 con Tipo
    public function tipo()
    {
        return $this->belongsTo(Tipo::class, 'id_tipo', 'id');
    }

    // N:1 con Usuario (User de Laravel)
    public function usuario()
    {
        return $this->belongsTo(User::class, 'id_usuario', 'id');
    }

    // N:1 con Contrato
    public function contrato()
    {
        return $this->belongsTo(Contrato::class, 'id_contrato', 'id');
    }

    // castear campos
    protected $casts = [
        
        'mensualidad' => 'decimal:2',
    ];
}