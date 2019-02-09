<?php

namespace App\Http\Controllers;

use Auth;

use DB;

use Illuminate\Http\Request;

use App\Models\Student;

use App\Models\StudentCategory;

use App\Models\Career;

use App\Models\Price;

use App\Models\Guarani\Career as GuaraniCareer;

use App\Models\Guarani\Student as GuaraniStudent;

use App\Models\Guarani\Person as GuaraniPerson;

use App\Models\Guarani\Movement as GuaraniMovement;

class StudentController extends Controller
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

						$perPage = $request->get( 'perpage' );

				}else{

						$perPage = 10;

				}

				if( $request->get( 'view_order_field' ) )
				{

						$orderField = $request->get( 'view_order_field' );

				}else{

						$orderField = 'sga_alumnos.nro_inscripcion';

				}

				if( $request->get( 'view_order_mode' ) )
				{

						$orderMode = $request->get( 'view_order_mode' );

				}else{

						$orderMode = 'asc';

				}

				$matchThese = array();

				if( $request->get( 'first_name' ) )
				{

						$matchThese[] = [ 'LOWER(sga_personas.nombres)', 'LIKE', '%' . strtolower( $request->get( 'first_name' ) ) . '%' ];

				}

				if( $request->get( 'last_name' ) )
				{

						$matchThese[] = [ 'LOWER(sga_personas.apellido)', 'LIKE', '%' . strtolower( $request->get( 'last_name' ) ) . '%' ];

				}

				if( $request->get( 'inscription_id' ) )
				{

						$matchThese[] = [ 'sga_personas.nro_inscripcion', 'LIKE', '%' . strtoupper( $request->get( 'inscription_id' ) ) . '%' ];

				}

				if( $request->get( 'document_id' ) )
				{

						$matchThese[] = [ 'sga_personas.nro_documento', '=', $request->get( 'document_id' ) ];

				}

				if( $request->get( 'inscription_date' ) )
				{

						$matchThese[] = [ 'sga_personas.fecha_inscripcion', '>=', implode( '-', array_reverse( explode( '/', $request->get( 'inscription_date' ) ) ) ) ];

				}

				if( $request->get( 'career' ) )
				{

						$matchThese[] = [ 'sga_alumnos.carrera', '=', $request->get( 'career' ) ];

				}

				$results = GuaraniPerson::select(
																		'sga_alumnos.nro_inscripcion',
																		'sga_personas.nombres',
																		'sga_personas.apellido',
																		'sga_personas.nro_documento',
																		'sga_personas.fecha_inscripcion',
																		'sga_personas.fecha_nacimiento',
																		'COUNT( sga_alumnos.carrera ) as total_carreras'
																	)
														->join( 'sga_alumnos', 'sga_personas.nro_inscripcion', '=', 'sga_alumnos.nro_inscripcion' )
														->where( $matchThese )
														->groupBy(
																		'sga_alumnos.nro_inscripcion',
																		'sga_personas.nombres',
																		'sga_personas.apellido',
																		'sga_personas.nro_documento',
																		'sga_personas.fecha_inscripcion',
																		'sga_personas.fecha_nacimiento'
																		)
														->orderBy( $orderField, $orderMode )
														->paginate( $perPage );
														// ->toSql();

				foreach( $results as $key => $result )
				{

						$results[ $key ]->student = Student::foreignId( $result->nro_inscripcion )->first();

				}

				// dd( $results );

        return view( 'students.list', compact( 'results' ) );

    }

		public function enrole( $id )
		{

				$student = Student::find( $id );

				if( $student->category_id )
				{

						$student->guarani = GuaraniPerson::nroInscripcion( $student->foreign_id )->first();

						$careers = Career::status( 'A' )->get();

						return view( 'students.enrole', compact( 'student', 'careers' ) );

				}else{

						return redirect()->route( 'student_category', [ 'id' => $id ] );

				}

		}

		public function category( $id )
		{

				$student = Student::find( $id );

				$student->guarani = GuaraniPerson::nroInscripcion( $student->foreign_id )->first();

				$categories = StudentCategory::where( 'status', 'A' )->get();

				return view( 'students.category', compact( 'student', 'categories' ) );

		}

		public function assignCateogry( Request $request, $id )
		{

				if( $request->ajax() )
				{

						$student = Student::find( $id );

						if( $student )
						{

								$student->category_id = $request->category;

								$student->update();

						}else{

								return response()->json(
								[

										'valid' => false

								], 404);

						}

				}

		}

		/**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function account( Request $request, $id ) // This will change when movements are adapted
    {

				$student = Student::find( $id );

				$student->guarani = GuaraniPerson::nroInscripcion( $student->foreign_id )->first();

				$inscriptions = $student->inscriptions;

				$x = 0;

				$totalBalance = 0;

				foreach( $inscriptions as $key => $inscription )
				{

						$balance = 0;

						// $inscription->showMovements = $inscription->movements->reverse();

						foreach( $inscription->showMovements as $movement )
						{

								$balance -= $movement->amount;

								$children = $movement->children;

								foreach( $children as  $child )
								{

										if( $child->type->type == 'C' )
										{

												$balance += $child->amount;

										}else{

												$balance -= $child->amount;

										}

								}

						}

						$inscription->balance = $balance;

						$totalBalance += $balance;

						$x ++;

				}

				// dd( $inscriptions );

				return view( 'students.account', compact( 'student', 'inscriptions', 'totalBalance', 'request' ) );

    }

		public function getPrices( Request $request )
		{

				if( $request->ajax() && $request->student && $request->career )
				{

						$student = Student::find( $request->student );

						$career = Career::find( $request->career );

						$price = Price::categoryId( $student->category_id )->groupId( $career->group_id )->first();

						$view = \View::make( 'students.components.prices', [ 'student' => $student, 'career' => $career, 'price' => $price ] );

						$content = $view->render();

						return response()->json(
						[

								'valid' => true,

								'content' => $content

						]);

				}


		}

		public static function importFromGuarani()
		{

				// dd( GuaraniMovement::where( 'registro', '21907' )->first() );

				$totalStudents = 0;

				\DB::beginTransaction();

				$students = GuaraniPerson::all();

				foreach( $students as $guaraniStudent )
				{

						$student = Student::foreignId( $guaraniStudent->nro_inscripcion )->first();

						if( !$student )
						{

								$student = new Student();

								$student->foreign_id = $guaraniStudent->nro_inscripcion;

								// $category_id  = DB::connection( 'informix' )->table( 'u806f_categoria' )->first();

								$category_id  = GuaraniStudent::select( 'sga_alumnos.nro_inscripcion', 'u806f_talonario.*' )
																		->join( 'u806f_talonario', 'u806f_talonario.legajo', '=', 'sga_alumnos.legajo' )
																		->where( 'sga_alumnos.nro_inscripcion', $student->foreign_id )
																		->first();

								if( $category_id )
								{


										switch( $category_id->categoria )
										{

											case 17:
											case 1:

													$student->category_id = 1;

											break;

											case 18:
											case 2:
											case 3:

													$student->category_id = 2;

											break;

											case 19:
											case 4:
											case 5:
											case 6:
											case 14:

													$student->category_id = 3;

											break;

											case 13:
											case 15:

													$student->category_id = 4;

											break;

											case 16:

													$student->category_id = 5;

											break;

										}

								}

								$student->save();

								$totalStudents++;

						}

				}

				\DB::commit();

				return $totalStudents;

		}

}
