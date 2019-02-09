<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Enrollment;

class EnrollmentController extends Controller
{

		public static function importFromGuarani( $student, $inscription, $guaraniMovement, $guaraniMovements )
		{

				$lastStudentEnrollment = Enrollment::lastStudentEnrollment( $student )->first();

				if( $lastStudentEnrollment )
				{

						$lastStudentBalance = $lastStudentEnrollment->student_balance;

				}else{

						$lastStudentBalance = 0;

				}

				$lastEnrollment = Enrollment::lastEnrollment()->first();

				if( $lastEnrollment )
				{

						$lastTotalBalance = $lastEnrollment->total_balance;

				}else{

						$lastTotalBalance = 0;

				}

				$enrollment = new Enrollment();

				$enrollment->student_id = $student->id;

				$enrollment->inscription_id = $inscription->id;

				if( !$guaraniMovement->cuota )
				{

						$guaraniMovement->cuota = 1;

				}

				$enrollment->number = $guaraniMovement->cuota;

				$enrollment->amount = $guaraniMovement->importe;

				$enrollment->student_balance = $lastStudentBalance + $guaraniMovement->importe;

				$enrollment->total_balance = $lastTotalBalance + $guaraniMovement->importe;

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

				$enrollment->due_date = $guaraniMovement->vencimiento;

				$enrollment->creation_date = $guaraniMovement->fecha;

				$enrollment->guarani_id = $guaraniMovement->registro;

				$enrollment->created_by = auth()->user()->id;

				$enrollment->save();

				$guaraniMovement->importedMovement = $enrollment;

				return $enrollment;

		}

}
