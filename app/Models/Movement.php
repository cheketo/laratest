<?php

namespace App\Models;

use DB;

use \PDO;

use Illuminate\Database\Eloquent\Model;

class Movement extends Model
{

		protected $connection = 'informix';

		protected $table = 'u806f_cuota';

		// protected $primaryKey = 'carrera'; //No usar el campo 'carrera' porque no funciona sino

}
