<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Empleado extends Model
{
    use SoftDeletes;

    protected $table='empleados';
    public $timestamps = false;
    protected $fillable = ['dni', 'nombre_apellidos', 'clave', 'correo', 'telefono', 'direccion', 'fecha_alta', 'es_admin'];
}
