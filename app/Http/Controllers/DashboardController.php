<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Career;

use App\Models\Guarani\Career as GuaraniCareer;

use App\Models\Role;

class DashboardController extends Controller
{

    public function __construct()
    {

      	// $this->middleware( 'auth' );

    }

    public function index()
    {

				// $stored = Informix::call( 'b_alumnoactivo', [ 'FFYL', 'GR-0104530' ] );
	      // return view( 'dashboard' )->with( 'stored', $stored );

				// dd( \App\Models\Guarani\Student::all() );

				// dd( \App\Http\Controllers\MovementController::importFromGuarani() );


				CareerController::insertNewCareers();

				return view( 'dashboard' );

    }

}
