<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudentCategory extends Model
{

		protected $fillable =
		[

				'name', 'description', 'status', 'foreaign_id'

		];

		public function groups()
		{

				return $this->belongsToMany( 'App\Models\CareerGroup', 'prices', 'category_id', 'group_id' )->withTimestamps()->withPivot( 'enrollment_amount', 'enrollment_price', 'fee_amount', 'fee_price' );

		}

		// Scopes

		public function scopeName( $query, $name )
		{

				if( trim( $name ) != '' )
				{

						return $query->where( 'student_categories.name', 'LIKE', '%' . $name . '%' );

				}

		}

		public function scopeDescription( $query, $description )
		{

				if( trim( $description ) != '' )
				{

						return $query->where( 'student_categories.description', 'LIKE', '%' . $description . '%' );

				}

		}

		public function scopeForeignId( $query, $id )
		{

				if( trim( $id ) != '' )
				{

						return $query->where( 'student_categories.foreign_id', $id );

				}

		}

		public function scopeId( $query, $id )
		{

				if( trim( $id ) != '' )
				{

						return $query->where( 'student_categories.id', $id );

				}

		}

		public function scopeStatus( $query, $status )
		{

				if( trim( $status ) != '' )
				{

						$query->where( 'student_categories.status', $status );

				}

		}

}
