<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Inventario
 * 
 * @property int $id_inventario
 * @property string $cantidad_inventario
 * @property string $producto_inventario
 * @property Carbon $update_at
 * @property Carbon $create_at
 * @property int $productos_id_producto
 * @property int $usuarios_id_usuario
 * 
 * @property Producto|null $producto
 * @property Collection|Usuario[] $usuarios
 *
 * @package App\Models
 */
class Inventario extends Model
{
	protected $table = 'inventario';
	protected $primaryKey = 'id_inventario';
	public $timestamps = false;

	protected $casts = [
		'update_at' => 'datetime',
		'create_at' => 'datetime',
		'productos_id_producto' => 'int',
		'usuarios_id_usuario' => 'int'
	];

	protected $fillable = [
		'cantidad_inventario',
		'producto_inventario',
		'update_at',
		'create_at',
		'productos_id_producto',
		'usuarios_id_usuario'
	];

	public function producto()
	{
		return $this->hasOne(Producto::class, 'id_producto');
	}

	public function usuarios()
	{
		return $this->hasMany(Usuario::class, 'doc_usuario');
	}
}
