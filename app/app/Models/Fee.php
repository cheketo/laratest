<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Fee extends Model
{

		protected $fillable =
		[

				'inscription_id', 'movement_id', 'student_id', 'amount', 'number', 'student_balance', 'total_balance', 'due_date', 'guarani_id', 'status', 'created_by'

		];

		public function debts()
		{

			 	return $this->morphMany( 'App\Models\Debt', 'reference' );

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

		public function inscription()
		{

				return $this->hasOne( 'App\Models\inscription', 'id', 'inscription_id' );

		}

		public function createdBy()
		{

				return $this->hasOne( 'App\Models\User', 'id', 'created_by' );

		}

		// Customized functions

		public function payments()
		{

			

		}

		// Scopes

		public function scopeLastFee( $query )
		{

				return $query->orderBy( 'id', 'desc' )->limit( 1 )->first();

		}

		public function scopeLastStudentFee( $query, $student )
		{

				if( is_object( $student ) )
				{

						$id = $student->id;

				}else{

						$id = $student;

				}

				if( $id )
				{

						return $query->where( 'fees.student_id', '=', $id )->orderBy( 'id', 'desc' )->limit( 1 );

				}

		}

}
