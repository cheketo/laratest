<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{

		protected $fillable =
		[

				'method_id', 'movement_id', 'student_id', 'amount', 'student_balance', 'total_balance', 'concept', 'guarani_id', 'status', 'created_by'

		];

		public function bonifications()
		{

			 	return $this->morphMany( 'App\Models\Bonification', 'reference' );

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

				return $this->morphMany( 'App\Models\MovementRelation', 'credit' );

		}

		public function student()
		{

				return $this->hasOne( 'App\Models\Student', 'id', 'student_id' );

		}

		public function method()
		{

				return $this->hasOne( 'App\Models\PaymentMethod', 'id', 'method_id' );

		}

		public function createdBy()
		{

				return $this->hasOne( 'App\Models\User', 'id', 'created_by' );

		}

		// Scopes

		public function scopeLastPayment( $query )
		{

				return $query->orderBy( 'id', 'desc' )->limit( 1 );

		}

		public function scopeLastStudentPayment( $query, $student )
		{

				if( is_object( $student ) )
				{

						$id = $student->id;

				}

				if( is_int( $student ) )
				{

						$id = $student;

				}

				if( $id )
				{

						return $query->where( 'payments.student_id', '=', $id )->orderBy( 'id', 'desc' )->limit( 1 );

				}

		}

}
