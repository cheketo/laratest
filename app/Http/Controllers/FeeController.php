<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Fee;

class FeeController extends Controller
{

		public static function importFromGuarani( $student, $inscription, $guaraniMovement, $guaraniMovements )
		{

				$lastStudentFee = Fee::lastStudentFee( $student )->first();

				if( $lastStudentFee )
				{

						if( $lastStudentFee->student_balance )
						{

								$lastStudentBalance = $lastStudentFee->student_balance;

						}else{

								$lastStudentBalance = 0;

						}

				}else{

						$lastStudentBalance = 0;

				}

				$lastFee = Fee::lastFee()->first();

				if( $lastFee )
				{

						$lastTotalBalance = $lastFee->total_balance;

				}else{

						$lastTotalBalance = 0;

				}

				$fee = new Fee();

				$fee->student_id = $student->id;

				$fee->inscription_id = $inscription->id;

				$fee->number = $guaraniMovement->cuota;

				$fee->amount = $guaraniMovement->importe;

				$fee->student_balance = $lastStudentBalance + $guaraniMovement->importe;

				$fee->total_balance = $lastTotalBalance + $guaraniMovement->importe;

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

				$fee->due_date = $guaraniMovement->vencimiento;

				$fee->creation_date = $guaraniMovement->fecha;

				$fee->guarani_id = $guaraniMovement->registro;

				$fee->created_by = auth()->user()->id;

				$fee->save();

				foreach(  )

				$guaraniMovement->importedMovement = $fee;

				return $fee;

		}

}
