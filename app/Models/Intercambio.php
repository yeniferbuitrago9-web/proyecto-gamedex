<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Intercambio
 * 
 * @property int $id_intercambio
 * @property string $id_usuario_receptor
 * @property string $prod_intercambio
 * @property int $estad_intercambio
 * @property Carbon $create_at
 * @property Carbon $update_at
 * @property int $productos_id_producto
 * @property int $usuarios_id_usuario
 * @property int $usuarios_doc_usuario
 * 
 * @property Comprobante $comprobante
 * @property Transaccione $transaccione
 * @property Pasarela $pasarela
 * @property Producto|null $producto
 * @property Collection|Usuario[] $usuarios
 *
 * @package App\Models
 */
class Intercambio extends Model
{
	protected $table = 'intercambios';
	protected $primaryKey = 'id_intercambio';
	public $timestamps = false;

	protected $casts = [
		'estad_intercambio' => 'int',
		'create_at' => 'datetime',
		'update_at' => 'datetime',
		'productos_id_producto' => 'int',
		'usuarios_id_usuario' => 'int',
		'usuarios_doc_usuario' => 'int'
	];

	protected $fillable = [
		'id_usuario_receptor',
		'prod_intercambio',
		'estad_intercambio',
		'create_at',
		'update_at',
		'productos_id_producto',
		'usuarios_id_usuario',
		'usuarios_doc_usuario'
	];

	public function comprobante()
	{
		return $this->belongsTo(Comprobante::class, 'id_intercambio');
	}

	public function transaccione()
	{
		return $this->belongsTo(Transaccione::class, 'id_intercambio');
	}

	public function pasarela()
	{
		return $this->belongsTo(Pasarela::class, 'id_intercambio');
	}

	public function producto()
	{
		return $this->hasOne(Producto::class, 'id_producto');
	}

	public function usuarios()
	{
		return $this->hasMany(Usuario::class, 'doc_usuario');
	}
}
