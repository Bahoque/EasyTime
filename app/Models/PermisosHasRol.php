<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class PermisosHasRol
 * 
 * @property int $ID_ROL_HAS_PERMISO
 * @property int $ROL_ID_ROL
 * @property int $PERMISOS_ID_PERMISO
 * 
 * @property Rol $rol
 * @property Permiso $permiso
 *
 * @package App\Models
 */
class PermisosHasRol extends Model
{
	protected $table = 'permisos_has_rol';
	protected $primaryKey = 'ID_ROL_HAS_PERMISO';
	public $timestamps = false;

	protected $casts = [
		'ROL_ID_ROL' => 'int',
		'PERMISOS_ID_PERMISO' => 'int'
	];

	protected $fillable = [
		'ROL_ID_ROL',
		'PERMISOS_ID_PERMISO'
	];

	public function rol()
	{
		return $this->belongsTo(Rol::class, 'ROL_ID_ROL');
	}

	public function permiso()
	{
		return $this->belongsTo(Permiso::class, 'PERMISOS_ID_PERMISO');
	}
}
