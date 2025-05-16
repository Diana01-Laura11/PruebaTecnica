<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    use HasFactory;

    protected $table = 'historicos';
    protected $primaryKey = 'idHistorico';
    public $incrementing = true;
    public $timestamps = false; // Si no usas created_at/updated_at
    /**
     * Los atributos que son asignables masivamente.
     *
     * @var array
     */
    protected $fillable = [
        'idUsuario',
        'tipo_movimiento',
        'accion',
        'fecha'
    ];

}
