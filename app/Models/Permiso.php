<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Permiso
 * 
 * @property int $id_permiso
 * @property string $nombre
 * @property string|null $descripcion
 *
 * @package App\Models
 */
class Permiso extends Model
{
	protected $table = 'permisos';
	protected $primaryKey = 'id_permiso';
	public $timestamps = false;

	protected $fillable = [
		'nombre',
		'descripcion'
	];
}
