<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Middleware extends Model
{
		protected $fillable = [

				'name', 'object'

		];

		public function routes()
		{

				return $this->belongsToMany( 'App\Models\WebRoute', 'middleware_route', 'middleware_id', 'route_id' )->withTimestamps()->withPivot( 'position' );

		}

		public function getClass()
		{

				return '\Illuminate\Auth\Middleware\\' . $this->class;

		}

		// Scopes
		public function scopeName( $query, $name )
		{

				if( trim( $name ) != '' )
				{

						$query->where( 'middlewares.name', 'LIKE', '%' . $name . '%' );

				}

		}

		public function scopeClass( $query, $class )
		{

				if( trim( $class ) != '' )
				{

						$query->where( 'middlewares.class', 'LIKE', '%' . $class . '%' );

				}

		}

		public function scopeDescription( $query, $description )
		{

				if( trim( $description ) != '' )
				{

						$query->where( 'middlewares.description', 'LIKE', '%' . $description . '%' );

				}

		}

		public function scopeId( $query, $id )
		{

				if( trim( $id ) != '' )
				{

						$query->where( 'middlewares.id', $id );

				}

		}

}
