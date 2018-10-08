<?php

namespace App\Http\Controllers;

use Auth;

use Illuminate\Http\Request;

use App\Models\User;

use App\Models\Person;

use App\Models\Role;

use App\Models\File;

class UserController extends Controller
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

						$orderField = 'id';

				}

				if( $request->get( 'view_order_mode' ) )
				{

						$orderMode = $request->get( 'view_order_mode' );

				}else{

						$orderMode = 'asc';

				}

				$results = User::firstName( $request->get( 'first_name' ) )
													->lastName( $request->get( 'last_name' ) )
													->id( $request->get( 'user_id' ) )
													->user( $request->get( 'user' ) )
													->where( [ 'status' => 'A' ] )
													->orderBy( $orderField, $orderMode )
													->paginate( $PerPage );

				// $person = Person::where('nro_inscripcion','=','GR-0104530')->get();

				// dd( $person );

        return view( 'users.list', [ 'results' => $results ] );

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

				$images = self::getUserDefaultImages();

				return view( 'users.create', [ 'images' => $images ] );

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

						$user 						= new User();

						$user->user 			= $request->user;

						$user->password 	= bcrypt( $request->password );

						$user->email 			= $request->email;

						$user->last_name 	= $request->last_name;

						$user->first_name = $request->first_name;

						if( strpos( $request->newimage, '/') === false )
						{

								$image 				= File::find( $request->newimage );

						}else{

								$image 				= FileController::findOrCreate( $request->newimage );

						}

						$user->image_id = $image->id;

						$user->save();

						$roles 						= Role::whereIn( 'id', explode( ',', $request->roles ) )->get();

						foreach( $roles as $role )
						{

								$user->roles()->attach( $role );

						}

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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit( $id )
    {

				$user = User::find( $id );

				$images = self::getUserDefaultImages();

				return view( 'users.edit', [ 'user' => $user, 'images' => $images ] );

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

						$user = User::find( $id );

						if( $user )
						{

								$user->user 			= $request->user;

								if( $request->password )

										$user->password 	= bcrypt( $request->password );

								$user->email 			= $request->email;

								$user->last_name 	= $request->last_name;

								$user->first_name = $request->first_name;

								if( strpos( $request->newimage, '/') === false )
								{

										$image 				= File::find( $request->newimage );

								}else{

										$image 				= FileController::findOrCreate( $request->newimage );

								}

								$user->image_id = $image->id;

								$user->update();

								// $roles 						= Role::whereIn( 'id', explode( ',', $request->roles ) )->get();

								// foreach( $roles as $role )
								// {
								//
								// 		$user->roles()->attach( $role );
								//
								// }

								$user->roles()->sync( explode( ',', $request->roles ) );

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

	        	$user 						= User::find( $id );

						$user->status 		= 'I';

						$user->update();

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

	        	$user 						= User::find( $id );

						$user->status 		= 'A';

						$user->update();

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

		public function validateUser( Request $request )
		{

				if( $request->ajax() )
				{

						$user = request()->input( 'user' );

						$results = User::where( [ 'user' => $user ] );

						if( request()->input( 'actualvalue' ) )

								$results->where( 'user', '!=' , request()->input( 'actualvalue' ) );

						$results->get();

						$valid = true;

						if( $results->count() > 0 )
						{

								$valid = false;

						}

						return response()->json(
						[

								'valid' => $valid

						]);

				}

		}

		public function validateEmail( Request $request )
		{

			if( $request->ajax() )
			{

					$email = request()->input( 'email' );

					$results = User::where( [ 'email' => $email ] );

					if( request()->input( 'actualvalue' ) )

							$results->where( 'email', '!=' , request()->input( 'actualvalue' ) );

					$results->get();

					$valid = true;

					if( $results->count() > 0 )
					{

							$valid = false;

					}

					return response()->json(
					[

							'valid' => $valid

					] );

			}

		}



		public static function hasMenu( $menu )
		{

				if( $menu->route->permission == 'role' )
				{

						foreach( $menu->route->roles as $role )
						{

								foreach( $role->users as $user )
								{

										if( $role->status == 'A' && $user->id == Auth::user()->id )

												return true;

								}

						}

				}else{

						if( $menu->route->permission == 'private')
						{

								if(Auth::user())

										return true;

						}else{

								if( $menu->route->permission == 'public' )

										return true;

						}

				}

				return false;

		}

		public static function hasMenuChildren( $menu )
		{

				foreach( $menu->children as $child )
				{

						if( $child->route )
						{

								if( self::hasMenu( $child ) )

										return true;

						}else{

								if( self::hasMenuChildren( $child ) )

										return true;

						}

				}

				return false;

		}

		public static function getUserDefaultImages()
		{

				return array_diff( scandir( public_path() . '/views/users/images/default/' ), array( '.', '..' ) );

		}

}
