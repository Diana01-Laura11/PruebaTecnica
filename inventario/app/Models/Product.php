<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'productos';
    protected $primaryKey = 'idProducto';
    public $incrementing = true;
    public $timestamps = false; // Si no usas created_at/updated_at
    /**
     * Los atributos que son asignables masivamente.
     *
     * @var array
     */
    protected $fillable = [
        'nombre',
        'cantidad',
        'estatus',
    ];


    /**
     * Verificar si el producto tiene stock disponible.
     *
     * @return bool
     */
    public function disponible()
    {
        return $this->cantidad > 0;
    }

    public function stockBajo($limite = 5)
    {
        return $this->cantidad > 0 && $this->cantidad <= $limite;
    }
   

}
