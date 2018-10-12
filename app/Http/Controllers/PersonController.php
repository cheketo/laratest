<?php

namespace App\Http\Controllers;

use Auth;

use Illuminate\Http\Request;

use App\Models\Person;

class PersonController extends Controller
{

		public function __construct()
		{

				// $this->middleware( 'auth' );

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

						$orderField = 'nro_inscripcion';

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

						$matchThese[] = [ 'nombres', 'LIKE', '%' . $request->get( 'first_name' ) . '%' ];

				}

				if( $request->get( 'last_name' ) )
				{

						$matchThese[] = [ 'apellido', 'LIKE', '%' . $request->get( 'last_name' ) . '%' ];

				}

				if( $request->get( 'inscription_id' ) )
				{

						$matchThese[] = [ 'nro_inscripcion', 'LIKE', '%' . $request->get( 'inscription_id' ) . '%' ];

				}

				if( $request->get( 'inscription_date' ) )
				{

						$matchThese[] = [ 'fecha_inscripcion', '>=', $request->get( 'inscription_date' ) ];

				}

				$results = Student::where( $matchThese )
														->orderBy( $orderField, $orderMode )
														->paginate( $PerPage );

				// dd( $results );

        return view( 'persons.list', compact( 'results' ) );

    }

    // /**
    //  * Show the form for creating a new resource.
    //  *
    //  * @return \Illuminate\Http\Response
    //  */
    // public function create()
    // {
		//
		// 		$images = self::getUserDefaultImages();
		//
		// 		return view( 'users.create', [ 'images' => $images ] );
		//
    // }
		//
		// /**
    //  * Store a newly created resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @return \Illuminate\Http\Response
    //  */
    // public function store( Request $request )
    // {
		//
		// 		if( $request->ajax() )
		// 		{
		//
		// 				$user 						= new User();
		//
		// 				$user->user 			= $request->user;
		//
		// 				$user->password 	= bcrypt( $request->password );
		//
		// 				$user->email 			= $request->email;
		//
		// 				$user->last_name 	= $request->last_name;
		//
		// 				$user->first_name = $request->first_name;
		//
		// 				if( strpos( $request->newimage, '/') === false )
		// 				{
		//
		// 						$image 				= File::find( $request->newimage );
		//
		// 				}else{
		//
		// 						$image 				= FileController::findOrCreate( $request->newimage );
		//
		// 				}
		//
		// 				$user->image_id = $image->id;
		//
		// 				$user->save();
		//
		// 				$roles 						= Role::whereIn( 'id', explode( ',', $request->roles ) )->get();
		//
		// 				foreach( $roles as $role )
		// 				{
		//
		// 						$user->roles()->attach( $role );
		//
		// 				}
		//
		// 				return response()->json(
		// 				[
		//
		// 						'valid' => true
		//
		// 				]);
		//
		// 		}
		//
    // }
		//
    // /**
    //  * Display the specified resource.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function show( $id )
    // {
    //     //
    // }
		//
    // /**
    //  * Show the form for editing the specified resource.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function edit( $id )
    // {
		//
		// 		$user = User::find( $id );
		//
		// 		$images = self::getUserDefaultImages();
		//
		// 		return view( 'users.edit', [ 'user' => $user, 'images' => $images ] );
		//
    // }
		//
    // /**
    //  * Update the specified resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function update( Request $request, $id )
    // {
		// 		if( $request->ajax() )
		// 		{
		//
		// 				$user 						= User::find( $id );
		//
		// 				if( $user )
		// 				{
		//
		// 						$user->user 			= $request->user;
		//
		// 						if( $request->password )
		//
		// 								$user->password 	= bcrypt( $request->password );
		//
		// 						$user->email 			= $request->email;
		//
		// 						$user->last_name 	= $request->last_name;
		//
		// 						$user->first_name = $request->first_name;
		//
		// 						if( strpos( $request->newimage, '/') === false )
		// 						{
		//
		// 								$image 				= File::find( $request->newimage );
		//
		// 						}else{
		//
		// 								$image 				= FileController::findOrCreate( $request->newimage );
		//
		// 						}
		//
		// 						$user->image_id = $image->id;
		//
		// 						$user->update();
		//
		// 						// $roles 						= Role::whereIn( 'id', explode( ',', $request->roles ) )->get();
		//
		// 						// foreach( $roles as $role )
		// 						// {
		// 						//
		// 						// 		$user->roles()->attach( $role );
		// 						//
		// 						// }
		//
		// 						$user->roles()->sync( explode( ',', $request->roles ) );
		//
		// 						return response()->json(
		// 						[
		//
		// 								'valid' => true
		//
		// 						]);
		//
		// 				}else{
		//
		// 						return response()->json(
		// 						[
		//
		// 								'valid' => false
		//
		// 						], 404);
		//
		// 				}
		//
		// 		}
    // }
		//
    // /**
    //  * Remove the specified resource from storage.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function delete( Request $request, $id )
    // {
		//
		// 		if( $request->ajax() )
		// 		{
		//
	  //       	$user 						= User::find( $id );
		//
		// 				$user->status 		= 'I';
		//
		// 				$user->update();
		//
		// 				return response()->json(
		// 				[
		//
		// 						'valid' => true
		//
		// 				]);
		//
		// 		}else{
		//
		// 				return response()->json(
		// 				[
		//
		// 						'valid' => false
		//
		// 				], 404);
		//
		// 		}
		//
    // }
		//
		// public function validateUser( Request $request )
		// {
		//
		// 		if( $request->ajax() )
		// 		{
		//
		// 				$user = request()->input( 'user' );
		//
		// 				$results = User::where( [ 'user' => $user ] );
		//
		// 				if( request()->input( 'actualvalue' ) )
		//
		// 						$results->where( 'user', '!=' , request()->input( 'actualvalue' ) );
		//
		// 				$results->get();
		//
		// 				$valid = true;
		//
		// 				if( $results->count() > 0 )
		// 				{
		//
		// 						$valid = false;
		//
		// 				}
		//
		// 				return response()->json(
		// 				[
		//
		// 						'valid' => $valid
		//
		// 				]);
		//
		// 		}
		//
		// }
		//
		// public function validateEmail( Request $request )
		// {
		//
		// 	if( $request->ajax() )
		// 	{
		//
		// 			$email = request()->input( 'email' );
		//
		// 			$results = User::where( [ 'email' => $email ] );
		//
		// 			if( request()->input( 'actualvalue' ) )
		//
		// 					$results->where( 'email', '!=' , request()->input( 'actualvalue' ) );
		//
		// 			$results->get();
		//
		// 			$valid = true;
		//
		// 			if( $results->count() > 0 )
		// 			{
		//
		// 					$valid = false;
		//
		// 			}
		//
		// 			return response()->json(
		// 			[
		//
		// 					'valid' => $valid
		//
		// 			] );
		//
		// 	}
		//
		// }
		//
		//
		// // public function insertForeign(object $foreign)
    // // {
		// // 		if ($foreign instanceof Student) {
		// // 				$this->insertStudent($foreign);
		// // 		}elseif($foreign instanceof Administrator){
		// // 				$this->insertAdministrator($foreign);
		// // 		}
		// // }
		// //
		// // public function updateForeign(object $foreign, User $user)
    // // {
		// // 		if ($foreign instanceof Student) {
		// // 				$this->updateStudent($foreign, $user);
		// // 		}elseif($foreign instanceof Administrator){
		// // 				$this->updateAdministrator($foreign, $user);
		// // 		}
		// // }
		// //
		// //
    // // public function insertStudent(Student $student)
    // // {
    // //     $user = new User;
    // //     $user -> name = $student -> Apenom;
    // //     $user -> password = $student -> Pass;
    // //     $user -> status = $student -> Estado;
    // //     $user -> email = $student -> Mail;
		// // 		$user -> user = $student -> Mail;
    // //     $user -> student_id = $student -> Legajo;
    // //     $user -> save();
		// // 		$user -> roles() -> attach([3]);
    // // }
		// //
    // // public function updateStudent(Student $student, User $user)
    // // {
    // //     $user -> name = $student -> Apenom;
    // //     $user -> email = $student -> Mail;
		// // 		$user -> user = $student -> Mail;
    // //     $user -> password = $student -> Pass;
    // //     $user -> status = $student -> Estado;
    // //     $user -> save();
    // // }
		// //
		// // public function insertAdministrator(Administrator $admin)
    // // {
		// // 		$user = new User;
		// // 		if($admin -> nombrecompleto)
    // //     		$user -> name = $admin -> nombrecompleto;
    // //     $user -> password = md5($admin -> pass);
		// // 		$user -> user = $admin -> usuario;
		// // 		$user -> email = $admin -> usuario . "@nomail";
		// // 		$user -> administrator_id = $admin -> idusuario;
		// // 		$user -> save();
		// // 		$user -> roles() -> attach([1]);
    // // }
		// //
    // // public function updateAdministrator(Administrator $admin, User $user)
    // // {
		// // 		if($admin -> nombrecompleto)
    // //     		$user -> name = $admin -> nombrecompleto;
		// // 		$user -> user = $admin -> usuario;
    // //     $user -> password = md5($admin -> pass);
		// // 		$user -> email = $admin -> email . "@nomail";
		// // 		$user -> administrator_id = $admin -> idusuario;
    // //     $user -> save();
    // // }
		// public static function hasMenu( $menu )
		// {
		//
		// 		if( $menu->route->permission == 'role' )
		// 		{
		//
		// 				foreach( $menu->route->roles as $role )
		// 				{
		//
		// 						foreach( $role->users as $user )
		// 						{
		//
		// 								if( $user->id == Auth::user()->id )
		//
		// 										return true;
		//
		// 						}
		//
		// 				}
		//
		// 		}else{
		//
		// 				if( $menu->route->permission == 'private')
		// 				{
		//
		// 						if(Auth::user())
		//
		// 								return true;
		//
		// 				}else{
		//
		// 						if( $menu->route->permission == 'public' )
		//
		// 								return true;
		//
		// 				}
		//
		// 		}
		//
		// 		return false;
		//
		// }
		//
		// public static function hasMenuChildren( $menu )
		// {
		//
		// 		foreach( $menu->children as $child )
		// 		{
		//
		// 				if( $child->route )
		// 				{
		//
		// 						if( self::hasMenu( $child ) )
		//
		// 								return true;
		//
		// 				}else{
		//
		// 						if( self::hasMenuChildren( $child ) )
		//
		// 								return true;
		//
		// 				}
		//
		// 		}
		//
		// 		return false;
		//
		// }
		//
		// public static function getUserDefaultImages()
		// {
		//
		// 		return array_diff( scandir( public_path() . '/views/users/images/default/' ), array( '.', '..' ) );
		//
		// }

}
