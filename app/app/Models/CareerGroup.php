<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CareerGroup extends Model
{

		public function categories()
		{

				return $this->belongsToMany( 'App\Models\StudentCategory', 'prices', 'group_id', 'category_id' )->withTimestamps()->withPivot( 'enrollment_amount', 'enrollment_price', 'fee_amount', 'fee_price' );

		}

		public function careers()
		{

				return $this->hasMany( 'App\Models\Career', 'group_id' );

		}


		public function scopeName( $query, $name )
		{

				if( trim( $name ) != '' )
				{

						return $query->where( 'career_groups.name', 'LIKE', '%' . $name . '%' );

				}

		}

		public function scopeNameEquals( $query, $name )
		{

				if( trim( $name ) != '' )
				{

						return $query->where( 'career_groups.name', '=', $name );

				}

		}

		public function scopeDescription( $query, $description )
		{

				if( trim( $description ) != '' )
				{

						return $query->where( 'career_groups.description', 'LIKE', '%' . $description . '%' );

				}

		}

		public function scopePrefixes( $query, $prefixes )
		{

				if( trim( $prefixes ) != '' )
				{

						$query->where( function( $query ) use ( $prefixes )
						{

								foreach( explode( ',', str_replace( ' ', '', $prefixes ) ) as $prefix )
								{

										$query->orWhere( 'career_groups.prefixes', 'LIKE', '%' . $prefix . '%' );

								}

            });

				}

		}

		public function scopeStatus( $query, $status )
		{

				if( trim( $status ) != '' )
				{

						return $query->where( 'career_groups.status', '=', $status );

				}

		}

		public function scopeId( $query, $id )
		{

				if( intval( $id ) > 0 )
				{

						return $query->where( 'career_groups.id', '=', $status );

				}

		}

}
