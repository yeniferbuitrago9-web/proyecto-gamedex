<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class IntercambioItem
 * 
 * @property int $id_item
 * @property int|null $intercambio_id
 * @property int|null $producto_id
 * @property string|null $tipo
 * @property int|null $cantidad
 *
 * @package App\Models
 */
class IntercambioItem extends Model
{
	protected $table = 'intercambio_items';
	protected $primaryKey = 'id_item';
	public $timestamps = false;

	protected $casts = [
		'intercambio_id' => 'int',
		'producto_id' => 'int',
		'cantidad' => 'int'
	];

	protected $fillable = [
		'intercambio_id',
		'producto_id',
		'tipo',
		'cantidad'
	];
}
