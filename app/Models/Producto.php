<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Producto
 * 
 * @property int $id_producto
 * @property string $nom_producto
 * @property string $des_producto
 * @property int $pre_producto
 * @property string $ima_producto
 * @property int $cant_producto
 * @property int $est_producto
 * @property Carbon $create_at
 * @property Carbon $update_at
 * @property int $id_categoria
 * @property int $usuarios_id_usuario
 * 
 * @property Inventario $inventario
 * @property Intercambio $intercambio
 * @property Garantium $garantium
 * @property Comprobante $comprobante
 * @property Carrito|null $carrito
 * @property Categorium|null $categorium
 * @property Collection|Usuario[] $usuarios
 *
 * @package App\Models
 */
class Producto extends Model
{
	protected $table = 'productos';
	protected $primaryKey = 'id_producto';
	public $timestamps = false;

	protected $casts = [
		'pre_producto' => 'int',
		'cant_producto' => 'int',
		'est_producto' => 'int',
		'create_at' => 'datetime',
		'update_at' => 'datetime',
		'id_categoria' => 'int',
		'usuarios_id_usuario' => 'int'
	];

	protected $fillable = [
		'nom_producto',
		'des_producto',
		'pre_producto',
		'ima_producto',
		'cant_producto',
		'est_producto',
		'create_at',
		'update_at',
		'id_categoria',
		'usuarios_id_usuario'
	];

	public function inventario()
	{
		return $this->belongsTo(Inventario::class, 'id_producto');
	}

	public function intercambio()
	{
		return $this->belongsTo(Intercambio::class, 'id_producto');
	}

	public function garantium()
	{
		return $this->belongsTo(Garantium::class, 'id_producto');
	}

	public function comprobante()
	{
		return $this->belongsTo(Comprobante::class, 'id_producto');
	}

	public function carrito()
	{
		return $this->hasOne(Carrito::class, 'id_carrito');
	}

	public function categorium()
	{
		return $this->hasOne(Categorium::class, 'id_categoria');
	}

	public function usuarios()
	{
		return $this->hasMany(Usuario::class, 'doc_usuario');
	}
}
