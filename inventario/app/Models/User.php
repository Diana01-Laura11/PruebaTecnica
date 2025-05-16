<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * Especificar la tabla correcta
     */
    protected $table = 'usuarios';
    protected $primaryKey = 'idUsuario';
    public $incrementing = true;
    public $timestamps = false; // Si no usas created_at/updated_at

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'idRol',
        'nombre',
        'correo',
        'contrasena',
        'estatus',
    ];

    
    /**
     * Los atributos que deben ocultarse.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'contrasena',
        'remember_token',
    ];

    /**
     * Indicar que el campo de contraseña es 'contrasena' en lugar de 'password'
     */
    public function getAuthPassword()
    {
        return $this->contrasena;
    }


     // Relación con el modelo Rol
     public function rol()
     {
         return $this->belongsTo(Rol::class, 'idRol', 'idRol');
     }
     
     // Método para verificar si el usuario tiene un rol específico
     public function tieneRol($idRol) 
     {
         return $this->idRol == $idRol;
     }
}
