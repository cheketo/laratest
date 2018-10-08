<?php

namespace App\Http\Controllers\Auth;

use Auth;
use App\Models\Informix;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    public function __construct()
    {

        $this->middleware( 'guest', [ 'only' => 'showLoginForm' ] );

    }


    // public function login()
    // {
		// 		$credentials = $this->validate(request(), [
    //       'login' => 'required|string',
    //       'password' => 'required|string'
    //     ]);
		//
		// 		$field = filter_var(request()->input('login'), FILTER_VALIDATE_EMAIL) ? 'email' : 'user';
		// 		request()->merge([$field => request()->input('login')]);
		//
    //     if (!Auth::attempt(request()->only($field, 'password'))) {
    //         return redirect()->route('dashboard');
    //     }
		//
    //     return back()->withErrors(['login'=>trans('auth.failed')])->withInput(request(['login']));
    // }

		public function login( Request $request )
		{

				if( $request->ajax() )
				{

						$redirect = false;

						// $credentials = $this->validate( request(),
						// [
						//
						// 		'login' => 'required|string',
						//
						// 		'password' => 'required|string'
						//
						// ]);

						$field = filter_var( request()->input( 'login' ), FILTER_VALIDATE_EMAIL ) ? 'email' : 'user';

						request()->merge( [ $field => request()->input( 'login' ) ] );

		        if ( Auth::attempt( request()->only( $field, 'password' ) ) )
						{

								 $redirect = route( 'dashboard' );

		        }

						return response()->json(
						[

								'redirect' => $redirect

						]);

				}


		    // $credentials = $request->only('email', 'password');
				//
		    // if (Auth::attempt($credentials, $request->has('remember'))) {
		    //     $auth = true; // Success
		    // }
				//
		    // if ($request->ajax()) {
		    //     return response()->json([
		    //         'auth' => $auth,
		    //         'intended' => URL::previous()
		    //     ]);
		    // } else {
		    //     return redirect()->intended(URL::route('dashboard'));
		    // }
		    // return redirect(URL::route('login_page'));
		}



    // public function username()
    // {
		// 		if(request() -> user)
		// 				return 'user';
		// 		else
		// 				return 'email';
    // }


    public function showLoginForm()
    {

				// $stored = Informix::call('b_alumnoactivo',["FFYL","GR-0104530"]);
				// dd($stored);
        return view( 'auth.login' );

    }

    public function logout()
    {
				if(Auth::user())

        		Auth::logout();

        return redirect( '/' );

    }

}
