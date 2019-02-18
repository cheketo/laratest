<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use App\Models\Company;

class CompanyController extends Controller
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

            $orderField = 'id';

        }

        if( $request->get( 'view_order_mode' ) )
        {

            $orderMode = $request->get( 'view_order_mode' );

        }else{

            $orderMode = 'asc';

        }

        $results = Company::name( $request->get( 'name' ) )
                          ->id( $request->get( 'company_id' ) )
                          ->user( $request->get( 'user' ) )
                          ->where( [ 'status' => 'A' ] )
                          ->orderBy( $orderField, $orderMode )
                          ->paginate( $PerPage );

        // dd( $results );

        return view( 'companies.list', [ 'results' => $results ] );

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view( 'companies.create' );

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store( Request $request )
    {

        if( $request->ajax() )
        {



            return response()->json(
            [

                'valid' => true

            ]);

        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show( $id )
    {

        $show = Company::where( 'id', '=', $id )->first();

        return view( 'companies.show', compact( 'show' ) );

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit( $id )
    {

        $edit = Company::find( $id );

        // $images = self::getUserDefaultImages();

        return view( 'companies.edit', compact( 'edit' ) );

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update( Request $request, $id )
    {

        if( $request->ajax() )
        {

            $company = Company::find( $id );

            return response()->json(
            [

                'valid' => true

            ]);

        }else{

            return response()->json(
            [

                'valid' => false

            ], 404);

        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete( Request $request, $id )
    {

        if( $request->ajax() )
        {

            $company 						= Company::find( $id );

            $company->status 		= 'I';

            $company->update();

            return response()->json(
            [

                'valid' => true

            ]);

        }else{

            return response()->json(
            [

                'valid' => false

            ], 404);

        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function activate( Request $request, $id )
    {

        if( $request->ajax() )
        {

            $company 						= Company::find( $id );

            $company->status 		= 'A';

            $company->update();

            return response()->json(
            [

                'valid' => true

            ]);

        }else{

            return response()->json(
            [

                'valid' => false

            ], 404);

        }

    }

    public function validateName( Request $request )
    {

        if( $request->ajax() )
        {

            $name = request()->input( 'name' );

            $results = Company::name( $name );

            if( request()->input( 'actualvalue' ) )

                $results->where( 'name', '!=' , request()->input( 'actualvalue' ) );

            $results->get();

            return response()->json(
            [

                'valid' => !$results->count() > 0

            ]);

        }

    }

}
