<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuscripcionReview extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $table = "suscripcion_review";
    protected $fillable = [
        'id_usuario',
        'id_tipo',
        'review'
    ];

    public function usuario()
    {
        return $this->belongsTo(User::class, 'id_usuario', 'id');
    }

    public function tipo()
    {
        return $this->belongsTo(Tipo::class, 'id_tipo', 'id');
    }
}
