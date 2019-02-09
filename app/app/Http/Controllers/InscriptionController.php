<?php

namespace App\Http\Controllers;

use App\Http\Controllers\MovementController;

use Illuminate\Http\Request;

use App\Models\Student;

use App\Models\Career;

use App\Models\Inscription;

use App\Models\Price;

use App\Models\Guarani\Student as GuaraniStudent;

use App\Models\Guarani\Person as GuaraniPerson;

use App\Models\Guarani\Movement as GuaraniMovement;

class InscriptionController extends Controller
{

		public function create( Request $request, $id )
		{

				if( $request->ajax() && $id && $request->career )
				{

						$student = Student::find( $id );

						$career = Career::find( $request->career );

						$price = Price::categoryId( $student->category_id )->groupId( $career->group_id )->first();

						$inscription = new Inscription();

						$inscription->student_id = $student->id;

						$inscription->career_id = $career->id;

						$inscription->category_id = $student->category_id;

						$inscription->save();

						for( $x = 1; $x <= $price->enrollment_amount; $x++ )
						{

								MovementController::insert( $student, 4, $price->enrollment_price, 'Matrícula ' . $career->name, $inscription, date( 'Y-m-d', strtotime ( date( 'Y-m-d' ) . '+ 1 year' ) ) );

						}

						for( $x = 1; $x <= $price->fee_amount; $x++ )
						{

								MovementController::insert( $student, 3, $price->fee_price, 'Cuota N°' . $x, $inscription, date( 'Y-m-d', strtotime ( date( 'Y-m-d' ) . '+ ' . $x . ' month' ) ) );

						}

						return response()->json(
						[

								'valid' => true

						]);

				}

		}

		public static function importFromGuarani()
		{

				$totalInscriptions = 0;

				\DB::beginTransaction();

				$students = Student::all();

				foreach( $students as $student )
				{

						$inscriptions  = GuaraniStudent::select( 'sga_alumnos.nro_inscripcion', 'u806f_talonario.*' )
																->join( 'u806f_talonario', 'u806f_talonario.legajo', '=', 'sga_alumnos.legajo' )
																->where( 'sga_alumnos.nro_inscripcion', $student->foreign_id )
																->get();

						foreach( $inscriptions as $guaraniInscription )
						{

								$inscription = Inscription::studentId( $student->id )->enrollmentCode( $guaraniInscription->legajo )->first();

								if( !$inscription )
								{

										$inscription 							 		= new Inscription();

										$inscription->student_id 	 		= $student->id;

										if( $student->category_id )
										{

												$inscription->category_id = $student->category_id;

										}

										if( $guaraniInscription->carrera )
										{

												// $group		= CareerGroupController::getGroup( $guaraniInscription->carrera );

												$career		= CareerController::getCareer( $guaraniInscription->carrera );

												// $inscription->group_id = $group->id;

												$inscription->career_id = $career->id;

										}

										$inscription->enrollment_code	= $guaraniInscription->legajo;

										$inscription->save();

										$totalInscriptions++;

								}

						}

				}

				\DB::commit();

				return $totalInscriptions;

		}

}
