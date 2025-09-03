<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Servicio
 * 
 * @property int $ID_SERVICIO
 * @property string $NOM_SERV
 * @property string $DURACION_SERV
 * @property int $EST_SERV
 * @property string $DESCP_SERV
 * @property string $PRECIO_SERV
 * @property Carbon $CREATED_AT
 * @property Carbon $UPDATE_AT
 * 
 * @property Collection|Calificacion[] $calificacions
 * @property Collection|Citum[] $cita
 * @property Collection|Facturacion[] $facturacions
 *
 * @package App\Models
 */
class Servicio extends Model
{
	protected $table = 'servicio';
	protected $primaryKey = 'ID_SERVICIO';
	public $timestamps = false;

	protected $casts = [
		'EST_SERV' => 'int',
		'CREATED_AT' => 'datetime',
		'UPDATE_AT' => 'datetime'
	];

	protected $fillable = [
		'NOM_SERV',
		'DURACION_SERV',
		'EST_SERV',
		'DESCP_SERV',
		'PRECIO_SERV',
		'CREATED_AT',
		'UPDATE_AT'
	];

	public function calificacions()
	{
		return $this->hasMany(Calificacion::class, 'SERVICIO_ID_SERVICIO');
	}

	public function cita()
	{
		return $this->hasMany(Citum::class, 'SERVICIO_ID_SERVICIO');
	}

	public function facturacions()
	{
		return $this->hasMany(Facturacion::class, 'SERVICIO_ID_SERVICIO');
	}
}
