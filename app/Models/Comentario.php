<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Comentario
 * 
 * @property int $id_comentario
 * @property string|null $Descripcion
 * @property float $cal_comentario
 * @property int $est_comentario
 * @property Carbon $create_at
 * @property Carbon $update_at
 * @property int $id_producto
 * @property int $usuarios_id_usuario
 * 
 * @property Collection|Usuario[] $usuarios
 *
 * @package App\Models
 */
class Comentario extends Model
{
	protected $table = 'comentario';
	protected $primaryKey = 'id_comentario';
	public $timestamps = false;

	protected $casts = [
		'cal_comentario' => 'float',
		'est_comentario' => 'int',
		'create_at' => 'datetime',
		'update_at' => 'datetime',
		'id_producto' => 'int',
		'usuarios_id_usuario' => 'int'
	];

	protected $fillable = [
		'Descripcion',
		'cal_comentario',
		'est_comentario',
		'create_at',
		'update_at',
		'id_producto',
		'usuarios_id_usuario'
	];

	public function usuarios()
	{
		return $this->hasMany(Usuario::class, 'doc_usuario');
	}
}
