<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inscription extends Model
{

		protected $fillable =
		[

				'student_id', 'career_id'/*, 'group_id'*/, 'category_id', 'enrollment_code', 'status'

		];

		public function fees()
		{

				return $this->hasMany( 'App\Models\Fee', 'inscription_id' );

		}

		public function enrollments()
		{

				return $this->hasMany( 'App\Models\Enrollment', 'inscription_id' );

		}

		public function student()
		{

				return $this->hasOne( 'App\Models\Student', 'id', 'student_id' );

		}

		public function career()
		{

				return $this->hasOne( 'App\Models\Career', 'id', 'career_id' );

		}

		public function category()
		{

				return $this->hasOne( 'App\Models\StudentCategory', 'id', 'category_id' );

		}

		// Customized functions

		// public function payments()
		// {
		//
		// 		$fees = $this->fees();
		//
		// 		$enrollments = $this->enrollments();
		//
		// 		foreach( $fees as $fee )
		// 		{
		//
		// 				$payments = $fee->payments();
		//
		// 		}
		//
		//
		// }

		// Scopes

		public function scopeEnrollmentCode( $query, $code )
		{

				if( trim( $code ) != '' )
				{

						$query->where( 'inscriptions.enrollment_code', '=', $code );

				}

		}

		public function scopeStudentId( $query, $id )
		{

				if( trim( $id ) != '' )
				{

						$query->where( 'inscriptions.student_id', '=', $id );

				}

		}

}
