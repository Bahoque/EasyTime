<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Calificacion
 * 
 * @property string $ID_CALIFICACION
 * @property Carbon $CREATED_AT
 * @property int $SERVICIO_ID_SERVICIO
 * 
 * @property Servicio $servicio
 *
 * @package App\Models
 */
class Calificacion extends Model
{
	protected $table = 'calificacion';
	protected $primaryKey = 'ID_CALIFICACION';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'CREATED_AT' => 'datetime',
		'SERVICIO_ID_SERVICIO' => 'int'
	];

	protected $fillable = [
		'CREATED_AT',
		'SERVICIO_ID_SERVICIO'
	];

	public function servicio()
	{
		return $this->belongsTo(Servicio::class, 'SERVICIO_ID_SERVICIO');
	}
}
