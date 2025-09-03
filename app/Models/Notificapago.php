<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Notificapago
 * 
 * @property int $ID_NOTIFICA_PAGO
 * @property int $PAGO_ID_PAGO
 * 
 * @property Pago $pago
 *
 * @package App\Models
 */
class Notificapago extends Model
{
	protected $table = 'notificapago';
	protected $primaryKey = 'ID_NOTIFICA_PAGO';
	public $timestamps = false;

	protected $casts = [
		'PAGO_ID_PAGO' => 'int'
	];

	protected $fillable = [
		'PAGO_ID_PAGO'
	];

	public function pago()
	{
		return $this->belongsTo(Pago::class, 'PAGO_ID_PAGO');
	}
}
