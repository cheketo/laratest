<?php

namespace App\Models;

use DB;

use \PDO;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{

		protected $connection = 'informix';

		protected $table = 'sga_alumnos';

		// protected $primaryKey = 'legajo';

		public function careers()
		{

				return $this->belongsTo( 'App\Models\Career', 'carrera', 'carrera' );

		}

}
