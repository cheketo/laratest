<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GuaraniImporter extends Model
{

    protected $table = 'guarani_imports';

		protected $fillable =
		[

				'students', 'inscriptions', 'movements', 'payments', 'user_id'

		];

		public function user()
		{

				return $this->hasOne( 'App\Models\User', 'id', 'user_id' );

		}

}
