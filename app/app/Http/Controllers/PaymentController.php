<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Payment;

class PaymentController extends Controller
{

		public static function importFromGuarani( $student, $guaraniMovement, $guaraniMovements )
		{

				$lastStudentPayment = Payment::lastStudentPayment( $student )->first();

				if( $lastStudentPayment )
				{

						$lastStudentBalance = $lastStudentPayment->student_balance;

				}else{

						$lastStudentBalance = 0;

				}

				$lastPayment = Payment::lastPayment()->first();

				if( $lastPayment )
				{

						$lastTotalBalance = $lastPayment->total_balance;

				}else{

						$lastTotalBalance = 0;

				}

				$payment = new Payment();

				$payment->student_id = $student->id;

				$payment->method_id = 1; // 1 stands for Guarani Importation

				$payment->amount = $guaraniMovement->importe;

				$payment->status = 'F'; // Since this payment comes from Guarani, is finished

				$payment->guarani_id = $guaraniMovement->registro;

				$payment->student_balance = $lastStudentBalance + $guaraniMovement->importe;

				$payment->total_balance = $lastTotalBalance + $guaraniMovement->importe;

				if( !$guaraniMovement->fecha )
				{

						if( $guaraniMovement->vencimiento )
						{

								$guaraniMovement->fecha = $guaraniMovement->vencimiento;

						}else{

								$guaraniMovement->vencimiento = date( 'Y-m-d' );

								$guaraniMovement->fecha = date( 'Y-m-d' );

						}

				}

				$payment->creation_date = $guaraniMovement->fecha;

				$payment->created_by = auth()->user()->id;

				$payment->save();

				$guaraniMovement->importedMovement = $payment;

				$reference = $guaraniMovement->referencia;

				foreach( $guaraniMovements as $guaraniMovement )
				{

						if( $guaraniMovement->movimiento != 'T' && $guaraniMovement->escobro = 1 && $guaraniMovement->referencia = $reference && $guaraniMovement->importedMovement )
						{

								MovementRelationController::insert( $payment, $guaraniMovement->importedMovement, $guaraniMovement->importe, $guaraniMovement->registro );

						}

				}

				return $payment;

		}

		public static function insert( $student, $amount, $method_id, $concept, $movement = null, $status = 'F' )
		{

				if( $amount > 0 )
				{

						$payment = new Payment();

						$payment->student_id 	= $student->id;

						$payment->amount 			= $amount;

						$payment->concept			= $concept;

						$payment->status			= $status;

						$payment->method_id 	= $method_id;

						if( $movement )
						{

								$payment->movements()->save( $movement );

						}

						$payment->save();

						return $payment;

				}

		}

}
