<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Permiso
 * 
 * @property int $ID_PERMISO
 * @property string $DESCRIPCION
 * 
 * @property Collection|Rol[] $rols
 *
 * @package App\Models
 */
class Permiso extends Model
{
	protected $table = 'permisos';
	protected $primaryKey = 'ID_PERMISO';
	public $timestamps = false;

	protected $fillable = [
		'DESCRIPCION'
	];

	public function rols()
	{
		return $this->belongsToMany(Rol::class, 'permisos_has_rol', 'PERMISOS_ID_PERMISO', 'ROL_ID_ROL')
					->withPivot('ID_ROL_HAS_PERMISO');
	}
}
