<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ventasproducto extends Model
{
    // Usar 'ventasproductos' que es lo que crea la migración
    protected $table = 'ventasproductos';

    // Usar 'id' que es el estándar de Laravel (creado por $table->id() en la migración)
    protected $primaryKey = 'id';
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = [
        'cliente_cedula',
        'producto_id',
        'detalle',
        'precio',
        'fecha',
    ];

    public $timestamps = true;  // La migración tiene timestamps

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'cliente_cedula', 'cedula');
    }

    public function producto()
    {
        return $this->belongsTo(Producto::class, 'producto_id', 'id');
    }
}