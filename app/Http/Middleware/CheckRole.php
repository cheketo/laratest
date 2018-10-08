<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Role;
use App\Http\Controllers\RoleController;
use Illuminate\Support\Facades\URL;

class CheckRole
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
				// if($request->user() === null) {
				// 		return response("No tenes permiso.",401);
				// }
				// $actions = $request->route()->getAction();
				// $roles = isset($actions['roles']);

        // if (auth()->user()->name) {
        //   dd(auth()->user()->email);
        // }

        // $email = $request -> email;
        // $password = md5($request -> password);
        // // $request->merge(array( 'password' => $password ));
        // $student = Student::where('Mail', $email)->where('Pass', $password)->first();
        //
        // $user = User::where('email', $email)->first();
        // if ($student) {
        //     if ($student && $user) {
        //         UserController::updateStudent($student, $user);
        //     } else {
        //         UserController::insertStudent($student);
        //     }
        // } else {
            // $current = URL::full();
            // dd($request->session());
            // return back()->withErrors(['email' => $current])->withInput();
        // }
        // return $next($request);
    }
}
