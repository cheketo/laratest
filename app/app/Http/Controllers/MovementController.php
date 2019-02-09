<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Payment;

use App\Models\Movement;

use App\Models\Student;

use App\Models\Inscription;

use App\Models\MovementType;

use App\Models\Guarani\Student as GuaraniStudent;

use App\Models\Guarani\Person as GuaraniPerson;

use App\Models\Guarani\Movement as GuaraniMovement;

use App\Models\Aux\Movement as AuxMovement;

class MovementController extends Controller
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

						$orderField = 'movements.id';

				}

				if( $request->get( 'view_order_mode' ) )
				{

						$orderMode = $request->get( 'view_order_mode' );

				}else{

						$orderMode = 'asc';

				}

				$results = Movement::studentId( $request->get( 'student_id' ) )
													->parentId( $request->get( 'parent_id' ) )
													->orderBy( $orderField, $orderMode )
													->paginate( $PerPage );



				// dd( $results );

				$formRoute 	= 'movement_list';

				$viewPath 	= 'movements';

				return view( 'layouts.private.list', compact( 'results', 'formRoute', 'viewPath' ) );

		}

		public function store( Request $request )
		{

				if( $request->ajax() )
				{

						$new	= new Movement();

						$new->student_id = $request->student;

						$new->amount = $request->amount;

						// This is incomplete

						$new->status = $request->status;

						$new->created_by = auth()->user()->id;

				}

		}

		public static function importFromGuarani()
		{

				$movements = 0;

				$enrollments = 0;

				$fees = 0;

				$payments = 0;

				\DB::beginTransaction();

				$inscriptions = Inscription::all();

				foreach( $inscriptions as $inscription )
				{

						$student = Student::find( $inscription->student_id );

						$enrollment_code = explode( '-', $inscription->enrollment_code );

						$guaraniMovements = AuxMovement::where( 'prefijo', $enrollment_code[ 0 ] )->where( 'legajo', $enrollment_code[ 1 ] )->orderBy( 'movimiento', 'ASC' )->orderBy( 'registro' )->get();

						foreach( $guaraniMovements as $guaraniMovement )
						{

								if( $guaraniMovement->importe > 0 )
								{

										if( $guaraniMovement->escobro == 0 && strtoupper( $guaraniMovement->movimiento ) == 'M' )
										{

												$enrollment = EnrollmentController::importFromGuarani( $student, $inscription, $guaraniMovement, $guaraniMovements ); // Create Fee

												$movement = MovementController::insert( $student, $enrollment, $enrollment->amount * ( -1 ) );

												$enrollment->movement_id = $movement->id;

												$enrollment->update();

												$enrollments++;

												$movements++;

										}elseif( $guaraniMovement->escobro == 0 && strtoupper( $guaraniMovement->movimiento ) == 'C' ){

												$fee = FeeController::importFromGuarani( $student, $inscription, $guaraniMovement, $guaraniMovements ); // Create Fee

												$movement = MovementController::insert( $student, $fee, $fee->amount * ( -1 ) );

												$fee->movement_id = $movement->id;

												$fee->update();

												$fees++;

												$movements++;

										}elseif( strtoupper( $guaraniMovement->movimiento ) == 'T' && $guaraniMovement->escobro == 1 ){

												$payment = PaymentController::importFromGuarani( $student, $guaraniMovement, $guaraniMovements ); // Create Payment

												$movement = MovementController::insert( $student, $payment, $payment->amount );

												$payment->movement_id = $movement->id;

												$payment->update();

												$payments++;

												$movements++;

										}

								}

						}

				}

				\DB::commit();

				return [ 'enrollments' => $enrollments, 'fees' => $fees, 'payments' => $payments, 'movements' => $movements ];

		}

		public static function insert( $student, $reference, $amount )
		{
				if( !is_object( $student ) )
				{

						$student = Student::find( $student );

				}

				$lastStudentMovement = Movement::lastStudentMovement( $student )->first();

				if( $lastStudentMovement )
				{

						$lastStudentBalance = $lastStudentMovement->student_balance;

				}else{

						$lastStudentBalance = 0;

				}

				$lastMovement = Movement::lastMovement()->first();

				if( $lastMovement )
				{

						$lastTotalBalance = $lastMovement->total_balance;

				}else{

						$lastTotalBalance = 0;

				}

			  $movement = new Movement();

				$movement->student_id = $student->id;

				$movement->student_balance = $lastStudentBalance + $amount;

				$movement->total_balance = $lastTotalBalance + $amount;

				$movement->amount = $amount;

				if( $reference )
				{

						$reference->movements()->save( $movement );

				}

				$movement->created_by = auth()->user()->id;

				$movement->save();

				$student->balance = $movement->student_balance;

				$student->update();

				return $movement;

		}

		// public static function importFromGuarani()
		// {
		//
		// 		// dd( GuaraniMovement::where( 'movimiento', 'T' )->first() );
		//
		// 		$totalMovements[ 'movements' ] = 0;
		//
		// 		$totalMovements[ 'payments' ] = 0;
		//
		// 		$inscriptions = Inscription::all();
		//
		// 		$typeFee = MovementType::where( 'name', 'Cuota' )->first();
		//
		// 		$typeEnrollment = MovementType::where( 'name', 'Matrícula' )->first();
		//
		// 		$typePaymentFee = MovementType::where( 'name', 'Pago de Cuota' )->first();
		//
		// 		$typePaymentEnrollment = MovementType::where( 'name', 'Pago de Matrícula' )->first();
		//
		// 		foreach( $inscriptions as $inscription )
		// 		{
		//
		// 				$student = Student::find( $inscription->student_id );
		//
		// 				// $movementBalance = $student->balance;
		//
		// 				$enrollment_code = explode( '-', $inscription->enrollment_code );
		//
		// 				$guaraniMovements = AuxMovement::where( 'prefijo', $enrollment_code[ 0 ] )->where( 'legajo', $enrollment_code[ 1 ] )->orderBy( 'registro' )->get();
		//
		// 				foreach( $guaraniMovements as $guaraniMovement )
		// 				{
		//
		// 						if( $guaraniMovement->escobro == 0 && $guaraniMovement->importe > 0)
		// 						{
		//
		// 								$movement = Movement::where( 'guarani_id', $guaraniMovement->registro )->first();
		//
		// 								if( !$movement )
		// 								{
		//
		// 										switch( strtoupper( $guaraniMovement->movimiento ) )
		// 										{
		//
		// 												case 'M':
		//
		// 														$concept 	= 'Matricula (Sistema Guarani)';
		//
		// 														$movement = MovementController::insert( $student, $typeEnrollment, $guaraniMovement->importe, $concept, $inscription, $guaraniMovement->vencimiento, null, $guaraniMovement->fecha, $guaraniMovement->registro ); // Create Movement from Inscription (Polymorphic)
		//
		// 														$totalMovements[ 'movements' ]++;
		//
		// 												break;
		//
		// 												case 'C':
		//
		// 														$concept 	= 'Cuota N°' . $guaraniMovement->cuota . ' (Sistema Guarani)' ;
		//
		// 														$movement = MovementController::insert( $student, $typeFee, $guaraniMovement->importe, $concept, $inscription, $guaraniMovement->vencimiento, null, $guaraniMovement->fecha, $guaraniMovement->registro ); // Create Movement from fee (Polymorphic)
		//
		// 														$totalMovements[ 'movements' ]++;
		//
		// 												break;
		//
		// 										}
		//
		// 								}
		//
		// 						}
		//
		// 				}
		//
		// 				foreach( $guaraniMovements as $guaraniMovement )
		// 				{
		//
		// 						if( $guaraniMovement->escobro == 1 && $guaraniMovement->importe > 0 )
		// 						{
		//
		// 								$paymentConcept = 'Pago (Sistema Guarani)';
		//
		// 								if( $guaraniMovement->movimiento == 'C' )
		// 								{
		//
		// 										$paymentConcept = 'Pago de Cuota N°' . $guaraniMovement->cuota . ' (Sistema Guarani)';
		//
		// 										$type = $typePaymentFee;
		//
		// 								}elseif( $guaraniMovement->movimiento == 'M' ){
		//
		// 										$paymentConcept = 'Pago de Matrícula (Sistema Guarani)';
		//
		// 										$type = $typePaymentEnrollment;
		//
		// 								}
		//
		// 								$parent = null;
		//
		// 								foreach( $guaraniMovements as $guaraniParent )
		// 								{
		//
		// 										if( $guaraniMovement->comprobante == 3 && $guaraniParent->movimiento == $guaraniMovement->movimiento && $guaraniParent->registro == $guaraniMovement->talon )
		// 										{
		//
		// 												$parent = Movement::where( 'guarani_id', $guaraniParent->registro )->first();
		//
		// 										}
		//
		// 								}
		//
		// 								$payment 	= PaymentController::insert( $student, $guaraniMovement->importe, 1, $paymentConcept ); // Create Payment
		//
		// 								$movement = MovementController::insert( $student, $type, $guaraniMovement->importe, $paymentConcept, $payment, $guaraniMovement->vencimiento, $parent, $guaraniMovement->fecha, $guaraniMovement->registro ); // Create Movement from Payment (Polymorphic)
		//
		// 								$payment->movement_id = $movement->id;
		//
		// 								$payment->update();
		//
		// 								$totalMovements[ 'movements' ]++;
		//
		// 								$totalMovements[ 'payments' ]++;
		//
		// 						}
		//
		// 				}
		//
		// 				// dd( $totalMovements );
		//
		// 		}
		//
		// 		return $totalMovements;
		//
		// }

		// public static function insert( $student, $type, $amount, $concept, $reference = null, $due_date = null, $parent = null, $creation_date = null, $guarani_id = null )
		// {
		//
		// 	  $movement = new Movement();
		//
		// 		$movement->student_id = $student->id;
		//
		// 		if( !is_object( $type ) )
		// 		{
		//
		// 				$type = MovementType::find( $type );
		//
		// 		}
		//
		// 		$movement->type_id 		= $type->id;
		//
		// 		$movement->amount 		= $amount;
		//
		// 		$movement->concept 		= $concept;
		//
		// 		if( $type->type == 'C' )
		// 		{
		//
		// 				$movement->balance = $student->balance + $amount;
		//
		// 		}else{
		//
		// 				$movement->balance = $student->balance - $amount;
		//
		// 		}
		//
		// 		if( $due_date )
		// 		{
		//
		// 				$movement->due_date = $due_date;
		//
		// 		}
		//
		// 		if( $creation_date )
		// 		{
		//
		// 				$movement->creation_date = $creation_date;
		//
		// 		}else{
		//
		// 				$movement->creation_date = date( 'Y-m-d H:i:s' );
		//
		// 		}
		//
		// 		if( $parent )
		// 		{
		//
		// 				$movement->parent_id = $parent->id;
		//
		// 		}
		//
		// 		if( $guarani_id )
		// 		{
		//
		// 				$movement->guarani_id = $guarani_id;
		//
		// 		}
		//
		// 		if( $reference )
		// 		{
		//
		// 				// $movement->reference = $reference;
		//
		// 				$reference->movements()->save( $movement );
		//
		// 		}
		//
		// 		$movement->created_by = auth()->user()->id;
		//
		// 		$movement->save();
		//
		// 		$student->balance = $movement->balance;
		//
		// 		$student->update();
		//
		// 		return $movement;
		//
		// }

		public static function createOldMovementTable( $command )
		{

				// \DB::statement( "LOAD DATA INFILE 'public/u806f_cuota.txt' INTO TABLE posgrado_aux.guarani_movements FIELDS TERMINATED BY '|'");

				$command->info( 'Truncating posgrado_aux.guarani_movements.');

				AuxMovement::truncate();

				$file = 'public/u806f_cuota.txt';

				$handle = fopen( $file, 'r' );

				if( $handle )
				{

						while( ( $line = fgets( $handle ) ) !== false )
						{

								$data = explode( '|', $line );

								// if( $data[ 5 ] != 'T' )
								// {

										$command->line( 'Importing movement ' . $data[ 0 ] );

										if( strpos( $data[ 12 ], '/' ) )
										{

												$data[ 12 ] = implode( '-', array_reverse( explode( '/', $data[ 12 ] ) ) );

										}

										if( strpos( $data[ 13 ], '/' ) )
										{

												$data[ 13 ] = implode( '-', array_reverse( explode( '/', $data[ 13 ] ) ) );

										}

										$new = new AuxMovement();

										if( $data[ 0 ] )
										{

												$new->registro = $data[ 0 ];

										}

										if( $data[ 1 ] )
										{

												$new->unidad_academica = $data[ 1 ];

										}

										if( $data[ 2 ] )
										{

												$new->carrera = $data[ 2 ];

										}

										if( $data[ 3 ] )
										{

												$legajo = explode( '-', $data[ 3 ] );

												$new->legajo_completo = $data[ 3 ];

												$new->legajo = $legajo[ 1 ];

												$new->prefijo = $legajo[ 0 ];

										}

										if( $data[ 4 ] )
										{

												$new->talon = $data[ 4 ];

										}

										if( $data[ 5 ] )
										{

												$new->movimiento = $data[ 5 ];

										}

										if( $data[ 6 ] )
										{

												$new->cuota = $data[ 6 ];

										}

										if( $data[ 7 ] )
										{

												$new->estalon = $data[ 7 ];

										}


										if( $data[ 8 ] )
										{

												$new->escobro = $data[ 8 ];

										}

										if( $data[ 9 ] )
										{

												$new->cobro = $data[ 9 ];

										}

										if( $data[ 10 ] )
										{

												$new->comprobante = $data[ 10 ];

										}

										if( $data[ 11 ] )
										{

												$new->referencia = $data[ 11 ];

										}

										if( $data[ 12 ] )
										{

												$new->vencimiento = $data[ 12 ];

										}

										if( $data[ 13 ] )
										{

												$new->fecha = $data[ 13 ];

										}

										if( $data[ 14 ] )
										{

												$new->importe = $data[ 14 ];

										}

										if( $data[ 15 ] )
										{

												$new->signo = $data[ 15 ];

										}

										$new->save();

								// }

						}

						fclose( $handle );

				}else{

						echo 'File' . $file . ' cannot be loaded.';

				}

		}

}
