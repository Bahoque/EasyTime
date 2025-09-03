<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Pqr
 * 
 * @property int $ID_PQR
 * @property int $EST_PRQ
 * @property Carbon $FECHA_PQR
 * @property string $CATEGORIA_PQR
 * @property Carbon $CREATED_AT
 * @property string $UPDATE_AT
 * @property int $USUARIO_ID_USUARIO
 * 
 * @property Usuario $usuario
 * @property Collection|Notificapqr[] $notificapqrs
 *
 * @package App\Models
 */
class Pqr extends Model
{
	protected $table = 'pqr';
	protected $primaryKey = 'ID_PQR';
	public $timestamps = false;

	protected $casts = [
		'EST_PRQ' => 'int',
		'FECHA_PQR' => 'datetime',
		'CREATED_AT' => 'datetime',
		'USUARIO_ID_USUARIO' => 'int'
	];

	protected $fillable = [
		'EST_PRQ',
		'FECHA_PQR',
		'CATEGORIA_PQR',
		'CREATED_AT',
		'UPDATE_AT',
		'USUARIO_ID_USUARIO'
	];

	public function usuario()
	{
		return $this->belongsTo(Usuario::class, 'USUARIO_ID_USUARIO');
	}

	public function notificapqrs()
	{
		return $this->hasMany(Notificapqr::class, 'PQR_ID_PQR');
	}
}
