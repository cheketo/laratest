<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{

		protected $table = 'students';

		protected $fillable =
		[

				'foreign_id', 'balance', 'enrollment_amount', 'category_id', 'last_movement_id'

		];

		public function inscriptions()
		{

				return $this->hasMany( 'App\Models\Inscription', 'student_id' );

		}

		public function payments()
		{

				return $this->hasMany( 'App\Models\Payment', 'student_id' );

		}

		public function movements()
		{

				return $this->hasMany( 'App\Models\Movement', 'student_id' );

		}

		public function lastMovement()
		{

				return $this->hasOne( 'App\Models\Movement', 'id', 'movement_id' );

		}

		public function category()
		{

				return $this->hasOne( 'App\Models\StudentCategory', 'id', 'category_id' );

		}

		// Scopes
		public function scopeForeignId( $query, $id )
		{

				if( trim( $id ) != '' )
				{

						$query->where( 'students.foreign_id', '=', $id );

				}

		}

		public function scopeBalance( $query, $balance )
		{

				if( is_numeric( $balance ) )
				{

						$query->where( 'students.balance', '=', $balance );

				}

		}

		public function scopeBalanceFrom( $query, $balance )
		{

				if( is_numeric( $balance ) )
				{

						$query->where( 'students.balance', '>=', $balance );

				}

		}

		public function scopeBalanceTo( $query, $balance )
		{

				if( is_numeric( $balance ) )
				{

						$query->where( 'students.balance', '<=', $balance );

				}

		}

}
