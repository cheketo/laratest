<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\GuaraniImporter;

class GuaraniImporterController extends Controller
{

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

						$orderField = 'guarani_imports.id';

				}

				if( $request->get( 'view_order_mode' ) )
				{

						$orderMode = $request->get( 'view_order_mode' );

				}else{

						$orderMode = 'asc';

				}

				$results = GuaraniImporter::orderBy( $orderField, $orderMode )
													->paginate( $PerPage );
														// ->toSql();

				// dd( $results );

				$formRoute 	= 'import_list';

				$viewPath 	= 'imports';

				return view( 'layouts.private.list', compact( 'results', 'formRoute', 'viewPath' ) );

		}

		public function import( Request $request )
		{

				if( $request->ajax() )
				{

						// \DB::beginTransaction();

						$new = new GuaraniImporter();

						$new->students = StudentController::importFromGuarani();

						$new->inscriptions = InscriptionController::importFromGuarani();

						$movements = MovementController::importFromGuarani();

						$new->payments = $movements[ 'payments' ];

						$new->fees = $movements[ 'fees' ];

						$new->enrollments = $movements[ 'enrollments' ];

						$new->movements = $movements[ 'movements' ];

						$new->user_id = auth()->user()->id;

						$new->save();

						// \DB::commit();

				}

		}

}
