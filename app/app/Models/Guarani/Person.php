<?php

namespace App\Models\Guarani;

use DB;

use \PDO;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{

		protected $connection = 'informix';

		protected $table = 'sga_personas';

		protected $primaryKey = 'nro_documento';

		public function scopeDocument( $query )
		{

				return $query->whereNotNull( 'nro_documento' )->where( 'nro_documento', '>', '0' );

		}

		public function scopeInscription( $query )
		{

				return $query->whereNotNull( 'nro_inscripcion' );

		}

		public function scopeNroInscripcion( $query, $id )
		{

				return $query->where( 'nro_inscripcion', $id );

		}

}
