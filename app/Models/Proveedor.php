<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Proveedor
 * 
 * @property int $ID_PROVEDOR
 * @property string $TIPO_DOC
 * @property string $NOM_PROV
 * @property string $TEL_PROV
 * @property int $EST_PROV
 * @property Carbon $CREATED_AT
 * @property Carbon $UPDATE_AT
 * 
 * @property Collection|Inventario[] $inventarios
 *
 * @package App\Models
 */
class Proveedor extends Model
{
	protected $table = 'proveedor';
	protected $primaryKey = 'ID_PROVEDOR';
	public $timestamps = false;

	protected $casts = [
		'EST_PROV' => 'int',
		'CREATED_AT' => 'datetime',
		'UPDATE_AT' => 'datetime'
	];

	protected $fillable = [
		'TIPO_DOC',
		'NOM_PROV',
		'TEL_PROV',
		'EST_PROV',
		'CREATED_AT',
		'UPDATE_AT'
	];

	public function inventarios()
	{
		return $this->hasMany(Inventario::class, 'PROVEEDOR_ID_PROVEDOR');
	}
}
