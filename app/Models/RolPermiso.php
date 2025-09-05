<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class RolPermiso
 * 
 * @property int $id_rol
 * @property int $id_permiso
 * 
 * @property Rol $rol
 * @property Permiso|null $permiso
 *
 * @package App\Models
 */
class RolPermiso extends Model
{
	protected $table = 'rol_permiso';
	public $timestamps = false;

	protected $casts = [
		'id_permiso' => 'int'
	];

	public function rol()
	{
		return $this->belongsTo(Rol::class, 'id_rol');
	}

	public function permiso()
	{
		return $this->hasOne(Permiso::class, 'id_permiso');
	}
}
