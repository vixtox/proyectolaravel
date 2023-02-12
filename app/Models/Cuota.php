<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Permission\Traits\HasRoles;

class Cuota extends Model
{
    use SoftDeletes;
    use HasRoles;

    protected $table='cuotas';
    public $timestamps = false;
    protected $fillable = ['clientes_id', 'concepto', 'fecha_emision', 'importe', 'pagada', 'fecha_pago', 'notas'];

    public function cliente()
    {
        return $this->belongsTo('App\Models\Cliente', 'clientes_id');
        return $this->belongsTo(Cliente::class, 'clientes_id');
    }
}