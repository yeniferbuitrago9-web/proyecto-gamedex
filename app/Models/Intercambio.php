<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Intercambio
 * 
 * @property int $id_intercambio
 * @property int|null $usuario_origen_id
 * @property int|null $usuario_receptor_id
 * @property string|null $estado
 * @property Carbon|null $fecha
 *
 * @package App\Models
 */
class Intercambio extends Model
{
	protected $table = 'intercambios';
	protected $primaryKey = 'id_intercambio';
	public $timestamps = false;

	protected $casts = [
		'usuario_origen_id' => 'int',
		'usuario_receptor_id' => 'int',
		'fecha' => 'datetime'
	];

	protected $fillable = [
		'usuario_origen_id',
		'usuario_receptor_id',
		'estado',
		'fecha'
	];
}
