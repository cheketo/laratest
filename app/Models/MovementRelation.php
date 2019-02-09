<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MovementRelation extends Model
{


		protected $fillable =
		[

				'student_id', 'amount', 'guarani_id', 'created_by'

		];

		public function credit()
    {

        return $this->morphTo();

    }

		public function debit()
    {

        return $this->morphTo();

    }

		public function student()
		{

				return $this->hasOne( 'App\Models\Student', 'id', 'student_id' );

		}

}
