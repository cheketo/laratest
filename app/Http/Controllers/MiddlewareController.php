<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Middleware;

class MiddlewareController extends Controller
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

						$orderField = 'middlewares.id';

				}

				if( $request->get( 'view_order_mode' ) )
				{

						$orderMode = $request->get( 'view_order_mode' );

				}else{

						$orderMode = 'asc';

				}

				$results = Middleware::select( 'middlewares.*' )
													->name( $request->get( 'name' ) )
													->class( $request->get( 'class' ) )
													->description( $request->get( 'description' ) )
													->id( $request->get( 'middleware_id' ) )
													->orderBy( $orderField, $orderMode )
													->paginate( $PerPage );
													// ->toSql();

				// dd( $results );

				return view( 'middlewares.list', compact( 'results' ) );

		}

		/**
		 * Show the form for creating a new resource.
		 *
		 * @return \Illuminate\Http\Response
		 */
		public function create()
		{

				return view( 'middlewares.create' );

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

						$new 							= new Middleware();

						$new->name 	= $request->name;

						$new->class 	= str_replace( '/', '\\', $request->class );

						$new->description 	= $request->description;

						if( !strpos( $new->class, '\\' ) )
						{

								$new->class = '\\App\\Http\\Middleware\\' . $new->class;

						}

						$new->save();

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

				$edit = Middleware::find( $id );

				return view( 'middlewares.edit', compact( 'edit' ) );

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

						$edit 						= Middleware::find( $id );

						if( $edit )
						{

								$edit->name 	= $request->name;

								$edit->class 	= str_replace( '/', '\\', $request->class );

								$edit->description 	= $request->description;

								if( !strpos( $edit->class, '\\' ) )
								{

										$edit->class = '\\App\\Http\\Middleware\\' . $edit->class;

								}

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

						$delete 						= Middleware::find( $id );

						$delete->status 		= $status;

						$delete->update();

						return true;

				}else{

						return false;

				}

		}

		public function getRow( Request $request )
		{

				$id = $request->id;

				if( $request->ajax() && $id )
				{

						$middleware = Middleware::find( $id );

						$view = \View::make( 'middlewares.components.row', [ 'middleware' => $middleware ] );

						// dd( $view );

						$contents = $view->render();

						return response()->json(
						[

								'valid' => true,

								'contents' => $contents

						]);

				}


		}

}
