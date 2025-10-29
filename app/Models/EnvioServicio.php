<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EnvioServicio extends Model
{
    use HasFactory , SoftDeletes;
    protected $table = 'envio_servicios';
    protected $primaryKey = "id";

    protected $fillable = [
        'nombre',
        'tiempo_envio',
        'coste_base',
        'activo',
        'id_usuario',
    ];

    protected $casts = [
        'activo' => 'boolean',
        'coste_base' => 'decimal:2',
    ];

    public function usuario()
    {
        return $this->belongsTo(User::class, 'id_usuario');
    }
}
