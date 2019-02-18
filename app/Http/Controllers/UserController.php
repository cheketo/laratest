<?php

namespace App\Http\Controllers;

use Auth;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;

use App\Models\User;

use App\Models\Role;

use App\Models\File;

class UserController extends Controller
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

						$new 							= new User();

						$new->user 				= $request->user;

						$new->password 		= bcrypt( $request->password );

						$new->email 			= $request->email;

						$new->last_name 	= $request->last_name;

						$new->first_name 	= $request->first_name;

						if( strpos( $request->newimage, '/') === false )
						{

								$image 				= File::find( $request->newimage );

						}else{

								$image 				= FileController::findOrCreate( $request->newimage );

						}

						$new->image_id = $image->id;

						$new->save();

						$roles 						= Role::whereIn( 'id', explode( ',', $request->roles ) )->get();

						foreach( $roles as $role )
						{

								$new->roles()->attach( $role );

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
    public function show( $user )
    {

				$show = User::where( 'user', '=', $user )->first();

        return view( 'users.show', compact( 'show' ) );

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

								if( $request->user )
								{

										$user->user 			= $request->user;

								}

								if( $request->password )
								{

										$user->password 	= bcrypt( $request->password );

								}

								if( $request->email )
								{

										$user->email 			= $request->email;

								}

								if( $request->last_name )
								{

										$user->last_name 	= $request->last_name;

								}

								if( $request->first_name )
								{

										$user->first_name = $request->first_name;

								}

								if( $request->newimage )
								{

										if( strpos( $request->newimage, '/' ) === false )
										{

												$image 				= File::find( $request->newimage );

										}else{

												$image 				= FileController::findOrCreate( $request->newimage );

										}

										$user->image_id = $image->id;

								}

								$user->update();

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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function changePassword( Request $request )
    {

				if( $request->ajax() )
				{

						$user = auth()->user();

						if( Hash::check($request->password_old, auth()->user()->password) && $request->password == $request->password_confirm  )
						{

								$user->password 	= bcrypt( $request->password );

								$user->update();

								return response()->json(
								[

										'valid' => true

								]);

						}else{

								return response()->json(
								[

										'valid' => false,

								]);

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

		public function changeColor( Request $request, $skin )
		{

				if( $request->ajax() )
				{

						auth()->user()->skin = $skin;

						auth()->user()->save();

						return response()->json(
						[

								'valid' => true

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

		// public function hasRoute( $route )
		// {
		//
		// 		if( !is_object( $route ) )
		// 		{
		//
		// 				if( is_numeric( $route ) )
		// 				{
		//
		// 						$route = WebRoute::find( $route );
		//
		// 				}else{
		//
		// 						if( strpos( $route, '/' ) )
		// 						{
		//
		// 								$route = WebRoute::route( $route )->status( 'A' )->first();
		//
		// 						}else{
		//
		// 								$route = WebRoute::name( $route )->status( 'A' )->first();
		//
		// 						}
		//
		// 				}
		//
		// 		}
		//
		// 		if( is_object( $route ) )
		// 		{
		//
		// 				foreach( $this->roles as $role )
		// 				{
		//
		// 						return $route->hasRole( $role );
		//
		// 				}
		//
		// 		}else{
		//
		// 				return false;
		//
		// 		}
		//
		// }

		public static function getUserDefaultImages()
		{

				return array_diff( scandir( public_path() . '/views/users/images/default/' ), array( '.', '..' ) );

		}

}
