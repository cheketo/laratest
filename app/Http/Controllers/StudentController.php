<?php

namespace App\Http\Controllers;

use Auth;

use Illuminate\Http\Request;

use App\Models\Student;

use App\Models\Person;

use App\Models\Movement;

class StudentController extends Controller
{

		public function __construct()
		{

				$this->middleware( 'auth' );

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

				$results = Person::select(
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
														->paginate( $PerPage );
														// ->toSql();




				// dd( $results );

        return view( 'students.list', compact( 'results' ) );

    }

		/**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function account( $inscription_id )
    {

				$student = Person::where( 'nro_inscripcion', $inscription_id )->first();

				$studentCareers = Student::select( 'sga_alumnos.*', 'sga_carreras.nombre', 'sga_carreras.nombre_reducido' )
																	->where( 'nro_inscripcion', $inscription_id )
																	->join( 'sga_carreras', 'sga_carreras.carrera', '=', 'sga_alumnos.carrera' )
																	->get();

				$careers = array();

				$x = 0;

				$totalBalance = 0;

				foreach( $studentCareers as $career )
				{

						$movements = Movement::where( 'legajo', $career->legajo )->orderBy( 'fecha, movimiento, cuota' )->get();

						$balance = 0;

						foreach( $movements as $movement )
						{

								if( $movement->escobro == 0 || $movement->movimiento == 'T' )
								{

										if( $movement->movimiento == 'T' )
										{

												$balance += $movement->importe;

										}else{

												$balance -= $movement->importe;

										}

										$movement->balance = $balance;

								}

						}

						$careers[ $x ][ 'career' ] = $career;

						$careers[ $x ][ 'movements' ] = $movements->reverse();

						$careers[ $x ][ 'balance' ] = $balance;

						$totalBalance += $balance;

						$x ++;

				}

				// dd( $careers );

				return view( 'students.account', compact( 'student', 'careers', 'totalBalance' ) );

    }

}
