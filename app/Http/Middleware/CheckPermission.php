<?php

namespace App\Http\Middleware;

use Closure;

use App\Models\WebRoute;

use App\Http\Controllers\MenuController;

use Illuminate\Support\Facades\URL;

use Illuminate\Support\Facades\Auth;

class CheckPermission
{

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
		 * @param  String  $route_id
     * @return mixed
     */
    public function handle( $request, Closure $next, $route_id )
    {

				// dd( $params );
				//
				// $params = array_except(func_get_args(), [0,1]);
				// dd( $params );
				//
				// if( !$params )
				// 		dd( array_except(func_get_args(), [0,1]) );
				// else
				// 		dd( $params );




				$route = WebRoute::find( $route_id );

				if( $route )
				{

						session( [ 'active_route' => $route ] );

						if( $route[ 'permission' ] != 'public' )
						{

								if( !Auth::user() )
								{

										return abort( 403, 'Permiso Denegado' );

								}else{

										if( $route[ 'permission' ] == 'role' )
										{

												foreach( Auth::user()->roles as $role )
												{

														if( $role->status == 'A' )
														{

																foreach( $role->routes as $role_route )
																{

																		if( $role_route[ 'id' ] == $route->id )
																		{

																				return $next( $request );

																		}

																}

														}

												}

												return abort( 403, 'Permiso Denegado' );

										}

								}

						}

				}

        return $next( $request );
    }

}
