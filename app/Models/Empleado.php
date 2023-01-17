<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    protected $table='empleados';
    public $timestamps = false;
    protected $fillable = ['dni', 'nombre_apellidos', 'correo', 'telefono', 'direccion', 'fecha_alta', 'es_admin'];
}
