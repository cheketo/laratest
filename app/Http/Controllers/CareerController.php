<?php

namespace App\Http\Controllers;

use Auth;

use Illuminate\Http\Request;

use App\Models\Guarani\Career as GuaraniCareer;

use App\Models\Career;

class CareerController extends Controller
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

 						$orderField = 'careers.code';

 				}

 				if( $request->get( 'view_order_mode' ) )
 				{

 						$orderMode = $request->get( 'view_order_mode' );

 				}else{

 						$orderMode = 'asc';

 				}

 				$results = Career::name( $request->get( 'name' ) )
													->code( $request->get( 'code' ) )
													->orderBy( $orderField, $orderMode )
													->paginate( $PerPage );
 														// ->toSql();



 				// dd( $results );

				$formRoute 	= 'career_list';

				$viewPath 	= 'careers';

				return view( 'layouts.private.list', compact( 'results', 'formRoute', 'viewPath' ) );
    		// return view( 'careers.list', compact( 'results' ) );

		}

		public static function getSelectValues()
		{
				$careers = array();

				foreach( GuaraniCareer::all() as $career)
				{

						$careers[ $career->carrera ] = $career->nombre_reducido;

				}

				return $careers;

		}

		public static function insertNewCareers()
		{

				$careers = GuaraniCareer::all();

				foreach( $careers as $guaraniCareer )
				{

						$career = Career::codeEquals( $guaraniCareer->carrera )->first();

						if( !$career )
						{

								$career = new Career();

								$career->code = $guaraniCareer->carrera;

								$career->name = $guaraniCareer->nombre;

								$career->short_name = $guaraniCareer->nombre_reducido;

								$career->status = $guaraniCareer->estado;

								if( $guaraniCareer->carrera == 'PRDOC' || $guaraniCareer->carrera == 'DOCTO' )
								{

										$career->group_id = 2;

								}else{

										$firstLetter = substr( trim( $guaraniCareer->carrera ), 0, 1 );

										switch( strtoupper( $firstLetter ) )
										{

											case 'M':

													$career->group_id = 1;

											break;

											case 'C':

													$career->group_id = 3;

											break;

											case 'E':

													$career->group_id = 4;

											break;

											case 'P':

													$career->group_id = 5;

											break;

											case 'A':

													$career->group_id = 6;

											break;

										}

								}

								$career->save();

						}

				}

		}

		public static function getCareer( $guaraniCareer )
		{

				if( $guaraniCareer )
				{

						$career = Career::codeEquals( $guaraniCareer )->first();

						if( $career )
						{

								return $career;

						}

				}

				return false;

		}

}
