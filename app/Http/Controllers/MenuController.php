<?php

namespace App\Http\Controllers;

use Auth;

use Illuminate\Http\Request;

use App\Models\Menu;

use App\Models\WebRoute;

class MenuController extends Controller
{

		public static function getSelectValues( $where = array(), $isNull = array(), $isNotNull = array() )
		{

				$menus = Menu::selectValues( $where, $isNull, $isNotNull )->get();

				$values = array();

				foreach( $menus as $menu)
				{

						$values[ $menu->id ] = $menu->getRoute();

				}

				return $values;

		}

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

						$orderField = 'menus.id';

				}

				if( $request->get( 'view_order_mode' ) )
				{

						$orderMode = $request->get( 'view_order_mode' );

				}else{

						$orderMode = 'asc';

				}

				$results = Menu::select( 'menus.*' )
													->titleMenu( $request->get( 'title_menu' ) )
													->id( $request->get( 'menu_id' ) )
													->status( $request->get( 'status' ) )
													->parentName( $request->get( 'parent' ) )
													->route( $request->get( 'route' ) )
													->orderBy( $orderField, $orderMode )
													->paginate( $PerPage );
													// ->toSql();

				// dd( $results );

				return view( 'menus.list', [ 'results' => $results ] );

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

				return view( 'menus.create' );

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

						$new 							= new Menu();

						$new->title_menu 	= $request->title_menu;

						$new->title_page  = $request->title_page ? $request->title_page : $request->title_menu ;

						$new->title_tab  = $request->title_tab ? $request->title_tab : $request->title_menu ;

						$new->icon 	= $request->icon ? $request->icon : 'fa fa-circle' ;

						$new->position 	= $request->position ;

						if( $request->parent > 0 )
						{

								$new->parent_id = $request->parent;

						}

						if( $request->route > 0 )
						{

								$new->route_id = $request->route;

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
    public function show( $id )
    {

        return view( 'menus.show' );

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit( $id )
    {

				$edit = Menu::find( $id );

        return view( 'menus.edit', [ 'edit' => $edit ] );

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

				if( $request->ajax() )
				{

						$edit 						= Menu::find( $id );

						if( $edit )
						{

								$edit->title_menu 	= $request->title_menu;

								if( $request->title_page )
								{

										$edit->title_page  = $request->title_page;

								}

								if( $request->title_tab )
								{

										$edit->title_tab  = $request->title_tab;

								}

								if( $request->icon )
								{

										$edit->icon  = $request->icon;

								}

								$edit->position 	= $request->position ;

								if( $request->parent > 0 )
								{

										$edit->parent_id = $request->parent;

								}

								if( $request->route > 0 )
								{

										$edit->route_id = $request->route;

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

						$delete 						= Menu::find( $id );

						$delete->status 		= $status;

						$delete->update();

						return true;

				}else{

						return false;

				}

		}

		public static function getParentMenus()
		{

				return Menu::where( 'parent_id', '=', null )->where( 'status', '=', 'A' )->orderBy( 'position', 'ASC' )->get();

		}

		public static function isAncestor( $menu, $child )
		{

				$ancestors = $child->getParents();

				return $ancestors->contains( 'id', $menu->id );

		}

}
