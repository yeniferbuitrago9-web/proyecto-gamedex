<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Publicacione
 * 
 * @property int $id_publicacion
 * @property int|null $usuario_id
 * @property string|null $tipo
 * @property int|null $producto_id
 * @property int|null $venta_id
 * @property string $contenido
 * @property Carbon|null $fecha
 *
 * @package App\Models
 */
class Publicacione extends Model
{
	protected $table = 'publicaciones';
	protected $primaryKey = 'id_publicacion';
	public $timestamps = false;

	protected $casts = [
		'usuario_id' => 'int',
		'producto_id' => 'int',
		'venta_id' => 'int',
		'fecha' => 'datetime'
	];

	protected $fillable = [
		'usuario_id',
		'tipo',
		'producto_id',
		'venta_id',
		'contenido',
		'fecha'
	];
}
