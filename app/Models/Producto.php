<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;
use Carbon\Carbon;

/**
 * Class Producto
 * 
 * @property int $ID_PRODUCTO
 * @property string $COD_PROD
 * @property string $NOM_PROD
 * @property string|null $DESCRIPCION_PROD
 * @property string $CADUCIDAD_PROD
 * @property float $PRECIO_PROD
 * @property int $CANTIDAD_PROD
 * @property Carbon $CREATED_AT
 * @property Carbon $UPDATE_AT
 * @property int $INVENTARIO_ID_INVENTARIO
 * 
 * @property Inventario $inventario
 * @property Collection|DetallePedido[] $detalle_pedidos
 * @property Collection|Promocione[] $promociones
 *
 * @package App\Models
 */
class Producto extends Model
{
    protected $table = 'productos';
    protected $primaryKey = 'ID_PRODUCTO';

    // Laravel no usa automáticamente CREATED_AT y UPDATE_AT porque los nombraste distinto
    const CREATED_AT = 'CREATED_AT';
    const UPDATED_AT = 'UPDATE_AT';
    public $timestamps = true;

    protected $casts = [
        'CREATED_AT' => 'datetime',
        'UPDATE_AT' => 'datetime',
        'PRECIO_PROD' => 'float',
        'CANTIDAD_PROD' => 'int',
        'INVENTARIO_ID_INVENTARIO' => 'int'
    ];

    protected $fillable = [
        'COD_PROD',
        'NOM_PROD',
        'DESCRIPCION_PROD',
        'CADUCIDAD_PROD',
        'PRECIO_PROD',
        'CANTIDAD_PROD',
        'INVENTARIO_ID_INVENTARIO'
    ];

    public function inventario()
    {
        return $this->belongsTo(Inventario::class, 'INVENTARIO_ID_INVENTARIO');
    }

    public function detalle_pedidos()
    {
        return $this->hasMany(DetallePedido::class, 'PRODUCTOS_ID_PRODUCTO');
    }

    public function promociones()
    {
        return $this->hasMany(Promocione::class, 'PRODUCTOS_ID_PRODUCTO');
    }
}

