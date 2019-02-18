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
 				$route->verb 				= 'GET';
 				$route->controller 	= 'Auth\LoginController';
 				$route->method 			= 'showLoginForm';
 				$route->permission 	= 'public';
 				$route->save();

				$route 							= new WebRoute();
 				$route->route 			= '/login';
 				$route->name 				= 'login_form';
 				$route->verb 				= 'GET';
 				$route->controller 	= 'Auth\LoginController';
 				$route->method 			= 'showLoginForm';
 				$route->permission 	= 'public';
 				$route->save();

				$middleware 				= Middleware::where( 'name', 'userexist' )->first();

				$route 							= new WebRoute();
 				$route->route 			= '/login';
 				$route->name 				= 'login';
 				$route->verb 				= 'POST';
 				$route->controller 	= 'Auth\LoginController';
 				$route->method 			= 'login';
 				$route->permission 	= 'public';
 				$route->save();
				$route->middlewares()->attach( $middleware );

				$route 							= new WebRoute();
 				$route->route 			= '/logout';
 				$route->name 				= 'logout';
 				$route->verb 				= 'POST';
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
				$route->verb 				= 'GET';
				$route->controller 	= 'DashboardController';
				$route->method 			= 'index';
				$route->permission 	= 'private';
				$route->save();

        /*
				 *  Customer Routes
				 */

				$route 							= new WebRoute();
				$route->route 			= '/clientes';
				$route->name 				= 'customer_list';
				$route->verb 				= 'GET';
				$route->controller 	= 'CustomerController';
				$route->method 			= 'index';
				$route->permission 	= 'role';
				$route->save();

				$route 							= new WebRoute();
				$route->route 			= '/clientes/crear';
				$route->name 				= 'customer_create';
				$route->verb 				= 'GET';
				$route->controller 	= 'CustomerController';
				$route->method 			= 'create';
				$route->permission 	= 'role';
				$route->save();

				$route 							= new WebRoute();
 				$route->route 			= '/clientes/crear';
 				$route->name 				= 'customer_store';
 				$route->verb 				= 'POST';
 				$route->controller 	= 'CustomerController';
 				$route->method 			= 'store';
 				$route->permission 	= 'role';
 				$route->save();

				$route 							= new WebRoute();
				$route->route 			= '/clientes/{id}';
				$route->name 				= 'customer_show';
				$route->verb 				= 'GET';
				$route->controller 	= 'CustomerController';
				$route->method 			= 'show';
				$route->permission 	= 'role';
				$route->save();

				$route 							= new WebRoute();
				$route->route 			= '/clientes/editar/{id}';
				$route->name 				= 'customer_edit';
				$route->verb 				= 'GET';
				$route->controller 	= 'CustomerController';
				$route->method 			= 'edit';
				$route->permission 	= 'role';
				$route->save();

				$route 							= new WebRoute();
 				$route->route 			= '/clientes/editar/{id}';
 				$route->name 				= 'customer_update';
 				$route->verb 				= 'POST';
 				$route->controller 	= 'CustomerController';
 				$route->method 			= 'update';
 				$route->permission 	= 'role';
 				$route->save();

				$route 							= new WebRoute();
 				$route->route 			= '/clientes/eliminar/{id}';
 				$route->name 				= 'customer_delete';
 				$route->verb 				= 'POST';
 				$route->controller 	= 'CustomerController';
 				$route->method 			= 'delete';
 				$route->permission 	= 'role';
 				$route->save();

				$route 							= new WebRoute();
 				$route->route 			= '/clientes/activar/{id}';
 				$route->name 				= 'customer_activate';
 				$route->verb 				= 'POST';
 				$route->controller 	= 'CustomerController';
 				$route->method 			= 'activate';
 				$route->permission 	= 'role';
 				$route->save();

				$route 							= new WebRoute();
 				$route->route 			= '/customer/upload/image';
 				$route->name 				= 'customer_upload_image';
 				$route->verb 				= 'POST';
 				$route->controller 	= 'FileController';
 				$route->method 			= 'uploadImage';
 				$route->permission 	= 'role';
 				$route->save();

        /*
				 *  Company Routes
				 */

				$route 							= new WebRoute();
 				$route->route 			= '/company/validate/name';
 				$route->name 				= 'company_validate_name';
 				$route->verb 				= 'POST';
 				$route->controller 	= 'CompanyController';
 				$route->method 			= 'validateName';
 				$route->permission 	= 'role';
 				$route->save();


				// /*
				//  *  Import Route
				//  */
        //
				// $route 							= new WebRoute();
 				// $route->route 			= '/importaciones';
 				// $route->name 				= 'import_list';
 				// $route->verb 				= 'GET';
 				// $route->controller 	= 'GuaraniImporterController';
 				// $route->method 			= 'index';
 				// $route->permission 	= 'role';
 				// $route->save();
        //
				// $route 							= new WebRoute();
				// $route->route 			= '/importaciones/crear';
				// $route->name 				= 'import_store';
				// $route->verb 				= 'POST';
				// $route->controller 	= 'GuaraniImporterController';
				// $route->method 			= 'import';
				// $route->permission 	= 'role';
				// $route->save();

				// $route 							= new WebRoute();
				// $route->route 			= '/sync/students';
				// $route->name 				= 'sync_students';
				// $route->verb 				= 'POST';
				// $route->controller 	= 'StudentController';
				// $route->method 			= 'importFromGuarani';
				// $route->permission 	= 'role';
				// $route->save();
				//
				// $route 							= new WebRoute();
				// $route->route 			= '/sync/inscriptions';
				// $route->name 				= 'sync_inscriptions';
				// $route->verb 				= 'POST';
				// $route->controller 	= 'InscriptionController';
				// $route->method 			= 'importFromGuarani';
				// $route->permission 	= 'role';
				// $route->save();


				// /*
				//  *  Student Routes
				//  */
        //
				// $route 							= new WebRoute();
				// $route->route 			= '/alumnos';
				// $route->name 				= 'student_list';
				// $route->verb 				= 'GET';
				// $route->controller 	= 'StudentController';
				// $route->method 			= 'index';
				// $route->permission 	= 'role';
				// $route->save();
        //
				// $route 							= new WebRoute();
				// $route->route 			= '/alumnos/cuentacorriente/{id}';
				// $route->name 				= 'student_account';
				// $route->verb 				= 'GET';
				// $route->controller 	= 'StudentController';
				// $route->method 			= 'account';
				// $route->permission 	= 'role';
				// $route->save();
        //
				// $route 							= new WebRoute();
				// $route->route 			= '/alumnos/inscripcion/{id}';
				// $route->name 				= 'student_enrole';
				// $route->verb 				= 'GET';
				// $route->controller 	= 'StudentController';
				// $route->method 			= 'enrole';
				// $route->permission 	= 'role';
				// $route->save();
        //
				// $route 							= new WebRoute();
				// $route->route 			= '/alumnos/inscripcion/{id}';
				// $route->name 				= 'inscription_create';
				// $route->verb 				= 'POST';
				// $route->controller 	= 'InscriptionController';
				// $route->method 			= 'create';
				// $route->permission 	= 'role';
				// $route->save();
        //
				// $route 							= new WebRoute();
				// $route->route 			= '/alumnos/categoria/{id}';
				// $route->name 				= 'student_category';
				// $route->verb 				= 'GET';
				// $route->controller 	= 'StudentController';
				// $route->method 			= 'category';
				// $route->permission 	= 'role';
				// $route->save();
        //
				// $route 							= new WebRoute();
				// $route->route 			= '/alumnos/categoria/{id}';
				// $route->name 				= 'student_assign_category';
				// $route->verb 				= 'POST';
				// $route->controller 	= 'StudentController';
				// $route->method 			= 'assignCateogry';
				// $route->permission 	= 'role';
				// $route->save();
        //
				// $route 							= new WebRoute();
				// $route->route 			= '/student/get/prices';
				// $route->name 				= 'student_get_prices';
				// $route->verb 				= 'POST';
				// $route->controller 	= 'StudentController';
				// $route->method 			= 'getPrices';
				// $route->permission 	= 'role';
				// $route->save();
        //
				// /*
				//  *  Student Category Routes
				//  */
        //
				// $route 							= new WebRoute();
				// $route->route 			= '/alumnos/categorias';
				// $route->name 				= 'student_category_list';
				// $route->verb 				= 'GET';
				// $route->controller 	= 'StudentCategoryController';
				// $route->method 			= 'index';
				// $route->permission 	= 'role';
				// $route->save();
        //
				// $route 							= new WebRoute();
				// $route->route 			= '/alumnos/categorias/crear';
				// $route->name 				= 'student_category_create';
				// $route->verb 				= 'GET';
				// $route->controller 	= 'StudentCategoryController';
				// $route->method 			= 'create';
				// $route->permission 	= 'role';
				// $route->save();
        //
				// $route 							= new WebRoute();
 				// $route->route 			= '/alumnos/categorias/crear';
 				// $route->name 				= 'student_category_store';
 				// $route->verb 				= 'POST';
 				// $route->controller 	= 'StudentCategoryController';
 				// $route->method 			= 'store';
 				// $route->permission 	= 'role';
 				// $route->save();
        //
				// $route 							= new WebRoute();
 				// $route->route 			= '/alumnos/categorias/editar/{id}';
 				// $route->name 				= 'student_category_update';
 				// $route->verb 				= 'POST';
 				// $route->controller 	= 'StudentCategoryController';
 				// $route->method 			= 'update';
 				// $route->permission 	= 'role';
 				// $route->save();
        //
				// $route 							= new WebRoute();
				// $route->route 			= '/alumnos/categorias/editar/{id}';
				// $route->name 				= 'student_category_edit';
				// $route->verb 				= 'GET';
				// $route->controller 	= 'StudentCategoryController';
				// $route->method 			= 'edit';
				// $route->permission 	= 'role';
				// $route->save();
        //
				// $route 							= new WebRoute();
 				// $route->route 			= '/alumnos/categorias/eliminar/{id}';
 				// $route->name 				= 'student_category_delete';
 				// $route->verb 				= 'POST';
 				// $route->controller 	= 'StudentCategoryController';
 				// $route->method 			= 'delete';
 				// $route->permission 	= 'role';
 				// $route->save();
        //
				// $route 							= new WebRoute();
 				// $route->route 			= '/alumnos/categorias/activar/{id}';
 				// $route->name 				= 'student_category_activate';
 				// $route->verb 				= 'POST';
 				// $route->controller 	= 'StudentCategoryController';
 				// $route->method 			= 'activate';
 				// $route->permission 	= 'role';
 				// $route->save();
        //
				// $route 							= new WebRoute();
 				// $route->route 			= '/student/category/validate/name';
 				// $route->name 				= 'student_category_validate_name';
 				// $route->verb 				= 'POST';
 				// $route->controller 	= 'StudentCategoryController';
 				// $route->method 			= 'validateName';
 				// $route->permission 	= 'role';
 				// $route->save();
        //
				// $route 							= new WebRoute();
 				// $route->route 			= '/student/category/validate/foreign';
 				// $route->name 				= 'student_category_validate_foreign';
 				// $route->verb 				= 'POST';
 				// $route->controller 	= 'StudentCategoryController';
 				// $route->method 			= 'validateForeign';
 				// $route->permission 	= 'role';
 				// $route->save();
        //
				// $route 							= new WebRoute();
				// $route->route 			= '/alumnos/categorias/{id}';
				// $route->name 				= 'student_category_show';
				// $route->verb 				= 'GET';
				// $route->controller 	= 'StudentCategoryController';
				// $route->method 			= 'show';
				// $route->permission 	= 'role';
				// $route->save();

				/*
				 *  Person Routes
				 */

				// $route 							= new WebRoute();
				// $route->route 			= '/personas';
				// $route->name 				= 'person_list';
				// $route->verb 				= 'GET';
				// $route->controller 	= 'PersonController';
				// $route->method 			= 'index';
				// $route->permission 	= 'role';
				// $route->save();

				// /*
				//  *  Career Routes
				//  */
        //
				// $route 							= new WebRoute();
				// $route->route 			= '/carreras';
				// $route->name 				= 'career_list';
				// $route->verb 				= 'GET';
				// $route->controller 	= 'CareerController';
				// $route->method 			= 'index';
				// $route->permission 	= 'role';
				// $route->save();
        //
				// /*
				//  *  Prices Routes
				//  */
        //
				// $route 							= new WebRoute();
				// $route->route 			= '/precios';
				// $route->name 				= 'price_list';
				// $route->verb 				= 'GET';
				// $route->controller 	= 'PriceController';
				// $route->method 			= 'index';
				// $route->permission 	= 'role';
				// $route->save();
        //
				// $route 							= new WebRoute();
 				// $route->route 			= '/precios/editar/{group}/{cateogry}';
 				// $route->name 				= 'price_edit';
 				// $route->verb 				= 'GET';
 				// $route->controller 	= 'PriceController';
 				// $route->method 			= 'edit';
 				// $route->permission 	= 'role';
 				// $route->save();
        //
				// $route 							= new WebRoute();
 				// $route->route 			= '/precios/editar/{group}/{cateogry}';
 				// $route->name 				= 'price_update';
 				// $route->verb 				= 'POST';
 				// $route->controller 	= 'PriceController';
 				// $route->method 			= 'update';
 				// $route->permission 	= 'role';
 				// $route->save();
        //
				// $route 							= new WebRoute();
 				// $route->route 			= '/precios/historial';
 				// $route->name 				= 'price_history_list';
 				// $route->verb 				= 'GET';
 				// $route->controller 	= 'PriceHistoryController';
 				// $route->method 			= 'index';
 				// $route->permission 	= 'role';
 				// $route->save();
        //
				// /*
				//  *  Career Group Routes
				//  */
        //
				// $route 							= new WebRoute();
 				// $route->route 			= '/carreras/grupos';
 				// $route->name 				= 'career_group_list';
 				// $route->verb 				= 'GET';
 				// $route->controller 	= 'CareerGroupController';
 				// $route->method 			= 'index';
 				// $route->permission 	= 'role';
 				// $route->save();
        //
 				// $route 							= new WebRoute();
 				// $route->route 			= '/carreras/grupos/crear';
 				// $route->name 				= 'career_group_create';
 				// $route->verb 				= 'GET';
 				// $route->controller 	= 'CareerGroupController';
 				// $route->method 			= 'create';
 				// $route->permission 	= 'role';
 				// $route->save();
        //
 				// $route 							= new WebRoute();
				// $route->route 			= '/carreras/grupos/crear';
				// $route->name 				= 'career_group_store';
				// $route->verb 				= 'POST';
				// $route->controller 	= 'CareerGroupController';
				// $route->method 			= 'store';
				// $route->permission 	= 'role';
				// $route->save();
        //
 				// $route 							= new WebRoute();
 				// $route->route 			= '/carreras/grupos/detalle/{id}';
 				// $route->name 				= 'career_group_show';
 				// $route->verb 				= 'GET';
 				// $route->controller 	= 'CareerGroupController';
 				// $route->method 			= 'show';
 				// $route->permission 	= 'role';
 				// $route->save();
        //
 				// $route 							= new WebRoute();
 				// $route->route 			= '/carreras/grupos/editar/{id}';
 				// $route->name 				= 'career_group_edit';
 				// $route->verb 				= 'GET';
 				// $route->controller 	= 'CareerGroupController';
 				// $route->method 			= 'edit';
 				// $route->permission 	= 'role';
 				// $route->save();
        //
 				// $route 							= new WebRoute();
				// $route->route 			= '/carreras/grupos/editar/{id}';
				// $route->name 				= 'career_group_update';
				// $route->verb 				= 'POST';
				// $route->controller 	= 'CareerGroupController';
				// $route->method 			= 'update';
				// $route->permission 	= 'role';
				// $route->save();
        //
 				// $route 							= new WebRoute();
				// $route->route 			= '/carreras/grupos/eliminar/{id}';
				// $route->name 				= 'career_group_delete';
				// $route->verb 				= 'POST';
				// $route->controller 	= 'CareerGroupController';
				// $route->method 			= 'delete';
				// $route->permission 	= 'role';
				// $route->save();
        //
 				// $route 							= new WebRoute();
				// $route->route 			= '/carreras/grupos/activar/{id}';
				// $route->name 				= 'career_group_activate';
				// $route->verb 				= 'POST';
				// $route->controller 	= 'CareerGroupController';
				// $route->method 			= 'activate';
				// $route->permission 	= 'role';
				// $route->save();
        //
 				// $route 							= new WebRoute();
				// $route->route 			= '/career/group/validate/name';
				// $route->name 				= 'career_group_validate_name';
				// $route->verb 				= 'POST';
				// $route->controller 	= 'CareerGroupController';
				// $route->method 			= 'validateName';
				// $route->permission 	= 'role';
				// $route->save();
        //
				// $route 							= new WebRoute();
				// $route->route 			= '/career/group/validate/prefixes';
				// $route->name 				= 'career_group_validate_prefixes';
				// $route->verb 				= 'POST';
				// $route->controller 	= 'CareerGroupController';
				// $route->method 			= 'validatePrefixes';
				// $route->permission 	= 'role';
				// $route->save();

				/*
				 *  User Routes
				 */

				$route 							= new WebRoute();
				$route->route 			= '/usuarios';
				$route->name 				= 'user_list';
				$route->verb 				= 'GET';
				$route->controller 	= 'UserController';
				$route->method 			= 'index';
				$route->permission 	= 'role';
				$route->save();

				$route 							= new WebRoute();
				$route->route 			= '/usuarios/crear';
				$route->name 				= 'user_create';
				$route->verb 				= 'GET';
				$route->controller 	= 'UserController';
				$route->method 			= 'create';
				$route->permission 	= 'role';
				$route->save();

				$route 							= new WebRoute();
 				$route->route 			= '/usuarios/crear';
 				$route->name 				= 'user_store';
 				$route->verb 				= 'POST';
 				$route->controller 	= 'UserController';
 				$route->method 			= 'store';
 				$route->permission 	= 'role';
 				$route->save();

				$route 							= new WebRoute();
				$route->route 			= '/usuarios/perfil';
				$route->name 				= 'user_profile';
				$route->verb 				= 'VIEW';
				$route->view 				= 'users.profile';
				$route->permission 	= 'private';
				$route->save();

				$route 							= new WebRoute();
				$route->route 			= '/usuarios/{user}';
				$route->name 				= 'user_show';
				$route->verb 				= 'GET';
				$route->controller 	= 'UserController';
				$route->method 			= 'show';
				$route->permission 	= 'role';
				$route->save();

				$middleware 				= Middleware::where('name','usercanbeedited')->first();

				$route 							= new WebRoute();
				$route->route 			= '/usuarios/editar/{id}';
				$route->name 				= 'user_edit';
				$route->verb 				= 'GET';
				$route->controller 	= 'UserController';
				$route->method 			= 'edit';
				$route->permission 	= 'role';
				$route->save();
				$route->middlewares()->attach( $middleware );

				$route 							= new WebRoute();
 				$route->route 			= '/usuarios/editar/{id}';
 				$route->name 				= 'user_update';
 				$route->verb 				= 'POST';
 				$route->controller 	= 'UserController';
 				$route->method 			= 'update';
 				$route->permission 	= 'role';
 				$route->save();

				$route 							= new WebRoute();
 				$route->route 			= '/usuarios/eliminar/{id}';
 				$route->name 				= 'user_delete';
 				$route->verb 				= 'POST';
 				$route->controller 	= 'UserController';
 				$route->method 			= 'delete';
 				$route->permission 	= 'role';
 				$route->save();

				$route 							= new WebRoute();
 				$route->route 			= '/usuarios/activar/{id}';
 				$route->name 				= 'user_activate';
 				$route->verb 				= 'POST';
 				$route->controller 	= 'UserController';
 				$route->method 			= 'activate';
 				$route->permission 	= 'role';
 				$route->save();

				$route 							= new WebRoute();
 				$route->route 			= '/user/upload/image';
 				$route->name 				= 'user_upload_image';
 				$route->verb 				= 'POST';
 				$route->controller 	= 'FileController';
 				$route->method 			= 'uploadImage';
 				$route->permission 	= 'role';
 				$route->save();

				$route 							= new WebRoute();
 				$route->route 			= '/user/validate/user';
 				$route->name 				= 'user_validate_user';
 				$route->verb 				= 'POST';
 				$route->controller 	= 'UserController';
 				$route->method 			= 'validateUser';
 				$route->permission 	= 'role';
 				$route->save();

				$route 							= new WebRoute();
 				$route->route 			= '/user/validate/email';
 				$route->name 				= 'user_validate_email';
 				$route->verb 				= 'POST';
 				$route->controller 	= 'UserController';
 				$route->method 			= 'validateEmail';
 				$route->permission 	= 'role';
 				$route->save();

				$route 							= new WebRoute();
 				$route->route 			= '/user/change/color/{skin}';
 				$route->name 				= 'user_change_color';
 				$route->verb 				= 'POST';
 				$route->controller 	= 'UserController';
 				$route->method 			= 'changeColor';
 				$route->permission 	= 'private';
 				$route->save();

				$route 							= new WebRoute();
				$route->route 			= '/user/change/password';
				$route->name 				= 'user_change_password';
				$route->verb 				= 'POST';
				$route->controller 	= 'UserController';
				$route->method 			= 'changePassword';
				$route->permission 	= 'role';
				$route->save();


				/*
				 *  Role Routes
				 */

				$route 							= new WebRoute();
				$route->route 			= '/perfiles';
				$route->name 				= 'role_list';
				$route->verb 				= 'GET';
				$route->controller 	= 'RoleController';
				$route->method 			= 'index';
				$route->permission 	= 'role';
				$route->save();

				$route 							= new WebRoute();
				$route->route 			= '/perfiles/crear';
				$route->name 				= 'role_create';
				$route->verb 				= 'GET';
				$route->controller 	= 'RoleController';
				$route->method 			= 'create';
				$route->permission 	= 'role';
				$route->save();

				$route 							= new WebRoute();
				$route->route 			= '/perfiles/crear';
				$route->name 				= 'role_store';
				$route->verb 				= 'POST';
				$route->controller 	= 'RoleController';
				$route->method 			= 'store';
				$route->permission 	= 'role';
				$route->save();

				$route 							= new WebRoute();
				$route->route 			= '/perfiles/{id}';
				$route->name 				= 'role_show';
				$route->verb 				= 'GET';
				$route->controller 	= 'RoleController';
				$route->method 			= 'show';
				$route->permission 	= 'role';
				$route->save();

				$route 							= new WebRoute();
				$route->route 			= '/perfiles/editar/{id}';
				$route->name 				= 'role_edit';
				$route->verb 				= 'GET';
				$route->controller 	= 'RoleController';
				$route->method 			= 'edit';
				$route->permission 	= 'role';
				$route->save();

				$route 							= new WebRoute();
				$route->route 			= '/perfiles/editar/{id}';
				$route->name 				= 'role_update';
				$route->verb 				= 'POST';
				$route->controller 	= 'RoleController';
				$route->method 			= 'update';
				$route->permission 	= 'role';
				$route->save();

				$route 							= new WebRoute();
 				$route->route 			= '/perfiles/eliminar/{id}';
 				$route->name 				= 'role_delete';
 				$route->verb 				= 'POST';
 				$route->controller 	= 'RoleController';
 				$route->method 			= 'delete';
 				$route->permission 	= 'role';
 				$route->save();

				$route 							= new WebRoute();
 				$route->route 			= '/perfiles/activar/{id}';
 				$route->name 				= 'role_activate';
 				$route->verb 				= 'POST';
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
 				$route->verb 				= 'GET';
 				$route->controller 	= 'WebRouteController';
 				$route->method 			= 'index';
 				$route->permission 	= 'role';
 				$route->save();

				$route 							= new WebRoute();
 				$route->route 			= '/rutas/crear';
 				$route->name 				= 'route_create';
 				$route->verb 				= 'GET';
 				$route->controller 	= 'WebRouteController';
 				$route->method 			= 'create';
 				$route->permission 	= 'role';
 				$route->save();

				$route 							= new WebRoute();
 				$route->route 			= '/rutas/crear';
 				$route->name 				= 'route_store';
 				$route->verb 				= 'POST';
 				$route->controller 	= 'WebRouteController';
 				$route->method 			= 'store';
 				$route->permission 	= 'role';
 				$route->save();

				$route 							= new WebRoute();
 				$route->route 			= '/rutas/{name}';
 				$route->name 				= 'route_show';
 				$route->verb 				= 'GET';
 				$route->controller 	= 'WebRouteController';
 				$route->method 			= 'show';
 				$route->permission 	= 'role';
 				$route->save();

				$route 							= new WebRoute();
 				$route->route 			= '/rutas/editar/{id}';
 				$route->name 				= 'route_edit';
 				$route->verb 				= 'GET';
 				$route->controller 	= 'WebRouteController';
 				$route->method 			= 'edit';
 				$route->permission 	= 'role';
 				$route->save();

				$route 							= new WebRoute();
 				$route->route 			= '/rutas/editar/{id}';
 				$route->name 				= 'route_update';
 				$route->verb 				= 'POST';
 				$route->controller 	= 'WebRouteController';
 				$route->method 			= 'update';
 				$route->permission 	= 'role';
 				$route->save();

				$route 							= new WebRoute();
 				$route->route 			= '/rutas/eliminar/{id}';
 				$route->name 				= 'route_delete';
 				$route->verb 				= 'POST';
 				$route->controller 	= 'WebRouteController';
 				$route->method 			= 'delete';
 				$route->permission 	= 'role';
 				$route->save();

				$route 							= new WebRoute();
 				$route->route 			= '/rutas/activar/{id}';
 				$route->name 				= 'route_activate';
 				$route->verb 				= 'POST';
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
				$route->verb 				= 'GET';
				$route->controller 	= 'MenuController';
				$route->method 			= 'index';
				$route->permission 	= 'role';
				$route->save();

				$route 							= new WebRoute();
				$route->route 			= '/menues/crear';
				$route->name 				= 'menu_create';
				$route->verb 				= 'GET';
				$route->controller 	= 'MenuController';
				$route->method 			= 'create';
				$route->permission 	= 'role';
				$route->save();

				$route 							= new WebRoute();
				$route->route 			= '/menues/crear';
				$route->name 				= 'menu_store';
				$route->verb 				= 'POST';
				$route->controller 	= 'MenuController';
				$route->method 			= 'store';
				$route->permission 	= 'role';
				$route->save();

				$route 							= new WebRoute();
				$route->route 			= '/menues/{id}';
				$route->name 				= 'menu_show';
				$route->verb 				= 'GET';
				$route->controller 	= 'MenuController';
				$route->method 			= 'show';
				$route->permission 	= 'role';
				$route->save();

				$route 							= new WebRoute();
				$route->route 			= '/menues/editar/{id}';
				$route->name 				= 'menu_edit';
				$route->verb 				= 'GET';
				$route->controller 	= 'MenuController';
				$route->method 			= 'edit';
				$route->permission 	= 'role';
				$route->save();

				$route 							= new WebRoute();
				$route->route 			= '/menues/editar/{id}';
				$route->name 				= 'menu_update';
				$route->verb 				= 'POST';
				$route->controller 	= 'MenuController';
				$route->method 			= 'update';
				$route->permission 	= 'role';
				$route->save();

				$route 							= new WebRoute();
 				$route->route 			= '/menues/eliminar/{id}';
 				$route->name 				= 'menu_delete';
 				$route->verb 				= 'POST';
 				$route->controller 	= 'MenuController';
 				$route->method 			= 'delete';
 				$route->permission 	= 'role';
 				$route->save();

				$route 							= new WebRoute();
 				$route->route 			= '/menues/activar/{id}';
 				$route->name 				= 'menu_activate';
 				$route->verb 				= 'POST';
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
				$route->verb 				= 'GET';
				$route->controller 	= 'MiddlewareController';
				$route->method 			= 'index';
				$route->permission 	= 'role';
				$route->save();

				$route 							= new WebRoute();
				$route->route 			= '/middlewares/crear';
				$route->name 				= 'middleware_create';
				$route->verb 				= 'GET';
				$route->controller 	= 'MiddlewareController';
				$route->method 			= 'create';
				$route->permission 	= 'role';
				$route->save();

				$route 							= new WebRoute();
				$route->route 			= '/middlewares/crear';
				$route->name 				= 'middleware_store';
				$route->verb 				= 'POST';
				$route->controller 	= 'MiddlewaresController';
				$route->method 			= 'store';
				$route->permission 	= 'role';
				$route->save();

				$route 							= new WebRoute();
				$route->route 			= '/middlewares/{id}';
				$route->name 				= 'middleware_show';
				$route->verb 				= 'GET';
				$route->controller 	= 'MiddlewareController';
				$route->method 			= 'show';
				$route->permission 	= 'role';
				$route->save();

				$route 							= new WebRoute();
				$route->route 			= '/middlewares/editar/{id}';
				$route->name 				= 'middleware_edit';
				$route->verb 				= 'GET';
				$route->controller 	= 'MiddlewareController';
				$route->method 			= 'edit';
				$route->permission 	= 'role';
				$route->save();

				$route 							= new WebRoute();
				$route->route 			= '/middlewares/editar/{id}';
				$route->name 				= 'middleware_update';
				$route->verb 				= 'POST';
				$route->controller 	= 'MiddlewareController';
				$route->method 			= 'update';
				$route->permission 	= 'role';
				$route->save();

				$route 							= new WebRoute();
 				$route->route 			= '/middlewares/eliminar/{id}';
 				$route->name 				= 'middleware_delete';
 				$route->verb 				= 'POST';
 				$route->controller 	= 'MiddlewareController';
 				$route->method 			= 'delete';
 				$route->permission 	= 'role';
 				$route->save();

				$route 							= new WebRoute();
 				$route->route 			= '/middlewares/activar/{id}';
 				$route->name 				= 'middleware_activate';
 				$route->verb 				= 'POST';
 				$route->controller 	= 'MiddlewareController';
 				$route->method 			= 'activate';
 				$route->permission 	= 'role';
 				$route->save();

				$route 							= new WebRoute();
 				$route->route 			= '/middleware/get/row';
 				$route->name 				= 'middleware_get_row';
 				$route->verb 				= 'POST';
 				$route->controller 	= 'MiddlewareController';
 				$route->method 			= 'getRow';
 				$route->permission 	= 'role';
 				$route->save();

    }

}
