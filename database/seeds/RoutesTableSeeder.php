<?php

use Illuminate\Database\Seeder;

use App\Models\WebRoute;

use App\Models\Middleware;

class RoutesTableSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

				/*
				 *  Login Routes
				 */

				$route 							= new WebRoute();
 				$route->route 			= '/';
 				$route->name 				= 'index';
 				$route->verb 				= 'get';
 				$route->controller 	= 'Auth\LoginController';
 				$route->method 			= 'showLoginForm';
 				$route->permission 	= 'public';
 				$route->save();

				$route 							= new WebRoute();
 				$route->route 			= '/login';
 				$route->name 				= 'login_form';
 				$route->verb 				= 'get';
 				$route->controller 	= 'Auth\LoginController';
 				$route->method 			= 'showLoginForm';
 				$route->permission 	= 'public';
 				$route->save();

				$middleware 				= Middleware::where( 'name', 'userexist' )->first();

				$route 							= new WebRoute();
 				$route->route 			= '/login';
 				$route->name 				= 'login';
 				$route->verb 				= 'post';
 				$route->controller 	= 'Auth\LoginController';
 				$route->method 			= 'login';
 				$route->permission 	= 'public';
 				$route->save();
				$route->middlewares()->attach( $middleware );

				$route 							= new WebRoute();
 				$route->route 			= '/logout';
 				$route->name 				= 'logout';
 				$route->verb 				= 'post';
 				$route->controller 	= 'Auth\LoginController';
 				$route->method 			= 'logout';
 				$route->permission 	= 'public';
 				$route->save();


				/*
				 *  Dashboard Route
				 */

				$route 							= new WebRoute();
				$route->route 			= '/dashboard';
				$route->name 				= 'dashboard';
				$route->verb 				= 'get';
				$route->controller 	= 'DashboardController';
				$route->method 			= 'index';
				$route->permission 	= 'private';
				$route->save();


				/*
				 *  Student Routes
				 */

				$route 							= new WebRoute();
				$route->route 			= '/alumnos';
				$route->name 				= 'student_list';
				$route->verb 				= 'get';
				$route->controller 	= 'StudentController';
				$route->method 			= 'index';
				$route->permission 	= 'role';
				$route->save();

				$route 							= new WebRoute();
				$route->route 			= '/alumnos/cuentacorriente/{id}';
				$route->name 				= 'student_account';
				$route->verb 				= 'get';
				$route->controller 	= 'StudentController';
				$route->method 			= 'account';
				$route->permission 	= 'role';
				$route->save();

				/*
				 *  Person Routes
				 */

				$route 							= new WebRoute();
				$route->route 			= '/personas';
				$route->name 				= 'person_list';
				$route->verb 				= 'get';
				$route->controller 	= 'PersonController';
				$route->method 			= 'index';
				$route->permission 	= 'role';
				$route->save();

				/*
				 *  Career Routes
				 */

				$route 							= new WebRoute();
				$route->route 			= '/carreras';
				$route->name 				= 'career_list';
				$route->verb 				= 'get';
				$route->controller 	= 'CareerController';
				$route->method 			= 'index';
				$route->permission 	= 'role';
				$route->save();

				/*
				 *  User Routes
				 */

				$route 							= new WebRoute();
				$route->route 			= '/usuarios';
				$route->name 				= 'user_list';
				$route->verb 				= 'get';
				$route->controller 	= 'UserController';
				$route->method 			= 'index';
				$route->permission 	= 'role';
				$route->save();

				$route 							= new WebRoute();
				$route->route 			= '/usuarios/crear';
				$route->name 				= 'user_create';
				$route->verb 				= 'get';
				$route->controller 	= 'UserController';
				$route->method 			= 'create';
				$route->permission 	= 'role';
				$route->save();

				$route 							= new WebRoute();
 				$route->route 			= '/usuarios/crear';
 				$route->name 				= 'user_store';
 				$route->verb 				= 'post';
 				$route->controller 	= 'UserController';
 				$route->method 			= 'store';
 				$route->permission 	= 'role';
 				$route->save();

				$route 							= new WebRoute();
				$route->route 			= '/usuarios/{id}';
				$route->name 				= 'user_show';
				$route->verb 				= 'get';
				$route->controller 	= 'UserController';
				$route->method 			= 'show';
				$route->permission 	= 'role';
				$route->save();

				$middleware 				= Middleware::where('name','usercanbeedited')->first();

				$route 							= new WebRoute();
				$route->route 			= '/usuarios/editar/{id}';
				$route->name 				= 'user_edit';
				$route->verb 				= 'get';
				$route->controller 	= 'UserController';
				$route->method 			= 'edit';
				$route->permission 	= 'role';
				$route->save();
				$route->middlewares()->attach( $middleware );

				$route 							= new WebRoute();
 				$route->route 			= '/usuarios/editar/{id}';
 				$route->name 				= 'user_upadte';
 				$route->verb 				= 'post';
 				$route->controller 	= 'UserController';
 				$route->method 			= 'update';
 				$route->permission 	= 'role';
 				$route->save();

				$route 							= new WebRoute();
 				$route->route 			= '/usuarios/eliminar/{id}';
 				$route->name 				= 'user_delete';
 				$route->verb 				= 'post';
 				$route->controller 	= 'UserController';
 				$route->method 			= 'delete';
 				$route->permission 	= 'role';
 				$route->save();

				$route 							= new WebRoute();
 				$route->route 			= '/usuarios/activar/{id}';
 				$route->name 				= 'user_activate';
 				$route->verb 				= 'post';
 				$route->controller 	= 'UserController';
 				$route->method 			= 'activate';
 				$route->permission 	= 'role';
 				$route->save();

				$route 							= new WebRoute();
 				$route->route 			= '/user/upload/image';
 				$route->name 				= 'user_upload_image';
 				$route->verb 				= 'post';
 				$route->controller 	= 'FileController';
 				$route->method 			= 'upoadImage';
 				$route->permission 	= 'role';
 				$route->save();

				$route 							= new WebRoute();
 				$route->route 			= '/user/validate/user';
 				$route->name 				= 'user_validate_user';
 				$route->verb 				= 'post';
 				$route->controller 	= 'UserController';
 				$route->method 			= 'validateUser';
 				$route->permission 	= 'role';
 				$route->save();

				$route 							= new WebRoute();
 				$route->route 			= '/user/validate/email';
 				$route->name 				= 'user_validate_email';
 				$route->verb 				= 'post';
 				$route->controller 	= 'UserController';
 				$route->method 			= 'validateEmail';
 				$route->permission 	= 'role';
 				$route->save();


				/*
				 *  Role Routes
				 */

				$route 							= new WebRoute();
				$route->route 			= '/perfiles';
				$route->name 				= 'role_list';
				$route->verb 				= 'get';
				$route->controller 	= 'RoleController';
				$route->method 			= 'index';
				$route->permission 	= 'role';
				$route->save();

				$route 							= new WebRoute();
				$route->route 			= '/perfiles/crear';
				$route->name 				= 'role_create';
				$route->verb 				= 'get';
				$route->controller 	= 'RoleController';
				$route->method 			= 'create';
				$route->permission 	= 'role';
				$route->save();

				$route 							= new WebRoute();
				$route->route 			= '/perfiles/crear';
				$route->name 				= 'role_store';
				$route->verb 				= 'post';
				$route->controller 	= 'RoleController';
				$route->method 			= 'store';
				$route->permission 	= 'role';
				$route->save();

				$route 							= new WebRoute();
				$route->route 			= '/perfiles/{id}';
				$route->name 				= 'role_show';
				$route->verb 				= 'get';
				$route->controller 	= 'RoleController';
				$route->method 			= 'show';
				$route->permission 	= 'role';
				$route->save();

				$route 							= new WebRoute();
				$route->route 			= '/perfiles/editar/{id}';
				$route->name 				= 'role_edit';
				$route->verb 				= 'get';
				$route->controller 	= 'RoleController';
				$route->method 			= 'edit';
				$route->permission 	= 'role';
				$route->save();

				$route 							= new WebRoute();
				$route->route 			= '/perfiles/editar/{id}';
				$route->name 				= 'role_update';
				$route->verb 				= 'post';
				$route->controller 	= 'RoleController';
				$route->method 			= 'update';
				$route->permission 	= 'role';
				$route->save();

				$route 							= new WebRoute();
 				$route->route 			= '/perfiles/eliminar/{id}';
 				$route->name 				= 'role_delete';
 				$route->verb 				= 'post';
 				$route->controller 	= 'RoleController';
 				$route->method 			= 'delete';
 				$route->permission 	= 'role';
 				$route->save();

				$route 							= new WebRoute();
 				$route->route 			= '/perfiles/activar/{id}';
 				$route->name 				= 'role_activate';
 				$route->verb 				= 'post';
 				$route->controller 	= 'RoleController';
 				$route->method 			= 'activate';
 				$route->permission 	= 'role';
 				$route->save();


				/*
				 *  WebRoute Routes
				 */

				$route 							= new WebRoute();
 				$route->route 			= '/rutas';
 				$route->name 				= 'route_list';
 				$route->verb 				= 'get';
 				$route->controller 	= 'WebRouteController';
 				$route->method 			= 'index';
 				$route->permission 	= 'role';
 				$route->save();

				$route 							= new WebRoute();
 				$route->route 			= '/rutas/crear';
 				$route->name 				= 'route_create';
 				$route->verb 				= 'get';
 				$route->controller 	= 'WebRouteController';
 				$route->method 			= 'create';
 				$route->permission 	= 'role';
 				$route->save();

				$route 							= new WebRoute();
 				$route->route 			= '/rutas/crear';
 				$route->name 				= 'route_store';
 				$route->verb 				= 'post';
 				$route->controller 	= 'WebRouteController';
 				$route->method 			= 'store';
 				$route->permission 	= 'role';
 				$route->save();

				$route 							= new WebRoute();
 				$route->route 			= '/rutas/{name}';
 				$route->name 				= 'route_show';
 				$route->verb 				= 'get';
 				$route->controller 	= 'WebRouteController';
 				$route->method 			= 'show';
 				$route->permission 	= 'role';
 				$route->save();

				$route 							= new WebRoute();
 				$route->route 			= '/rutas/editar/{id}';
 				$route->name 				= 'route_edit';
 				$route->verb 				= 'get';
 				$route->controller 	= 'WebRouteController';
 				$route->method 			= 'edit';
 				$route->permission 	= 'role';
 				$route->save();

				$route 							= new WebRoute();
 				$route->route 			= '/rutas/editar/{id}';
 				$route->name 				= 'route_update';
 				$route->verb 				= 'post';
 				$route->controller 	= 'WebRouteController';
 				$route->method 			= 'update';
 				$route->permission 	= 'role';
 				$route->save();

				$route 							= new WebRoute();
 				$route->route 			= '/rutas/eliminar/{id}';
 				$route->name 				= 'route_delete';
 				$route->verb 				= 'post';
 				$route->controller 	= 'WebRouteController';
 				$route->method 			= 'delete';
 				$route->permission 	= 'role';
 				$route->save();

				$route 							= new WebRoute();
 				$route->route 			= '/rutas/activar/{id}';
 				$route->name 				= 'route_activate';
 				$route->verb 				= 'post';
 				$route->controller 	= 'WebRouteController';
 				$route->method 			= 'activate';
 				$route->permission 	= 'role';
 				$route->save();


				/*
				 *  Menu Routes
				 */

				$route 							= new WebRoute();
				$route->route 			= '/menues';
				$route->name 				= 'menu_list';
				$route->verb 				= 'get';
				$route->controller 	= 'MenuController';
				$route->method 			= 'index';
				$route->permission 	= 'role';
				$route->save();

				$route 							= new WebRoute();
				$route->route 			= '/menues/crear';
				$route->name 				= 'menu_create';
				$route->verb 				= 'get';
				$route->controller 	= 'MenuController';
				$route->method 			= 'create';
				$route->permission 	= 'role';
				$route->save();

				$route 							= new WebRoute();
				$route->route 			= '/menues/crear';
				$route->name 				= 'menu_store';
				$route->verb 				= 'post';
				$route->controller 	= 'MenuController';
				$route->method 			= 'store';
				$route->permission 	= 'role';
				$route->save();

				$route 							= new WebRoute();
				$route->route 			= '/menues/{id}';
				$route->name 				= 'menu_show';
				$route->verb 				= 'get';
				$route->controller 	= 'MenuController';
				$route->method 			= 'show';
				$route->permission 	= 'role';
				$route->save();

				$route 							= new WebRoute();
				$route->route 			= '/menues/editar/{id}';
				$route->name 				= 'menu_edit';
				$route->verb 				= 'get';
				$route->controller 	= 'MenuController';
				$route->method 			= 'edit';
				$route->permission 	= 'role';
				$route->save();

				$route 							= new WebRoute();
				$route->route 			= '/menues/editar/{id}';
				$route->name 				= 'menu_update';
				$route->verb 				= 'post';
				$route->controller 	= 'MenuController';
				$route->method 			= 'update';
				$route->permission 	= 'role';
				$route->save();

				$route 							= new WebRoute();
 				$route->route 			= '/menues/eliminar/{id}';
 				$route->name 				= 'menu_delete';
 				$route->verb 				= 'post';
 				$route->controller 	= 'MenuController';
 				$route->method 			= 'delete';
 				$route->permission 	= 'role';
 				$route->save();

				$route 							= new WebRoute();
 				$route->route 			= '/menues/activar/{id}';
 				$route->name 				= 'menu_activate';
 				$route->verb 				= 'post';
 				$route->controller 	= 'MenuController';
 				$route->method 			= 'activate';
 				$route->permission 	= 'role';
 				$route->save();

				/*
				 *  Middleware Routes
				 */

				$route 							= new WebRoute();
				$route->route 			= '/middlewares';
				$route->name 				= 'middleware_list';
				$route->verb 				= 'get';
				$route->controller 	= 'MiddlewareController';
				$route->method 			= 'index';
				$route->permission 	= 'role';
				$route->save();

				$route 							= new WebRoute();
				$route->route 			= '/middlewares/crear';
				$route->name 				= 'middleware_create';
				$route->verb 				= 'get';
				$route->controller 	= 'MiddlewareController';
				$route->method 			= 'create';
				$route->permission 	= 'role';
				$route->save();

				$route 							= new WebRoute();
				$route->route 			= '/middlewares/crear';
				$route->name 				= 'middleware_store';
				$route->verb 				= 'post';
				$route->controller 	= 'MiddlewaresController';
				$route->method 			= 'store';
				$route->permission 	= 'role';
				$route->save();

				$route 							= new WebRoute();
				$route->route 			= '/middlewares/{id}';
				$route->name 				= 'middleware_show';
				$route->verb 				= 'get';
				$route->controller 	= 'MiddlewareController';
				$route->method 			= 'show';
				$route->permission 	= 'role';
				$route->save();

				$route 							= new WebRoute();
				$route->route 			= '/middlewares/editar/{id}';
				$route->name 				= 'middleware_edit';
				$route->verb 				= 'get';
				$route->controller 	= 'MiddlewareController';
				$route->method 			= 'edit';
				$route->permission 	= 'role';
				$route->save();

				$route 							= new WebRoute();
				$route->route 			= '/middlewares/editar/{id}';
				$route->name 				= 'middleware_update';
				$route->verb 				= 'post';
				$route->controller 	= 'MiddlewareController';
				$route->method 			= 'update';
				$route->permission 	= 'role';
				$route->save();

				$route 							= new WebRoute();
 				$route->route 			= '/middlewares/eliminar/{id}';
 				$route->name 				= 'middleware_delete';
 				$route->verb 				= 'post';
 				$route->controller 	= 'MiddlewareController';
 				$route->method 			= 'delete';
 				$route->permission 	= 'role';
 				$route->save();

				$route 							= new WebRoute();
 				$route->route 			= '/middlewares/activar/{id}';
 				$route->name 				= 'middleware_activate';
 				$route->verb 				= 'post';
 				$route->controller 	= 'MiddlewareController';
 				$route->method 			= 'activate';
 				$route->permission 	= 'role';
 				$route->save();

				$route 							= new WebRoute();
 				$route->route 			= '/middleware/get/row';
 				$route->name 				= 'middleware_get_row';
 				$route->verb 				= 'post';
 				$route->controller 	= 'MiddlewareController';
 				$route->method 			= 'getRow';
 				$route->permission 	= 'role';
 				$route->save();

    }

}
