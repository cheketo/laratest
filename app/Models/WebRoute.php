<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Collection;

class WebRoute extends Model
{
		/**
		 * The attributes that are mass assignable.
		 *
		 * @var array
		 */

		protected $table = 'routes';

		protected $fillable = [

				'route', 'name', 'verb', 'controller', 'method', 'view', 'private', 'permission',

		];

		public function menus()
		{

				return $this->hasMany( 'App\Models\Menu', 'route_id' );

		}

		public function roles()
		{

				return $this->belongsToMany( 'App\Models\Role', 'role_route', 'route_id', 'role_id' )->withTimestamps();

		}

		public function middlewares()
		{

				return $this->belongsToMany( 'App\Models\Middleware', 'middleware_route', 'route_id', 'middleware_id' )->withTimestamps();

		}

		public function getRoutes( $obj )
		{
				if ( $obj instanceof User )
				{

				 		return $this->getRoutesByUser( $obj );

				}else{

						return $this->getRoutesByRole( $obj );

				}

		}

		public function getRoutesByUser( $user )
		{

				// $roles = $user->roles();

		}

		public function getRoutesByRole( $role )
		{

				//

		}

		// Scopes
		public function scopeName( $query, $name )
		{

				if( trim( $name ) != '' )
				{

						$query->where( 'routes.name', 'LIKE', '%' . $name . '%' );

				}

		}

		public function scopeRoute( $query, $route )
		{

				if( trim( $route ) != '' )
				{

						$query->where( 'routes.route', 'LIKE', '%' . $route . '%' );

				}

		}

		public function scopeVerb( $query, $verb )
		{

				if( trim( $verb ) != '' )
				{

						$query->where( 'routes.verb', 'LIKE', '%' . $verb . '%' );

				}

		}

		public function scopePermission( $query, $permission )
		{

				if( trim( $permission ) != '' )
				{

						$query->where( 'routes.permission', 'LIKE', '%' . $permission . '%' );

				}

		}

		public function scopeController( $query, $controller )
		{

				if( trim( $controller ) != '' )
				{

						$query->where( 'routes.controller', 'LIKE', '%' . $controller . '%' );

				}

		}

		public function scopeMethod( $query, $method )
		{

				if( trim( $method ) != '' )
				{

						$query->where( 'routes.method', 'LIKE', '%' . $method . '%' );

				}

		}

		public function scopeId( $query, $id )
		{

				if( trim( $id ) != '' )
				{

						$query->where( 'routes.id', $id );

				}

		}

}
