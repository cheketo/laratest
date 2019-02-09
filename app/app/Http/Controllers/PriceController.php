<?php

namespace App\Http\Controllers;

use App\Models\Price;

use App\Models\PriceHistory;

use Illuminate\Http\Request;

class PriceController extends Controller
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

						$orderField = 'prices.category_id';

				}

				if( $request->get( 'view_order_mode' ) )
				{

						$orderMode = $request->get( 'view_order_mode' );

				}else{

						$orderMode = 'asc';

				}

				$results = Price::categoryId( $request->get( 'category_id' ) )
													->groupId( $request->get( 'group_id' ) )
													->orderBy( $orderField, $orderMode )
													->paginate( $PerPage );



				// dd( $results );

				$formRoute 	= 'price_list';

				$viewPath 	= 'prices';

				return view( 'layouts.private.list', compact( 'results', 'formRoute', 'viewPath' ) );

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
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
    public function edit( $group_id, $category_id )
    {

        $edit = Price::groupId( $group_id )->categoryId( $category_id )->first();

				if( $edit )
				{

						return view( 'prices.edit', [ 'edit' => $edit ] );

				}

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update( Request $request, $group_id, $category_id )
    {

				if( $request->ajax() )
				{

						$edit = Price::groupId( $group_id )->categoryId( $category_id )->first();

						if( $edit )
						{

								if( is_numeric( $request->enrollment_amount ) && $request->enrollment_amount > 0 )
								{

										$edit->enrollment_amount 	= $request->enrollment_amount;

								}else{

										$edit->enrollment_amount 	= 0;

								}

								$edit->enrollment_price 	= str_replace( '$', '', $request->enrollment_price );

								if( is_numeric( $request->fee_amount ) && $request->fee_amount > 0 )
								{

										$edit->fee_amount 	= $request->fee_amount;

								}else{

										$edit->fee_amount 	= 0;

								}

								$edit->fee_price 	= str_replace( '$', '', $request->fee_price );

								$edit->update();

								$new = new PriceHistory();

								$new->user_id = auth()->user()->id;

								$new->group_id = $edit->group_id;

								$new->category_id = $edit->category_id;

								$new->enrollment_amount = $edit->enrollment_amount;

								$new->enrollment_price = $edit->enrollment_price;

								$new->fee_amount = $edit->fee_amount;

								$new->fee_price = $edit->fee_price;

								$new->save();

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
    public function destroy($id)
    {
        //
    }
}
