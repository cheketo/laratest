<?php

namespace App\Http\Controllers;

use App\Models\Customer;

use App\Models\CompanyProfile;

use App\Models\CompanyType;

use App\Models\Company;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

class CustomerController extends Controller
{

    /**
     * Display a listing of the customers.
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
                          ->status( 'A' )
                          ->orderBy( $orderField, $orderMode )
                          ->paginate( $perPage );

        // dd( $results );

        $viewPath = 'customers';

        $formRoute = 'customer_list';

        return view( 'layouts.private.list', compact( 'results', 'viewPath', 'formRoute' ) );

    }

    /**
     * Show the form for creating a new customer.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

				// $images = self::getUserDefaultImages();
        //
				// return view( 'customers.create', [ 'images' => $images ] );

        $companyProfiles = CompanyProfile::status( 'A' )->get();

        $companyTypes = CompanyType::status( 'A' )->get();

        return view( 'customers.create', compact( 'companyProfiles', 'companyTypes' ) );

    }

}
