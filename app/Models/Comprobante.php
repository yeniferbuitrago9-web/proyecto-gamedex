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
 * @property string $nom_producto
 * @property string $des_producto
 * @property string $cant_producto
 * @property string $est_producto
 * @property int $ventas_id_ventas
 * @property int $intercambios_id_intercambio
 * @property int $transacciones_id_transaccion
 * @property Carbon $create_at
 * @property Carbon $update_at
 * @property int $id_producto
 * 
 * @property Intercambio|null $intercambio
 * @property Producto|null $producto
 * @property Transaccione|null $transaccione
 * @property Venta|null $venta
 *
 * @package App\Models
 */
class Comprobante extends Model
{
	protected $table = 'comprobante';
	protected $primaryKey = 'id_comprobante';
	public $timestamps = false;

	protected $casts = [
		'ventas_id_ventas' => 'int',
		'intercambios_id_intercambio' => 'int',
		'transacciones_id_transaccion' => 'int',
		'create_at' => 'datetime',
		'update_at' => 'datetime',
		'id_producto' => 'int'
	];

	protected $fillable = [
		'nom_producto',
		'des_producto',
		'cant_producto',
		'est_producto',
		'ventas_id_ventas',
		'intercambios_id_intercambio',
		'transacciones_id_transaccion',
		'create_at',
		'update_at',
		'id_producto'
	];

	public function intercambio()
	{
		return $this->hasOne(Intercambio::class, 'id_intercambio');
	}

	public function producto()
	{
		return $this->hasOne(Producto::class, 'id_producto');
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
