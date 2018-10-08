<?php

namespace App\Http\Middleware;

use Closure;

use App\Models\User;

class UserCanBeEdited
{

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */

    public function handle( $request, Closure $next )
    {

				$user = User::find( $request->route( 'id' ) );

				if( !$user )
				{

						// return abort( 404 );
						return response()->view('errors.404', [], 404);

				}

				return $next($request);

    }

}
