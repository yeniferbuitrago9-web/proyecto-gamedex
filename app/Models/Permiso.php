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
 * 
 * @property RolPermiso $rol_permiso
 *
 * @package App\Models
 */
class Permiso extends Model
{
	protected $table = 'permiso';
	protected $primaryKey = 'id_permiso';
	public $timestamps = false;

	protected $fillable = [
		'nombre'
	];

	public function rol_permiso()
	{
		return $this->belongsTo(RolPermiso::class, 'id_permiso');
	}
}
