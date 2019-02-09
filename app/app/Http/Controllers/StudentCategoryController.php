<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\StudentCategory;

use App\Models\CareerGroup;

class StudentCategoryController extends Controller
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

						$orderField = 'student_categories.id';

				}

				if( $request->get( 'view_order_mode' ) )
				{

						$orderMode = $request->get( 'view_order_mode' );

				}else{

						$orderMode = 'asc';

				}

				$results = StudentCategory::select( 'student_categories.*' )
													->name( $request->get( 'name' ) )
													->description( $request->get( 'description' ) )
													->foreignId( $request->get( 'foreign_id' ) )
													->id( $request->get( 'category_id' ) )
													->orderBy( $orderField, $orderMode )
													->paginate( $PerPage );
													// ->toSql();

				// dd( $results );

				return view( 'students.categories.list', compact( 'results' ) );

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view( 'students.categories.create' );

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

						$new 							= new StudentCategory();

						$new->name 				= $request->name;

						$new->description = $request->description;

						$new->foreign_id = $request->foreign;

						$new->save();

						$groups = CareerGroup::status( 'A' )->get();

						foreach( $groups as $group )
						{

								$ids[ $group->id ] = [ 'enrollment_amount' => '0', 'enrollment_price' => '0', 'fee_amount' => '0', 'fee_price' => '0' ];

						}

						$new->groups()->sync( $ids );

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

				$edit = StudentCategory::find( $id );

				return view( 'students.categories.edit', compact( 'edit' ) );

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

						$edit 						= StudentCategory::find( $id );

						if( $edit )
						{

								$edit->name 				= $request->name;

								$edit->description 	= $request->description;

								$edit->foreign_id 	= $request->foreign;

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

						$delete 						= StudentCategory::find( $id );

						$delete->status 		= $status;

						$delete->update();

						return true;

				}else{

						return false;

				}

		}

		public function validateName( Request $request )
		{

				if( $request->ajax() )
				{

						$name = request()->input( 'name' );

						$results = StudentCategory::where( [ 'name' => $name ] );

						if( request()->input( 'actualvalue' ) )

								$results->where( 'name', '!=' , request()->input( 'actualvalue' ) );

						$results->get();

						$valid = true;

						if( $results->count() > 0 )
						{

								$valid = false;

						}

						return response()->json(
						[

								'valid' => $valid

						]);

				}

		}

		public function validateForeign( Request $request )
		{

				if( $request->ajax() )
				{

						$foreign = request()->input( 'foreign' );

						$results = StudentCategory::where( [ 'foreign_id' => $foreign ] );

						if( request()->input( 'actualvalue' ) )

								$results->where( 'foreign_id', '!=' , request()->input( 'actualvalue' ) );

						$results->get();

						$valid = true;

						if( $results->count() > 0 )
						{

								$valid = false;

						}

						return response()->json(
						[

								'valid' => $valid

						]);

				}

		}

}
