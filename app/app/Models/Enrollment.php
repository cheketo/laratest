<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Enrollment extends Model
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

		// Scopes

		public function scopeLastEnrollment( $query )
		{

				return $query->orderBy( 'id', 'desc' )->limit( 1 );

		}

		public function scopeLastStudentEnrollment( $query, $student )
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

						return $query->where( 'enrollments.student_id', '=', $id )->orderBy( 'id', 'desc' )->limit( 1 );

				}

		}

}
