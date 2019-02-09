<?php

namespace App\Models\Misc;

use DB;

use \PDO;

use Illuminate\Database\Eloquent\Model;

class Movement extends Model
{

		protected $connection = 'posgrado_aux';

		// protected $table = 'u806f_cuota';

		// protected $primaryKey = 'carrera'; //No usar el campo 'carrera' porque no funciona sino

		protected $table = 'guarani_movements';

}
