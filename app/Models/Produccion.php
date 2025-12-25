<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produccion extends Model
{
    protected $table = 'produccions';

    protected $primaryKey = 'id';
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = [
        'fecha',
        'cantidad_fundas',
        'producto_id'
    ];

    public $timestamps = true;

    // Relación con Producto
    public function producto()
    {
        return $this->belongsTo(Producto::class, 'producto_id', 'id');
    }
}
