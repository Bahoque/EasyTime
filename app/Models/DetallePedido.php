<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class DetallePedido
 * 
 * @property string $ID_ITEM
 * @property int $CANTIDAD
 * @property int $PEDIDO_ID_PEDIDO
 * @property int $PRODUCTOS_ID_PRODUCTO
 * 
 * @property Pedido $pedido
 * @property Producto $producto
 * @property Collection|Facturacion[] $facturacions
 *
 * @package App\Models
 */
class DetallePedido extends Model
{
	protected $table = 'detalle_pedido';
	protected $primaryKey = 'ID_ITEM';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'CANTIDAD' => 'int',
		'PEDIDO_ID_PEDIDO' => 'int',
		'PRODUCTOS_ID_PRODUCTO' => 'int'
	];

	protected $fillable = [
		'CANTIDAD',
		'PEDIDO_ID_PEDIDO',
		'PRODUCTOS_ID_PRODUCTO'
	];

	public function pedido()
	{
		return $this->belongsTo(Pedido::class, 'PEDIDO_ID_PEDIDO');
	}

	public function producto()
	{
		return $this->belongsTo(Producto::class, 'PRODUCTOS_ID_PRODUCTO');
	}

	public function facturacions()
	{
		return $this->hasMany(Facturacion::class, 'DETALLEPEDIDO_ID_DETALLEPEDIDO', 'PEDIDO_ID_PEDIDO');
	}
}
