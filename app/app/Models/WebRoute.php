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

				return $this->belongsToMany( 'App\Models\Middleware', 'middleware_route', 'route_id', 'middleware_id' )->withTimestamps()->withPivot( 'position' );

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

		public function hasRole( $role )
		{

				if( !is_object( $role ) )
				{

						if( is_numeric( $role ) )
						{

								$role = Role::id( $role )->status( 'A' )->first();

						}else{

								$role = Role::name( $role )->status( 'A' )->first();

						}

				}

				if( is_object( $role ) )
				{

						// if( $role->id == 1 )
						// {
						//
						// 		return true;
						//
						// }

						foreach( $role->routes as $route )
						{

								if( $route->id == $this->id )
								{

										return true;

								}

						}

				}

				return false;

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

		public function scopeStatus( $query, $status )
		{

				if( trim( $status ) != '' )
				{

						$query->where( 'routes.status', $status );

				}

		}

		public static function scopeSelectValues( $query, $where = array(), $isNull = array(), $isNotNull = array() )
		{

				if( !empty( $where ) )
				{

						$query->where( $where );

				}

				if( !empty( $isNull ) )
				{

						foreach( $isNull as $field )
						{

								$query->whereNull( $field );

						}

				}

				if( !empty( $isNotNull ) )
				{

						foreach( $isNotNull as $field )
						{

								$query->whereNotNull( $field );

						}

				}

				return $query;

		}

}
