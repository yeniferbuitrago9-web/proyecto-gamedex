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
 * @property int $id_ventas
 * @property string $producto
 * @property Carbon $fecha_venta
 * @property string $total
 * @property int $usuarios_id_usuario
 * @property int $cantidad
 * 
 * @property Comprobante $comprobante
 * @property Transaccione $transaccione
 * @property Pasarela $pasarela
 *
 * @package App\Models
 */
class Venta extends Model
{
	protected $table = 'ventas';
	protected $primaryKey = 'id_ventas';
	public $timestamps = false;

	protected $casts = [
		'fecha_venta' => 'datetime',
		'usuarios_id_usuario' => 'int',
		'cantidad' => 'int'
	];

	protected $fillable = [
		'producto',
		'fecha_venta',
		'total',
		'usuarios_id_usuario',
		'cantidad'
	];

	public function comprobante()
	{
		return $this->belongsTo(Comprobante::class, 'id_ventas');
	}

	public function transaccione()
	{
		return $this->belongsTo(Transaccione::class, 'id_ventas');
	}

	public function pasarela()
	{
		return $this->belongsTo(Pasarela::class, 'id_ventas');
	}
}
