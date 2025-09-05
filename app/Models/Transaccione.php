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
 * @property Carbon $fecha
 * @property string $estado
 * @property int $ventas_id_ventas1
 * @property int $intercambios_id_intercambio1
 * 
 * @property Comprobante $comprobante
 * @property Pasarela $pasarela
 * @property Intercambio|null $intercambio
 * @property Venta|null $venta
 *
 * @package App\Models
 */
class Transaccione extends Model
{
	protected $table = 'transacciones';
	protected $primaryKey = 'id_transaccion';
	public $timestamps = false;

	protected $casts = [
		'fecha' => 'datetime',
		'ventas_id_ventas1' => 'int',
		'intercambios_id_intercambio1' => 'int'
	];

	protected $fillable = [
		'fecha',
		'estado',
		'ventas_id_ventas1',
		'intercambios_id_intercambio1'
	];

	public function comprobante()
	{
		return $this->belongsTo(Comprobante::class, 'id_transaccion');
	}

	public function pasarela()
	{
		return $this->belongsTo(Pasarela::class, 'id_transaccion');
	}

	public function intercambio()
	{
		return $this->hasOne(Intercambio::class, 'id_intercambio');
	}

	public function venta()
	{
		return $this->hasOne(Venta::class, 'id_ventas');
	}
}
