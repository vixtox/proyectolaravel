<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cliente extends Model
{
    use SoftDeletes;
    
    protected $table='clientes';
    public $timestamps = false;
    protected $fillable = [
        'cif', 'nombre_apellidos', 'correo', 'telefono', 'iban', 'cuota','paises_id','moneda'
    ];

    public function pais()
    {
        return $this->belongsTo('App\Models\Pais', 'paises_id');
    }

}
