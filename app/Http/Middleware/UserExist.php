<?php

namespace App\Http\Middleware;

use Closure;

use App\Models\User;

use App\Http\Controllers\UserController;

use Illuminate\Support\Facades\Validator;

class UserExist
{

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle( $request, Closure $next )
    {

				$validator = Validator::make( request()->all(), [

						'login' => 'required|string',

						'password' => 'required|string'

				]);

				if( $validator->fails() )
				{

						return back()->withErrors( [ 'login' => 'Ingrese todos los datos' ] )->withInput();
						// if($this->isEmail(array('email' => $request -> login)))
						// {
						// 		$request -> password = md5($request -> password);
						// 		$request -> email = $request -> login;
						// 		$userField = 'email';
						// }elseif($request -> login){
						// 		$request -> user = $request -> login;
						// 		$userField = 'user';
						// }
						// $userValue = $request -> login;
						// $user = User::where($userField, $userValue)->first();

						// switch ($userField) {
						// 	case 'email':
						// 			if($user)
						// 			{
						// 					$foreign = Student::where('Legajo', $user -> student_id)->first();
						// 			}else{
						// 					$foreign = Student::where('Mail', $userValue)->where('Pass', $request -> password)->first();
						// 			}
						// 	break;
						//
						// 	case 'user':
						// 			if($user)
						// 			{
						// 					$foreign = Administrator::where('idusuario', $user -> administrator_id)->first();
						// 			}else{
						// 					$foreign = Administrator::where('usuario', $userValue)->where('pass', $request -> password)->first();
						// 			}
						// 	break;
						// }
		        // if ($foreign) {
		        //     if ($foreign && $user)
						// 		{
						// 				$user->updateForeign($foreign, $user);
		        //     } else {
						// 				$user = new User();
		        //         $user->insertForeign($foreign);
		        //     }
		        // } else {
		        //     return back()->withErrors(['login' => 'Los datos ingresados no son válidos'])->withInput();
		        // }
				}

        return $next($request);

		}

		// public function isEmail(array $data)
		// {
		// 		$validator = Validator::make($data, [
    //     	'email' => 'email'
    //     ]);
		// 		return !$validator->fails();
    // }
}


// NO BORRAR, COMPARAR SI ES EL MISMO USUARIO QUE EL DE SESSION. UTIL PARA DELETE

// if( intVal( $request->route( 'id' ) ) === intVal( Auth::user()->id ) )
// {
//
// 		return redirect()->back();
//
// }

// $user = User::find( $request->route( 'id' ) );
//
// if( !$user )
// {
//
// 		return redirect()->back()->with( 'error', 'value' )->withInput();
//
//
// }
//
//
// return $next($request);
