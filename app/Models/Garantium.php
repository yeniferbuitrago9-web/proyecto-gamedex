<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Garantium
 * 
 * @property int $id_garantia
 * @property string $prod_garantia
 * @property Carbon $fec_garantia
 * @property string $des_garantia
 * @property Carbon $create_at
 * @property Carbon $update_at
 * @property int $productos_id_producto1
 * @property int $usuarios_id_usuario
 * 
 * @property Producto|null $producto
 * @property Collection|Usuario[] $usuarios
 *
 * @package App\Models
 */
class Garantium extends Model
{
	protected $table = 'garantia';
	protected $primaryKey = 'id_garantia';
	public $timestamps = false;

	protected $casts = [
		'fec_garantia' => 'datetime',
		'create_at' => 'datetime',
		'update_at' => 'datetime',
		'productos_id_producto1' => 'int',
		'usuarios_id_usuario' => 'int'
	];

	protected $fillable = [
		'prod_garantia',
		'fec_garantia',
		'des_garantia',
		'create_at',
		'update_at',
		'productos_id_producto1',
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
