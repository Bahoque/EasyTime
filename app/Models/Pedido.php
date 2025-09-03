<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Pedido
 * 
 * @property int $ID_PEDIDO
 * @property Carbon $FECHA_PED
 * @property int $USUARIO_ID_USUARIO
 * 
 * @property Usuario $usuario
 * @property Collection|DetallePedido[] $detalle_pedidos
 *
 * @package App\Models
 */
class Pedido extends Model
{
	protected $table = 'pedido';
	protected $primaryKey = 'ID_PEDIDO';
	public $timestamps = false;

	protected $casts = [
		'FECHA_PED' => 'datetime',
		'USUARIO_ID_USUARIO' => 'int'
	];

	protected $fillable = [
		'FECHA_PED',
		'USUARIO_ID_USUARIO'
	];

	public function usuario()
	{
		return $this->belongsTo(Usuario::class, 'USUARIO_ID_USUARIO');
	}

	public function detalle_pedidos()
	{
		return $this->hasMany(DetallePedido::class, 'PEDIDO_ID_PEDIDO');
	}
}
