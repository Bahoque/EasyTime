<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Producto
 * 
 * @property int $ID_PRODUCTO
 * @property string $NOM_PROD
 * @property string $DESCRIPCION_PROD
 * @property string $CADUCIDAD_PROD
 * @property string $PRECIO_PROD
 * @property string $CANTIDAD_PROD
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
	public $timestamps = false;

	protected $casts = [
		'CREATED_AT' => 'datetime',
		'UPDATE_AT' => 'datetime',
		'INVENTARIO_ID_INVENTARIO' => 'int'
	];

	protected $fillable = [
		'NOM_PROD',
		'DESCRIPCION_PROD',
		'CADUCIDAD_PROD',
		'PRECIO_PROD',
		'CANTIDAD_PROD',
		'CREATED_AT',
		'UPDATE_AT',
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
