<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductoReview extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $table ="producto_review";

    protected $fillable = [
        'id_usuario',
        'id_producto',
        'review'
    ];

    public function producto(){
        return $this->belongsTo(Producto::class, 'id_producto','id');
    }

    public function usuario(){
        return $this->belongsTo(User::class,'id_usuario','id');
    }
}
