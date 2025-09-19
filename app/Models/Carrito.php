<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Carrito
 * 
 * @property int $id_carrito
 * @property int|null $usuario_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 *
 * @package App\Models
 */
class Carrito extends Model
{
	protected $table = 'carritos';
	protected $primaryKey = 'id_carrito';

	protected $casts = [
		'usuario_id' => 'int'
	];

	protected $fillable = [
		'usuario_id'
	];
	    public function items()
    {
        return $this->hasMany(CarritoItem::class, 'carrito_id');
    }

    // Relación con usuario (opcional)
    public function usuario()
    {
        return $this->belongsTo(User::class, 'usuario_id');
    }
}

