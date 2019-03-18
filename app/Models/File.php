<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{

		protected $fillable = [
				'name', 'original_name', 'route', 'size', 'type',
		];

		public function fileExist()
		{

				return file_exists( $this->route );

		}

		// Scopes

		public function scopeRoute( $query, $route )
		{

				if( trim( $route ) != '' )
				{

						return $query->where( 'route', 'LIKE', '%' . $route . '%' );

				}

		}

}
