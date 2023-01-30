<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tarea extends Model
{
    use SoftDeletes;

    protected $table='tareas';
    public $timestamps = false;
    protected $fillable = [
        'cliente', 'nombre_apellidos', 'telefono', 'correo', 'descripcion', 'direccion',
        'poblacion','codigo_postal' ,'provincia' ,'estado' ,'operario_encargado', 'fecha_realizacion'
    ];

}
