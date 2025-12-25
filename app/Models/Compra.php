<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Compra extends Model
{
    protected $table = 'compras';

    protected $primaryKey = 'id';
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = [
        'fecha',
        'insumo',
        'proveedor_id',
        'cantidad',
        'unidad',
        'costo_unitario',
        'tipo_de_pago',
        'dias_de_credito'
    ];

    public $timestamps = true;

    public function proveedor()
    {
        return $this->belongsTo(Proveedor::class, 'proveedor_id', 'id');
    }
}
