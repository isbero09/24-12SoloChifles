<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Permiso extends Model
{
    protected $table = 'permisos';

    // Usar 'id' que es el estándar de Laravel (creado por $table->id() en la migración)
    protected $primaryKey = 'id';
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = [
        'fecha_asignacion',  // Usar snake_case como en la migración
        'cedula',        
    ];

    public $timestamps = true;  // La migración tiene timestamps

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'cedula', 'cedula');
    }
}