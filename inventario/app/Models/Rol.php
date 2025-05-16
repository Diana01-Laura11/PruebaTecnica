<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Rol extends Model
{
    protected $table = 'roles';
    protected $primaryKey = 'idRol';
    
    protected $fillable = ['nombre'];
    
    public function usuarios()
    {
        return $this->hasMany(User::class, 'idRol');
    }
}