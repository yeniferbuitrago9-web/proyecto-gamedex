<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Comprobante
 * 
 * @property int $id_comprobante
 * @property string $tipo
 * @property string|null $numero_comprobante
 * @property float|null $monto
 * @property Carbon $fecha
 * @property string|null $detalles
 * @property int $id_transaccion
 *
 * @package App\Models
 */
class Comprobante extends Model
{
	protected $table = 'comprobantes';
	protected $primaryKey = 'id_comprobante';
	public $timestamps = false;

	protected $casts = [
		'monto' => 'float',
		'fecha' => 'datetime',
		'id_transaccion' => 'int'
	];

	protected $fillable = [
		'tipo',
		'numero_comprobante',
		'monto',
		'fecha',
		'detalles',
		'id_transaccion'
	];
}
