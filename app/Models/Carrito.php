<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Carrito
 * 
 * @property int $id_carrito
 * @property Carbon $fecha_carrito
 * @property int $usuarios_id_usuario
 * 
 * @property Producto $producto
 * @property Collection|Usuario[] $usuarios
 *
 * @package App\Models
 */
class Carrito extends Model
{
	protected $table = 'carrito';
	protected $primaryKey = 'id_carrito';
	public $timestamps = false;

	protected $casts = [
		'fecha_carrito' => 'datetime',
		'usuarios_id_usuario' => 'int'
	];

	protected $fillable = [
		'fecha_carrito',
		'usuarios_id_usuario'
	];

	public function producto()
	{
		return $this->belongsTo(Producto::class, 'id_carrito');
	}

	public function usuarios()
	{
		return $this->hasMany(Usuario::class, 'doc_usuario');
	}
}
