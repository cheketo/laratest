<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Collection;
use App\Models\File;
use App\Http\Controllers\FileController;


class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'first_name', 'last_name', 'user', 'email', 'password', 'status' , 'image_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */

    protected $hidden = [

        'password', 'remember_token',

    ];

		const DEFAULT_IMAGE_URL = '/views/users/images/default/default.jpg';

		// public function __construct()
		// {
		//
		// 		$user->name = $user->first_name . ' ' . $user->last_name;
		//
		// }

		public function roles()
		{

				return $this->belongsToMany( Role::class )->withTimestamps();

		}

		public function image()
		{

				return $this->hasOne( File::class, 'id', 'image_id' );

		}

		public function hasAnyRole( $roles )
		{

				if( is_array( $roles ) )
				{

						foreach( $roles as $role )
						{

								if( $this->hasRole( $role ) )
								{

										return true;

								}

						}

				}else{

						if( $this->hasRole( $roles ) )
						{

								return true;

						}

				}

				return false;

		}

		public function hasRole( $role )
		{

				if( $this->roles()->where( 'name', $role )->first() )
				{

						return true;

				}

				return false;

		}

		// Scopes

		public function scopeFirstName( $query, $firstName )
		{

				if( trim( $firstName ) != '' )
				{

						return $query->where( 'first_name', 'LIKE', '%' . $firstName . '%' );

				}

		}

		public function scopeLastName( $query, $lastName )
		{

				if( trim( $lastName ) != '' )
				{

						return $query->where( 'last_name', 'LIKE', '%' . $lastName . '%' );

				}

		}

		public function scopeUser( $query, $user )
		{

				if( trim( $user ) != '' )
				{

						return $query->where( 'user', 'LIKE', '%' . $user . '%' );

				}

		}

		public function scopeId( $query, $id )
		{

				if( trim( $id ) != '' )
				{

						return $query->where( 'id', $id );

				}

		}

		// public function menus()
		// {
		//
		// 		$menus = collect( array() );
		//
		// 		$roles = $this->roles;
		//
		// 		foreach ( $roles as $role )
		// 		{
		//
		// 				$routes = $role->routes;
		//
		// 				foreach( $routes as $route )
		// 				{
		//
		// 						foreach( $route->menus as $menu )
		// 						{
		//
		// 								$menus[] = $menu;
		//
		// 								foreach( $menu->getParents() as $parent )
		// 								{
		//
		// 										if( !$menus->contains( $parent ) )
		//
		// 												$menus[] = $parent;
		//
		// 								}
		//
		// 						}
		//
		//
		// 				}
		//
		// 		}
		//
		// 		dd( $menus->sortBy( 'parent_id' ) );
		//
		// 		return $menus->sortBy( 'parent_id' );
		//
		// }

}
