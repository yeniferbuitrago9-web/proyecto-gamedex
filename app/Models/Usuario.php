<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Usuario
 * 
 * @property int $id_usuario
 * @property int $doc_usuario
 * @property string $nom_usuario
 * @property string $email_usuario
 * @property string $contra_usuario
 * @property int $Tel_usuario
 * @property Carbon $create_at
 * @property Carbon $update_at
 * @property int $id_rol
 * 
 * @property Producto $producto
 * @property Comentario $comentario
 * @property Inventario $inventario
 * @property Reporte $reporte
 * @property Carrito $carrito
 * @property Garantium $garantium
 * @property Rol|null $rol
 * @property Intercambio $intercambio
 *
 * @package App\Models
 */
class Usuario extends Model
{
	protected $table = 'usuarios';
	public $timestamps = false;

	protected $casts = [
		'doc_usuario' => 'int',
		'Tel_usuario' => 'int',
		'create_at' => 'datetime',
		'update_at' => 'datetime',
		'id_rol' => 'int'
	];

	protected $fillable = [
		'nom_usuario',
		'email_usuario',
		'contra_usuario',
		'Tel_usuario',
		'create_at',
		'update_at',
		'id_rol'
	];

	public function producto()
	{
		return $this->belongsTo(Producto::class, 'doc_usuario');
	}

	public function comentario()
	{
		return $this->belongsTo(Comentario::class, 'doc_usuario');
	}

	public function inventario()
	{
		return $this->belongsTo(Inventario::class, 'doc_usuario');
	}

	public function reporte()
	{
		return $this->belongsTo(Reporte::class, 'id_usuario');
	}

	public function carrito()
	{
		return $this->belongsTo(Carrito::class, 'doc_usuario');
	}

	public function garantium()
	{
		return $this->belongsTo(Garantium::class, 'doc_usuario');
	}

	public function rol()
	{
		return $this->hasOne(Rol::class, 'id_rol');
	}

	public function intercambio()
	{
		return $this->belongsTo(Intercambio::class, 'doc_usuario');
	}
}
