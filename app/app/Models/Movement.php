<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Movement extends Model
{

    protected $table = 'movements';

		protected $fillable =
		[

				'student_id', 'amount', 'balance', 'concept', 'due_date', 'status', 'created_by'

		];

		public function reference()
    {

        return $this->morphTo();

    }

		public function student()
		{

				return $this->hasOne( 'App\Models\Student', 'id', 'student_id' );

		}

		public function createdBy()
		{

				return $this->hasOne( 'App\Models\User', 'id', 'created_by' );

		}

		// Scopes

		public function scopeLastMovement( $query )
		{

				return $query->orderBy( 'movements.id', 'desc' )->limit( 1 );

		}

		public function scopeLastStudentMovement( $query, $student )
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

						return $query->where( 'movements.student_id', '=', $id )->orderBy( 'movements.id', 'desc' )->limit( 1 );

				}

		}

}
