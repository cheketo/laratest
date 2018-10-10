<?php

use Illuminate\Support\Facades\Schema;


/*
|--------------------------------------------------------------------------
| Load Dynamic Middlewares
|--------------------------------------------------------------------------
|
| Middlewares are loaded from database
|
*/

if( Schema::hasTable( 'middlewares' ) )
{

		$middlewares = App\Models\Middleware::all();

}

if( $middlewares )
{

		foreach( $middlewares as $middleware )
		{

				if( !in_array( $middleware->class, $this->middleware ) )
				{

						$this->middleware[ $middleware->name ] = $middleware->class;

				}

		}

}



/*
|--------------------------------------------------------------------------
| Dynamic Web Routes
|--------------------------------------------------------------------------
|
| Web routes that are loaded from database
|
*/

if ( Schema::hasTable( 'routes' ) )
{

		$routes = App\Models\WebRoute::all();

}

if( $routes )
{

		foreach( $routes as $route )
		{

				$middlewares = $route->middlewares->map( function ( $middleware, $key )
				{

				    return $middleware->name;

				});

				$middlewares = $middlewares->toArray();

				array_unshift( $middlewares, 'checkpermission:' . $route[ 'id' ] );


				switch ( $route[ 'verb' ] )
				{

						case 'post':

								Route::post( $route[ 'route' ], $route[ 'controller' ] . '@' . $route[ 'method' ] )->name( $route[ 'name' ] )->middleware( $middlewares );

						break;

						case 'put':

								Route::put( $route[ 'route' ], $route[ 'controller' ] . '@' . $route[ 'method' ] )->name( $route[ 'name' ] )->middleware( $middlewares );

						break;

						case 'patch':

								Route::patch( $route[ 'route' ], $route[ 'controller' ] . '@' . $route[ 'method' ] )->name( $route[ 'name' ] )->middleware( $middlewares );

						break;

						case 'delete':

								Route::delete( $route[ 'route' ], $route[ 'controller' ] . '@' . $route[ 'method' ] )->name( $route[ 'name' ] )->middleware( $middlewares );

						break;

						case 'options':

								Route::options( $route[ 'route' ], $route[ 'controller' ] . '@' . $route[ 'method' ] )->name( $route[ 'name' ] )->middleware( $middlewares );

						break;

						case 'view':

								Route::view( $route[ 'route' ], $route[ 'name' ] )->middleware( $middlewares );

						break;

						default:

								Route::get( $route[ 'route' ], $route[ 'controller' ] . '@' . $route[ 'method' ] )->name( $route[ 'name' ] )->middleware( $middlewares );

						break;

				}

		}

}


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get( '/', 'Auth\LoginController@showLoginForm' );

Route::post( '/logout', 'Auth\LoginController@logout' )->name( 'logout' );

Route::get( '/login', 'Auth\LoginController@showLoginForm' );

Route::get( '/user/create', 'UserController@create' )->name( 'userCreate' );

// Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
// Route::post('/login', 'Auth\LoginController@login')->name('login')->middleware('userexist');

/*
|--------------------------------------------------------------------------
| Ajax Routes
|--------------------------------------------------------------------------
|
| Here is where you can register ajax routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group.
|
*/

Route::post( '/login', 'Auth\LoginController@login' )->name( 'login' )->middleware( 'userexist' );


// Route::post('/ajax/{controller}/{method}', function($controller,$method)
// {
//
//
//
// })->middleware('auth');
