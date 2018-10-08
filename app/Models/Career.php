<?php

namespace App\Models;

use DB;

use \PDO;

use Illuminate\Database\Eloquent\Model;

class Career extends Model
{

		protected $connection = 'informix';

		protected $table = 'sga_carreras';

		// protected $primaryKey = 'carrera'; //No usar el campo 'carrera' porque no funciona sino

}
