<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MovementType extends Model
{

		protected $table = 'movement_types';

		protected $fillable =
		[

				'name', 'type'

		];

		public function movements()
		{

				return $this->hasMany( 'App\Movement', 'movement_id' );

		}

}
