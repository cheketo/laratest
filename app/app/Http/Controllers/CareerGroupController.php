<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\CareerGroup;

use App\Models\Career;

use App\Models\StudentCategory;

class CareerGroupController extends Controller
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

						$orderField = 'career_groups.id';

				}

				if( $request->get( 'view_order_mode' ) )
				{

						$orderMode = $request->get( 'view_order_mode' );

				}else{

						$orderMode = 'asc';

				}

				$results = CareerGroup::name( $request->get( 'name' ) )
													->description( $request->get( 'description' ) )
													->id( $request->get( 'group_id' ) )
													->status( $request->get( 'status' ) )
													->orderBy( $orderField, $orderMode )
													->paginate( $PerPage );
														// ->toSql();

				// dd( $results );

				$formRoute 	= 'career_group_list';

				$viewPath 	= 'careers.groups';

				return view( 'layouts.private.list', compact( 'results', 'formRoute', 'viewPath' ) );

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view( 'careers.groups.create' );

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

						$new 							= new CareerGroup();

						$new->name 				= $request->name;

						$new->description	= $request->description;

						$new->save();

						$careers = Career::whereIn( 'id', explode( ',', $request->careers ) )->get();

						foreach( $careers as $career )
						{

								$new->careers()->save( $career );

						}

						$categories = StudentCategory::status( 'A' )->get();

						foreach( $categories as $category )
						{

								$ids[ $category->id ] = [ 'enrollment_amount' => '0', 'enrollment_price' => '0', 'fee_amount' => '0', 'fee_price' => '0' ];

						}

						$new->categories()->sync( $ids );

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

				$show = CareerGroup::find( $id );

				return view( 'careers.groups.show', compact( 'show' ) );

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit( $id )
    {

				$edit = CareerGroup::find( $id );

				return view( 'careers.groups.edit', [ 'edit' => $edit ] );

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

						$edit = CareerGroup::find( $id );

						if( $edit )
						{

								$edit->name 				= $request->name;

								$edit->description 	= $request->description;

								$edit->update();

								foreach( $edit->careers as $career )
								{

										$career->group()->dissociate();

										$career->save();

								}

								$careers = Career::whereIn( 'id', explode( ',', $request->careers ) )->get();

								foreach( $careers as $career )
								{

										$edit->careers()->save( $career );

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

						$delete 						= CareerGroup::find( $id );

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

						$valid = true;

						$results = CareerGroup::nameEquals( request()->input( 'name' ) );

						if( request()->input( 'actualvalue' ) )
						{

								$results->where( 'career_groups.name', '!=' , request()->input( 'actualvalue' ) );

						}

						$results->get();

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

		public function validatePrefixes( Request $request )
		{

				if( $request->ajax() )
				{

						$valid = true;

						$results = CareerGroup::prefixes( request()->input( 'prefixes' ) );

						if( request()->input( 'actualvalue' ) )
						{

								$results->where( 'name', '!=' , request()->input( 'actualvalue' ) );

						}

						$result = $results->first();

						if( $result )
						{

								$valid = false;


						}

						return response()->json(
						[

								'valid' => $valid

						]);

				}

		}

		public static function getGroup( $guaraniCareer )
		{

				if( $guaraniCareer )
				{

						$career = Career::codeEquals( $guaraniCareer )->first();

						if( $career )
						{

								return $career->group;

						}

				}

				return false;

		}

}
