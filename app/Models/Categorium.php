<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Categorium
 * 
 * @property int $id_categoria
 * @property string $nom_categoria
 * @property int $est_categoria
 * @property Carbon $create_at
 * @property Carbon $update_at
 * 
 * @property Producto $producto
 *
 * @package App\Models
 */
class Categorium extends Model
{
	protected $table = 'categoria';
	protected $primaryKey = 'id_categoria';
	public $timestamps = false;

	protected $casts = [
		'est_categoria' => 'int',
		'create_at' => 'datetime',
		'update_at' => 'datetime'
	];

	protected $fillable = [
		'nom_categoria',
		'est_categoria',
		'create_at',
		'update_at'
	];

	public function producto()
	{
		return $this->belongsTo(Producto::class, 'id_categoria');
	}
}
