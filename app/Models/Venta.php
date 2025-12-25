<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    protected $table = 'ventas';

    // Usar 'id' que es el estándar de Laravel (creado por $table->id() en la migración)
    protected $primaryKey = 'id';
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = [
        'precio',
        'pagado',
        'fecha_pago',
        'cedula',
        'fecha_venta',
    ];

    public $timestamps = false;  // La migración no tiene timestamps

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'cedula', 'cedula');
    }
}
