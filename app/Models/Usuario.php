<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Usuario
 * 
 * @property int $ID_USUARIO
 * @property string $TIPO_DOC
 * @property string $NOM_USER
 * @property string $APE_USER
 * @property string $TEL_USER
 * @property string $CORREO_USER
 * @property string $ROL_USER
 * @property int $EST_USER
 * @property Carbon $CREATED_AT
 * @property Carbon $UPDATE_AT
 * @property int|null $ID_ROL_USER
 * 
 * @property Rol|null $rol
 * @property Collection|Citum[] $cita
 * @property Collection|Facturacion[] $facturacions
 * @property Collection|Pedido[] $pedidos
 * @property Collection|Pqr[] $pqrs
 *
 * @package App\Models
 */
class Usuario extends Model
{
	protected $table = 'usuario';
	protected $primaryKey = 'ID_USUARIO';
	public $timestamps = false;

	protected $casts = [
		'EST_USER' => 'int',
		'CREATED_AT' => 'datetime',
		'UPDATE_AT' => 'datetime',
		'ID_ROL_USER' => 'int'
	];

	protected $fillable = [
		'TIPO_DOC',
		'NOM_USER',
		'APE_USER',
		'TEL_USER',
		'CORREO_USER',
		'ROL_USER',
		'EST_USER',
		'CREATED_AT',
		'UPDATE_AT',
		'ID_ROL_USER'
	];

	public function rol()
	{
		return $this->belongsTo(Rol::class, 'ID_ROL_USER');
	}

	public function cita()
	{
		return $this->hasMany(Citum::class, 'USUARIO_ID_USUARIO');
	}

	public function facturacions()
	{
		return $this->hasMany(Facturacion::class, 'USUARIO_ID_USUARIO');
	}

	public function pedidos()
	{
		return $this->hasMany(Pedido::class, 'USUARIO_ID_USUARIO');
	}

	public function pqrs()
	{
		return $this->hasMany(Pqr::class, 'USUARIO_ID_USUARIO');
	}
}
