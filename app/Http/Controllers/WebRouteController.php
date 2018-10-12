<?php

namespace App\Http\Controllers;

use Auth;

use Illuminate\Http\Request;

use App\Models\WebRoute;

use App\Models\Middleware;

class WebRouteController extends Controller
{

		public function __construct()
		{

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

				$middlewares = Middleware::where( 'name', '!=', 'checkpermission' )->orderBy( 'name' )->get();

				return view( 'routes.create', compact( 'verbs', 'permissions', 'controllers', 'middlewares' ) );

	  }

	  /**
	   * Store a newly created resource in storage.
	   *
	   * @param  \Illuminate\Http\Request  $request
	   * @return \Illuminate\Http\Response
	   */
	  public function store( Request $request )
	  {

				if( $request->ajax() )
				{

						$new 							= new WebRoute();

						$new->name 				= $request->name;

						$new->route 			= $request->route;

						$new->permission 	= $request->permission;

						$new->verb 				= $request->verb;

						if( strtolower( $new->verb ) == 'view')
						{

								$new->view = $request->view;

						}else{

								$new->controller = $request->controller;

								$new->method = $request->method;

						}

						$new->save();

						if( $request->middlewares )
						{

								$sync_data = [];

								foreach( explode( ',', $request->middlewares ) as $id )
								{

										$position = $request->post( 'middleware_position_' . $id );

										$sync_data[ $id ] = [ 'position' => $position ];

								}

								$new->middlewares()->sync( $sync_data );

						}

						return response()->json(
						[

								'valid' => true

						]);

				}

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

				foreach( self::getControllersName() as $controller )
				{

						$controllers[ $controller ] = $controller;

				}

				foreach( self::getVerbsName() as $verb )
				{

						$verbs[ $verb ] = $verb;

				}

				$permissions = self::getPermissionsName( 'assoc' );

				$edit = WebRoute::find( $id );

				$middlewares = Middleware::where( 'name', '!=', 'checkpermission' )->where( 'status', '=', 'A' )->orderBy( 'name' )->get();

				return view( 'routes.edit', compact( 'edit', 'controllers', 'verbs', 'permissions', 'middlewares' ) );

	  }

	  /**
	   * Update the specified resource in storage.
	   *
	   * @param  \Illuminate\Http\Request  $request
	   * @param  int  $id
	   * @return \Illuminate\Http\Response
	   */
	  public function update( Request $request, $id )
	  {

				if( $request->ajax() )
				{

						$edit = WebRoute::find( $id );

						if( $edit )
						{

								$edit->name 			= $request->name;

								$edit->route 			= $request->route;

								$edit->permission = $request->permission;

								$edit->verb 			= $request->verb;

								if( strtolower( $edit->verb ) == 'view')
								{

										$edit->view = $request->view;

								}else{

										$edit->controller = $request->controller;

										$edit->method = $request->method;

								}

								$edit->update();

								if( $request->middlewares )
								{

										$sync_data = [];

										foreach( explode( ',', $request->middlewares ) as $id )
										{

												$position = $request->post( 'middleware_position_' . $id );

												$sync_data[ $id ] = [ 'position' => $position ];

										}

										$edit->middlewares()->sync( $sync_data );

								}else{

										$edit->middlewares()->detach();

								}

								return response()->json(
								[

										'valid' => true

								]);

						}else{

								return response()->json(
								[

										'valid' => false

								], 404);

						}

				}

	  }

		/**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete( Request $request, $id )
    {

				return response()->json(
				[

						'valid' => $this->changeStatus( $request, $id, 'I' )

				]);

    }

		/**
     * Activate the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function activate( Request $request, $id )
    {

				return response()->json(
				[

						'valid' => $this->changeStatus( $request, $id, 'A' )

				]);

    }

		public function changeStatus( $request, $id, $status )
		{
				if( $request->ajax() )
				{

						$delete 						= WebRoute::find( $id );

						$delete->status 		= $status;

						$delete->update();

						return true;

				}else{

						return false;

				}

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
