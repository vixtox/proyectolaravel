<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cliente extends Model
{
    use SoftDeletes;
    
    protected $table='clientes';
    public $timestamps = false;
    protected $fillable = [
        'cif', 'nombre_apellidos', 'correo', 'telefono', 'iban', 'cuota','pais','moneda'
    ];

}
