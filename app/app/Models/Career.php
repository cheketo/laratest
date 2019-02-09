<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Career extends Model
{

		public function group()
		{

				return $this->belongsTo( 'App\Models\CareerGroup', 'group_id' );

		}

		// Scopes

		public function scopeId( $query, $id )
		{

				if( is_numeric( $id ) && id > 0 )
				{

						return $query->where( 'careers.id', '=', $id );

				}

		}

		public function scopeGroupId( $query, $id )
		{

				if( is_numeric( $id ) && id > 0 )
				{

						return $query->where( 'careers.group_id', '=', $id );

				}

		}

		public function scopeGroupIsNullOr( $query, $id = null )
		{

				return $query->where( function( $query ) use ( $id )
				{

						$query->whereNull( 'careers.group_id' );

						if( $id )
						{

								$query->orWhere( 'careers.group_id', '=', $id );

						}

				});

		}

		public function scopeName( $query, $name )
		{

				if( trim( $name ) != '' )
				{

						return $query->where( 'careers.name', 'LIKE', '%' . $name . '%' );

				}

		}

		public function scopeShortName( $query, $name )
		{

				if( trim( $name ) != '' )
				{

						return $query->where( 'careers.short_name', 'LIKE', '%' . $name . '%' );

				}

		}

		public function scopeCode( $query, $code )
		{

				if( trim( $code ) != '' )
				{

						return $query->where( 'careers.code', 'LIKE', '%' . $code . '%' );

				}

		}

		public function scopeCodeEquals( $query, $code )
		{

				if( trim( $code ) != '' )
				{

						return $query->where( 'careers.code', '=', $code );

				}

		}

		public function scopeStatus( $query, $status )
		{

				if( trim( $status ) != '' )
				{

						return $query->where( 'careers.status', '=', $status );

				}

		}

}
