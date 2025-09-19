<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Producto
 * 
 * @property int $id_producto
 * @property int|null $usuario_id
 * @property int|null $categoria_id
 * @property string $nombre
 * @property string|null $descripcion
 * @property float $precio
 * @property int|null $cantidad
 * @property int|null $dias_garantia
 * @property Carbon $created_at
 * @property Carbon $updated_at
 *
 * @package App\Models
 */
class Producto extends Model
{
	protected $table = 'productos';
	protected $primaryKey = 'id_producto';

	protected $casts = [
		'usuario_id' => 'int',
		'categoria_id' => 'int',
		'precio' => 'float',
		'cantidad' => 'int',
		'dias_garantia' => 'int'
	];

	protected $fillable = [
		'usuario_id',
		'categoria_id',
		'nombre',
		'descripcion',
		'precio',
		'cantidad',
		'dias_garantia'
	];

	public function categoria()
{
    return $this->belongsTo(Categoria::class, 'categoria_id');
}
public function usuario()
{
    return $this->belongsTo(\App\Models\Usuario::class, 'id_usuario', 'id_usuario');
}
public function carritos()
{
    return $this->hasMany(Carrito::class, 'producto_id');
}
}
