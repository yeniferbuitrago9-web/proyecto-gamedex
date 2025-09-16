<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Venta
 * 
 * @property int $id_venta
 * @property int|null $cliente_id
 * @property int|null $vendedor_id
 * @property Carbon|null $fecha
 * @property float $total
 * @property string|null $estado
 *
 * @package App\Models
 */
class Venta extends Model
{
	protected $table = 'ventas';
	protected $primaryKey = 'id_venta';
	public $timestamps = false;

	protected $casts = [
		'cliente_id' => 'int',
		'vendedor_id' => 'int',
		'fecha' => 'datetime',
		'total' => 'float'
	];

	protected $fillable = [
		'cliente_id',
		'vendedor_id',
		'fecha',
		'total',
		'estado'
	];
}
