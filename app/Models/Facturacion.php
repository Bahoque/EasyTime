<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Facturacion
 * 
 * @property int $ID_FACTURA
 * @property Carbon $FECHA_VENCIMIENTO
 * @property Carbon $CREATED_AT
 * @property Carbon $UPDATE_AT
 * @property int $SERVICIO_ID_SERVICIO
 * @property int $DETALLEPEDIDO_ID_DETALLEPEDIDO
 * @property int $USUARIO_ID_USUARIO
 * 
 * @property Servicio $servicio
 * @property Usuario $usuario
 * @property DetallePedido $detalle_pedido
 * @property Collection|Pago[] $pagos
 *
 * @package App\Models
 */
class Facturacion extends Model
{
	protected $table = 'facturacion';
	protected $primaryKey = 'ID_FACTURA';
	public $timestamps = false;

	protected $casts = [
		'FECHA_VENCIMIENTO' => 'datetime',
		'CREATED_AT' => 'datetime',
		'UPDATE_AT' => 'datetime',
		'SERVICIO_ID_SERVICIO' => 'int',
		'DETALLEPEDIDO_ID_DETALLEPEDIDO' => 'int',
		'USUARIO_ID_USUARIO' => 'int'
	];

	protected $fillable = [
		'FECHA_VENCIMIENTO',
		'CREATED_AT',
		'UPDATE_AT',
		'SERVICIO_ID_SERVICIO',
		'DETALLEPEDIDO_ID_DETALLEPEDIDO',
		'USUARIO_ID_USUARIO'
	];

	public function servicio()
	{
		return $this->belongsTo(Servicio::class, 'SERVICIO_ID_SERVICIO');
	}

	public function usuario()
	{
		return $this->belongsTo(Usuario::class, 'USUARIO_ID_USUARIO');
	}

	public function detalle_pedido()
	{
		return $this->belongsTo(DetallePedido::class, 'DETALLEPEDIDO_ID_DETALLEPEDIDO', 'PEDIDO_ID_PEDIDO');
	}

	public function pagos()
	{
		return $this->hasMany(Pago::class, 'FACTURACION_ID_FACTURA');
	}
}
