<?php

namespace App\Http\Controllers;

use Auth;

use Illuminate\Http\Request;

use App\Models\WebRoute;

// use App\Models\Student;

// use App\Models\Administrator;

class WebRouteController extends Controller
{

		public function __construct()
		{

				$this->middleware( 'auth' );

		}


		public static function getSelectValues( $where = array(), $isNull = array(), $isNotNull = array() )
		{

				$webRoutes = WebRoute::selectValues( $where, $isNull, $isNotNull )->get();

				$routes = array();

				foreach( $webRoutes as $route)
				{

						$routes[ $route->id ] = $route->route;

				}

				return $routes;

		}

	  /**
	   * Display a listing of the resource.
	   *
	   * @return \Illuminate\Http\Response
	   */
	  public function index( Request $request)
	  {

				if( $request->get( 'perpage' ) )
				{

						$PerPage = $request->get( 'perpage' );

				}else{

						$PerPage = 10;

				}

				if( $request->get( 'view_order_field' ) )
				{

						$orderField = $request->get( 'view_order_field' );

				}else{

						$orderField = 'routes.id';

				}

				if( $request->get( 'view_order_mode' ) )
				{

						$orderMode = $request->get( 'view_order_mode' );

				}else{

						$orderMode = 'asc';

				}

				$results = WebRoute::select( 'routes.*' )
													->name( $request->get( 'name' ) )
													->route( $request->get( 'route' ) )
													->verb( $request->get( 'verb' ) )
													->permission( $request->get( 'permission' ) )
													->controller( $request->get( 'controller' ) )
													->id( $request->get( 'route_id' ) )
													->orderBy( $orderField, $orderMode )
													->paginate( $PerPage );
													// ->toSql();

				// dd( $results );

				foreach( self::getControllersName() as $controller )
				{

						$controllers[ $controller ] = $controller;

				}

				foreach( self::getVerbsName() as $verb )
				{

						$verbs[ $verb ] = $verb;

				}

				$permissions = self::getPermissionsName( 'assoc' );

				return view( 'routes.list', compact( 'results', 'verbs', 'controllers', 'permissions' ) );
	  }

	  /**
	   * Show the form for creating a new resource.
	   *
	   * @return \Illuminate\Http\Response
	   */
	  public function create()
	  {

				foreach( self::getControllersName() as $controller )
				{

						$controllers[ $controller ] = $controller;

				}

				foreach( self::getVerbsName() as $verb )
				{

						$verbs[ $verb ] = $verb;

				}

				$permissions = self::getPermissionsName( 'assoc' );

				return view( 'routes.create', compact( 'verbs', 'permissions', 'controllers' ) );

	  }

	  /**
	   * Store a newly created resource in storage.
	   *
	   * @param  \Illuminate\Http\Request  $request
	   * @return \Illuminate\Http\Response
	   */
	  public function store( Request $request )
	  {

				//

	  }

	  /**
	   * Display the specified resource.
	   *
	   * @param  int  $id
	   * @return \Illuminate\Http\Response
	   */
	  public function show($id)
	  {
	      //
	  }

	  /**
	   * Show the form for editing the specified resource.
	   *
	   * @param  int  $id
	   * @return \Illuminate\Http\Response
	   */
	  public function edit( $id )
	  {

				$edit = WebRoute::find( $id );

				return view( 'routes.edit', [ 'edit' => $edit ] );

	  }

	  /**
	   * Update the specified resource in storage.
	   *
	   * @param  \Illuminate\Http\Request  $request
	   * @param  int  $id
	   * @return \Illuminate\Http\Response
	   */
	  public function update(Request $request, $id)
	  {
	      //
	  }

	  /**
	   * Remove the specified resource from storage.
	   *
	   * @param  int  $id
	   * @return \Illuminate\Http\Response
	   */
	  public function destroy($id)
	  {

	      //

	  }

		public static function getControllersName()
		{

				$controllers = array();

				$files = scandir( '../app/Http/Controllers' );

				foreach( $files as $file )
				{

						if( strpos( $file, 'Controller' ) )
						{

								$file = substr( $file, 0, strpos( $file, '.php' ) );

								$controllers[] = $file;

						}

				}

				return $controllers;

		}

		public static function getVerbsName()
		{

				return [ 'GET','POST', 'PUT', 'PATCH', 'DELETE', 'OPTIONS', 'VIEW' ];

		}

		public static function getPermissionsName( $mode = 'array' )
		{

				switch ( $mode )
				{
						case 'array':

								$permissions = [ 'public', 'private', 'role' ];

						break;

						case 'assoc':

								$permissions = [ 'public' => 'Público', 'private' => 'Privado', 'role' => 'Restringido' ];

						break;
				}

				return $permissions;

		}


}
