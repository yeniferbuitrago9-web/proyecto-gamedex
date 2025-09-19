<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class CarritoItem
 * 
 * @property int $id_item
 * @property int|null $carrito_id
 * @property int|null $producto_id
 * @property int|null $cantidad
 *
 * @package App\Models
 */
class CarritoItem extends Model
{
	protected $table = 'carrito_items';
	protected $primaryKey = 'id_item';
	public $timestamps = false;

	protected $casts = [
		'carrito_id' => 'int',
		'producto_id' => 'int',
		'cantidad' => 'int'
	];

	protected $fillable = [
		'carrito_id',
		'producto_id',
		'cantidad'
	];
	    public function carrito()
    {
        return $this->belongsTo(Carrito::class, 'carrito_id');
    }

    // Item pertenece a un producto
    public function producto()
    {
        return $this->belongsTo(Producto::class, 'producto_id');
    }
}
