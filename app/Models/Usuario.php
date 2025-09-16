<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Usuario
 * 
 * @property int $id_usuario
 * @property string $doc_usuario
 * @property string $nombre
 * @property string|null $email
 * @property string $password
 * @property string|null $telefono
 * @property Carbon $created_at
 * @property Carbon $updated_at
 *
 * @package App\Models
 */
class Usuario extends Model
{
	protected $table = 'usuario';
	protected $primaryKey = 'id_usuario';

	protected $hidden = [
		'password'
	];

	protected $fillable = [
		'doc_usuario',
		'nombre',
		'email',
		'password',
		'telefono'
	];
}
