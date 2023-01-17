<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tarea extends Model
{
    protected $table='tareas';
    public $timestamps = false;
    protected $fillable = [
        'cliente', 'nombre_apellidos', 'telefono', 'correo', 'descripcion', 'direccion',
        'poblacion','codigo_postal' ,'provincia' ,'estado' ,'operario_encargado', 'fecha_realizacion'
    ];

}
