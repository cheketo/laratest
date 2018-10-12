<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Informix;

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

				return view( 'dashboard' );

    }

}
