<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Rol
 * 
 * @property int $ID_ROL
 * @property string $NOM_ROL
 * 
 * @property Collection|Permiso[] $permisos
 * @property Collection|Usuario[] $usuarios
 *
 * @package App\Models
 */
class Rol extends Model
{
	protected $table = 'rol';
	protected $primaryKey = 'ID_ROL';
	public $timestamps = false;

	protected $fillable = [
		'NOM_ROL'
	];

	public function permisos()
	{
		return $this->belongsToMany(Permiso::class, 'permisos_has_rol', 'ROL_ID_ROL', 'PERMISOS_ID_PERMISO')
					->withPivot('ID_ROL_HAS_PERMISO');
	}

	public function usuarios()
	{
		return $this->hasMany(Usuario::class, 'ID_ROL_USER');
	}
}
