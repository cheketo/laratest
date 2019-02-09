<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\PriceHistory;

class PriceHistoryController extends Controller
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

						$orderField = 'price_history.created_at';

				}

				if( $request->get( 'view_order_mode' ) )
				{

						$orderMode = $request->get( 'view_order_mode' );

				}else{

						$orderMode = 'desc';

				}

				$results = PriceHistory::categoryId( $request->get( 'category' ) )
													->groupId( $request->get( 'group' ) )
													->createdAtFrom( $request->get( 'created_at_from' ) )
													->createdAtTo( $request->get( 'created_at_to' ) )
													->orderBy( $orderField, $orderMode )
													->paginate( $PerPage );
													// ->toSql();

				// dd( $results );

				$formRoute 	= 'price_history_list';

				$viewPath 	= 'prices.history';

				return view( 'layouts.private.list', compact( 'results', 'formRoute', 'viewPath' ) );

		}

}
