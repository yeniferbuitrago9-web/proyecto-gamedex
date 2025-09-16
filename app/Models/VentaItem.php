<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class VentaItem
 * 
 * @property int $id_item
 * @property int|null $venta_id
 * @property int|null $producto_id
 * @property int $cantidad
 * @property float $precio_unitario
 *
 * @package App\Models
 */
class VentaItem extends Model
{
	protected $table = 'venta_items';
	protected $primaryKey = 'id_item';
	public $timestamps = false;

	protected $casts = [
		'venta_id' => 'int',
		'producto_id' => 'int',
		'cantidad' => 'int',
		'precio_unitario' => 'float'
	];

	protected $fillable = [
		'venta_id',
		'producto_id',
		'cantidad',
		'precio_unitario'
	];
}
