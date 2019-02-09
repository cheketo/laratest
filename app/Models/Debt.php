<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Debt extends Model
{

		protected $fillable =
		[

				'movement_id', 'student_id', 'amount', 'concept', 'student_balance', 'total_balance','created_by'

		];

		public function reference()
    {

        return $this->morphTo();

    }

		public function movements()
		{

				return $this->morphMany( 'App\Models\Movement', 'reference' );

		}

		public function movement()
		{

				return $this->hasOne( 'App\Models\Movement', 'id', 'movement_id' );

		}

		public function movementRelations()
		{

				return $this->morphMany( 'App\Models\MovementRelation', 'debit' );

		}

		public function student()
		{

				return $this->hasOne( 'App\Models\Student', 'id', 'student_id' );

		}

		public function createdBy()
		{

				return $this->hasOne( 'App\Models\User', 'id', 'created_by' );

		}

}
