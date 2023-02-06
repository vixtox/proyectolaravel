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
        'clientes_id', 'nombre_apellidos', 'telefono', 'correo', 'descripcion', 'direccion',
        'poblacion','codigo_postal' ,'provincias_id' ,'estado' ,'empleados_id', 'fecha_realizacion'
    ];

    public function cliente()
    {
        return $this->belongsTo('App\Models\Cliente', 'clientes_id');
    }

    public function empleado()
    {
        return $this->belongsTo('App\Models\Empleado', 'empleados_id');
    }

    public function provincia()
    {
        return $this->belongsTo('App\Models\Provincia', 'provincias_id');
    }

}
