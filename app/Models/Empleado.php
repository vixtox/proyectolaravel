<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Empleado extends Authenticatable

{
    use SoftDeletes;

    protected $table='empleados';
    public $timestamps = false;
    protected $fillable = ['dni', 'nombre_apellidos', 'password', 'email', 'telefono', 'direccion', 'fecha_alta', 'es_admin'];
}
