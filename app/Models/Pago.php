<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Pago
 * 
 * @property int $ID_PAGO
 * @property Carbon $FECHA_PAGO
 * @property string $MONTO_PAGO
 * @property string $METODO_PAGO
 * @property int $FACTURACION_ID_FACTURA
 * 
 * @property Facturacion $facturacion
 * @property Collection|Notificapago[] $notificapagos
 *
 * @package App\Models
 */
class Pago extends Model
{
	protected $table = 'pago';
	protected $primaryKey = 'ID_PAGO';
	public $timestamps = false;

	protected $casts = [
		'FECHA_PAGO' => 'datetime',
		'FACTURACION_ID_FACTURA' => 'int'
	];

	protected $fillable = [
		'FECHA_PAGO',
		'MONTO_PAGO',
		'METODO_PAGO',
		'FACTURACION_ID_FACTURA'
	];

	public function facturacion()
	{
		return $this->belongsTo(Facturacion::class, 'FACTURACION_ID_FACTURA');
	}

	public function notificapagos()
	{
		return $this->hasMany(Notificapago::class, 'PAGO_ID_PAGO');
	}
}
