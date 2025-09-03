<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Citum
 * 
 * @property int $ID_CITA
 * @property int $EST_CITA
 * @property Carbon $FECHA_CITA
 * @property Carbon $CREATED_AT
 * @property Carbon $UPDATE_AT
 * @property int $USUARIO_ID_USUARIO
 * @property int $SERVICIO_ID_SERVICIO
 * 
 * @property Usuario $usuario
 * @property Servicio $servicio
 *
 * @package App\Models
 */
class Citum extends Model
{
	protected $table = 'cita';
	protected $primaryKey = 'ID_CITA';
	public $timestamps = false;

	protected $casts = [
		'EST_CITA' => 'int',
		'FECHA_CITA' => 'datetime',
		'CREATED_AT' => 'datetime',
		'UPDATE_AT' => 'datetime',
		'USUARIO_ID_USUARIO' => 'int',
		'SERVICIO_ID_SERVICIO' => 'int'
	];

	protected $fillable = [
		'EST_CITA',
		'FECHA_CITA',
		'CREATED_AT',
		'UPDATE_AT',
		'USUARIO_ID_USUARIO',
		'SERVICIO_ID_SERVICIO'
	];

	public function usuario()
	{
		return $this->belongsTo(Usuario::class, 'USUARIO_ID_USUARIO');
	}

	public function servicio()
	{
		return $this->belongsTo(Servicio::class, 'SERVICIO_ID_SERVICIO');
	}
}
