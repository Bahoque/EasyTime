<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Notificapqr
 * 
 * @property int $ID_NOTIFIACION_PQR
 * @property int $EST_NOT
 * @property Carbon $FECHA_NOT
 * @property string $MSJ_NOT
 * @property int $PQR_ID_PQR
 * 
 * @property Pqr $pqr
 *
 * @package App\Models
 */
class Notificapqr extends Model
{
	protected $table = 'notificapqr';
	protected $primaryKey = 'ID_NOTIFIACION_PQR';
	public $timestamps = false;

	protected $casts = [
		'EST_NOT' => 'int',
		'FECHA_NOT' => 'datetime',
		'PQR_ID_PQR' => 'int'
	];

	protected $fillable = [
		'EST_NOT',
		'FECHA_NOT',
		'MSJ_NOT',
		'PQR_ID_PQR'
	];

	public function pqr()
	{
		return $this->belongsTo(Pqr::class, 'PQR_ID_PQR');
	}
}
