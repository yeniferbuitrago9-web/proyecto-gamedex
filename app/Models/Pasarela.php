<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Pasarela
 * 
 * @property int $id_pasarela
 * @property string $metodo
 * @property string $respuesta
 * @property int $id_transaccion
 * @property int $id_venta
 * @property int $id-intercambio
 * 
 * @property Intercambio|null $intercambio
 * @property Transaccione|null $transaccione
 * @property Venta|null $venta
 *
 * @package App\Models
 */
class Pasarela extends Model
{
	protected $table = 'pasarela';
	protected $primaryKey = 'id_pasarela';
	public $timestamps = false;

	protected $casts = [
		'id_transaccion' => 'int',
		'id_venta' => 'int',
		'id-intercambio' => 'int'
	];

	protected $fillable = [
		'metodo',
		'respuesta',
		'id_transaccion',
		'id_venta',
		'id-intercambio'
	];

	public function intercambio()
	{
		return $this->hasOne(Intercambio::class, 'id_intercambio');
	}

	public function transaccione()
	{
		return $this->hasOne(Transaccione::class, 'id_transaccion');
	}

	public function venta()
	{
		return $this->hasOne(Venta::class, 'id_ventas');
	}
}
