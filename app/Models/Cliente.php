<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table='clientes';
    public $timestamps = false;
    protected $fillable = [
        'cif', 'nombre_apellidos', 'correo', 'telefono', 'iban', 'cuota','pais','moneda'
    ];

}
