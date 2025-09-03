<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Promocione
 * 
 * @property int $ID_PROMOCIONES
 * @property string $TIPO_PROMO
 * @property string $NOM_PROMO
 * @property Carbon $CREATED_AT
 * @property Carbon $UPDATE_AT
 * @property Carbon $VIGENCIA
 * @property int $PRODUCTOS_ID_PRODUCTO
 * 
 * @property Producto $producto
 *
 * @package App\Models
 */
class Promocione extends Model
{
	protected $table = 'promociones';
	protected $primaryKey = 'ID_PROMOCIONES';
	public $timestamps = false;

	protected $casts = [
		'CREATED_AT' => 'datetime',
		'UPDATE_AT' => 'datetime',
		'VIGENCIA' => 'datetime',
		'PRODUCTOS_ID_PRODUCTO' => 'int'
	];

	protected $fillable = [
		'TIPO_PROMO',
		'NOM_PROMO',
		'CREATED_AT',
		'UPDATE_AT',
		'VIGENCIA',
		'PRODUCTOS_ID_PRODUCTO'
	];

	public function producto()
	{
		return $this->belongsTo(Producto::class, 'PRODUCTOS_ID_PRODUCTO');
	}
}
