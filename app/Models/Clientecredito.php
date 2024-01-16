<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clientecredito extends Model
{
    use HasFactory;
    protected $fillable = [
        'cliente',
        'valor',
        'cuotas',
        'valor_cuota',
        'descripcion',
        'estado',
        'nombre_gerente',
        'fecha_aprobacion',
        'tipo_credito',
        'observacion_asesor',
        'nombre_asesor',
        'id_user',
        'fecha_aprobacion' => 'datetime',
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

}
