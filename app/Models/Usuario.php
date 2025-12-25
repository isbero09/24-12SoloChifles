<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $table = 'usuarios';

    protected $primaryKey = 'cedula';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'cedula',
        'nombre',
        'direccion',
        'telefono',
        'referencia'
    ];

    public $timestamps = true;

    // Método mágico para permitir acceso con PascalCase en las vistas
    public function __get($key)
    {
        // Mapeo de PascalCase a snake_case
        $attributeMap = [
            'Cedula' => 'cedula',
            'Nombre' => 'nombre',
            'Direccion' => 'direccion',
            'Telefono' => 'telefono',
            'Referencia' => 'referencia',
        ];

        // Si la clave está en el mapa, usar el atributo snake_case correspondiente
        if (isset($attributeMap[$key])) {
            return $this->getAttribute($attributeMap[$key]);
        }

        // Dejar que Laravel maneje el resto (incluyendo relaciones, etc.)
        return parent::__get($key);
    }
}
