<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Reporte
 * 
 * @property int $id_reporte
 * @property int $productos_id_producto
 * @property int $usuarios_id_usuario
 * 
 * @property Collection|Usuario[] $usuarios
 *
 * @package App\Models
 */
class Reporte extends Model
{
	protected $table = 'reportes';
	protected $primaryKey = 'id_reporte';
	public $timestamps = false;

	protected $casts = [
		'productos_id_producto' => 'int',
		'usuarios_id_usuario' => 'int'
	];

	protected $fillable = [
		'productos_id_producto',
		'usuarios_id_usuario'
	];

	public function usuarios()
	{
		return $this->hasMany(Usuario::class, 'id_usuario');
	}
}
