<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Transaccione
 * 
 * @property int $id_transaccion
 * @property string $tipo
 * @property int $id_usuario
 * @property int $id_producto
 * @property string|null $metodo_pago
 * @property float $monto
 * @property string|null $garantia
 * @property Carbon $fecha
 * @property string|null $estado
 *
 * @package App\Models
 */
class Transaccione extends Model
{
	protected $table = 'transacciones';
	protected $primaryKey = 'id_transaccion';
	public $timestamps = false;

	protected $casts = [
		'id_usuario' => 'int',
		'id_producto' => 'int',
		'monto' => 'float',
		'fecha' => 'datetime'
	];

	protected $fillable = [
		'tipo',
		'id_usuario',
		'id_producto',
		'metodo_pago',
		'monto',
		'garantia',
		'fecha',
		'estado'
	];
}
