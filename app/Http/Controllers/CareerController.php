<?php

namespace App\Http\Controllers;

use Auth;

use Illuminate\Http\Request;

use App\Models\Career;

class CareerController extends Controller
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

 				$results = Person::select(
 																		'sga_alumnos.nro_inscripcion',
 																		'sga_alumnos.plan',
 																		'sga_alumnos.fin_vigencia_plan',
 																		'sga_alumnos.calidad',
 																		'sga_alumnos.cnt_readmisiones',
 																		'sga_alumnos.regular',
 																		'sga_alumnos.fecha_ingreso',
 																		'sga_alumnos.sede',
 																		'sga_alumnos.legajo',
 																		'sga_alumnos.unidad_academica',
 																		'sga_alumnos.carrera',
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
 																		'sga_alumnos.nro_inscripcion','sga_alumnos.plan',
 																		'sga_alumnos.fin_vigencia_plan',
 																		'sga_alumnos.calidad',
 																		'sga_alumnos.cnt_readmisiones',
 																		'sga_alumnos.regular',
 																		'sga_alumnos.fecha_ingreso',
 																		'sga_alumnos.sede',
 																		'sga_alumnos.legajo',
 																		'sga_alumnos.unidad_academica',
 																		'sga_alumnos.carrera',
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

		public static function getSelectValues()
		{
				$careers = array();

				foreach( Career::all() as $career)
				{

						$careers[ $career->carrera ] = $career->nombre_reducido;

				}

				return $careers;

		}



}
