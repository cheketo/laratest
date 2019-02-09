<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index( Request $request )
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

						$orderField = 'roles.id';

				}

				if( $request->get( 'view_order_mode' ) )
				{

						$orderMode = $request->get( 'view_order_mode' );

				}else{

						$orderMode = 'asc';

				}

				$results = Role::select( 'roles.*' )
													->name( $request->get( 'name' ) )
													->description( $request->get( 'description' ) )
													->id( $request->get( 'role_id' ) )
													->status( $request->get( 'status' ) )
													->route( $request->get( 'route' ) )
													->orderBy( $orderField, $orderMode )
													->paginate( $PerPage );
													// ->toSql();

				// dd( $results );

				return view( 'roles.list', [ 'results' => $results ] );

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

				return view( 'roles.create' );

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
				if( $request->ajax() )
				{

						$new 							= new Role();

						$new->name 				= $request->name;

						$new->description = $request->description;

						$routes 					= $request->route ? explode( ',', $request->route ) : array() ;

						$new->save();

						foreach( $routes as $routeId )
						{

								$new->routes()->attach( $routeId );

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
    public function show( $id )
    {

				$show = Role::find( $id );

				return view( 'roles.show', compact( 'show' ) );

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit( $id )
    {

				$edit = Role::find( $id );

				return view( 'roles.edit', [ 'edit' => $edit ] );

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

						$edit 						= Role::find( $id );

						if( $edit )
						{

								$edit->name 				= $request->name;

								$edit->description 	= $request->description;

								$routes 						= $request->route ? explode( ',', $request->route ) : array() ;

								$edit->routes()->sync( $routes );

								$edit->update();

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

						$delete 						= Role::find( $id );

						$delete->status 		= $status;

						$delete->update();

						return true;

				}else{

						return false;

				}

		}

		public static function getSelectValues()
		{
				$roles = array();

				foreach( Role::all() as $role)
				{

						$roles[$role->id] = $role->name;

				}

				return $roles;

		}

}
