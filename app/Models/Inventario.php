<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Inventario
 * 
 * @property int $ID_INVENTARIO
 * @property string $NOMBRE_PROD_INVE
 * @property string $CANTIDAD
 * @property Carbon $UPDATE_AT
 * @property int|null $PROVEEDOR_ID_PROVEDOR
 * 
 * @property Proveedor|null $proveedor
 * @property Collection|Producto[] $productos
 *
 * @package App\Models
 */
class Inventario extends Model
{
	protected $table = 'inventario';
	protected $primaryKey = 'ID_INVENTARIO';
	public $timestamps = false;

	protected $casts = [
		'UPDATE_AT' => 'datetime',
		'PROVEEDOR_ID_PROVEDOR' => 'int'
	];

	protected $fillable = [
		'NOMBRE_PROD_INVE',
		'CANTIDAD',
		'UPDATE_AT',
		'PROVEEDOR_ID_PROVEDOR'
	];

	public function proveedor()
	{
		return $this->belongsTo(Proveedor::class, 'PROVEEDOR_ID_PROVEDOR');
	}

	public function productos()
	{
		return $this->hasMany(Producto::class, 'INVENTARIO_ID_INVENTARIO');
	}
}
