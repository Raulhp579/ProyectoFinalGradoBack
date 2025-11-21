<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable, SoftDeletes, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */

    protected $fillable = [
        'name',
        'apellidos',
        'email',
        'password',
        'telefono',
        'direccion',
        'fecha_alta',
        'id_suscripcion'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'fecha_alta' => 'date',
            'password' => 'hashed',

        ];
    }
    public function subscripcion()
    {
        return $this->belongsTo(Suscripcion::class, 'id_suscripcion','id');//preguntar
    }

    public function envios(){
        return $this->hasMany(EnvioServicio::class, 'id_usuario','id');
    
    }

    public function contratos(){
        return $this->hasMany(Contrato::class, 'id_usuario','id');
    }

    public function reseñas(){
        return $this->hasMany(SuscripcionReview::class,'id_usuario','id');
    }
}
