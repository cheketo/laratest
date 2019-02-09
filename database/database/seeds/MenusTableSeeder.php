<?php

use App\Models\WebRoute;

use App\Models\Menu;

use Illuminate\Database\Seeder;

class MenusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

				// Inicio
				$route 	= WebRoute::where( 'name', 'dashboard' )->first();
				$menu = new Menu();
				$menu->title_menu = 'Inicio';
				$menu->title_tab 	= 'Inicio';
				$menu->title_page = 'Inicio';
				$menu->icon 			= 'fa fa-home';
				$menu->position 	= 1;
				$menu->route_id 	= $route[ 'id' ];
				$menu->save();

				// Alumnos
				$menu = new Menu();
				$menu->title_menu = 'Alumnos Posgrado';
				$menu->title_tab 	= 'Alumnos Posgrado';
				$menu->title_page = 'Alumnos Posgrado';
				$menu->icon 			= 'fa fa-user-graduate';
				$menu->position 	= 10;
				$menu->save();

				// Alumnos Listar
				$parent = Menu::where( 'title_menu', 'Alumnos Posgrado' )->first();
				$route 	= WebRoute::where( 'name', 'student_list' )->first();
				$menu = new Menu();
				$menu->title_menu = 'Listado Alumnos';
				$menu->title_tab 	= 'Listado de Alumnos';
				$menu->title_page = 'Alumnos';
				$menu->icon 			= 'fa fa-user-graduate';
				$menu->parent_id 	= $parent[ 'id' ];
				$menu->route_id 	= $route[ 'id' ];
				$menu->position 	= 1;
				$menu->save();

				// Precios
				$menu = new Menu();
				$menu->title_menu = 'Precios';
				$menu->title_tab 	= 'Precios';
				$menu->title_page = 'Precios';
				$menu->icon 			= 'fa fa-dollar';
				$menu->position 	= 20;
				$menu->save();

				// Precios Listar
				$parent = Menu::where( 'title_menu', 'Precios' )->first();
				$route 	= WebRoute::where( 'name', 'price_list' )->first();
				$menu = new Menu();
				$menu->title_menu = 'Listado de Precios';
				$menu->title_tab 	= 'Listado de Precios';
				$menu->title_page = 'Precios';
				$menu->icon 			= 'fa fa-dollar';
				$menu->parent_id 	= $parent[ 'id' ];
				$menu->route_id 	= $route[ 'id' ];
				$menu->position 	= 1;
				$menu->save();

				// Precios Historial
				$parent = Menu::where( 'title_menu', 'Precios' )->first();
				$route 	= WebRoute::where( 'name', 'price_history_list' )->first();
				$menu = new Menu();
				$menu->title_menu = 'Historial de Precios';
				$menu->title_tab 	= 'Historial de Precios';
				$menu->title_page = 'Historial';
				$menu->icon 			= 'fa fa-history';
				$menu->parent_id 	= $parent[ 'id' ];
				$menu->route_id 	= $route[ 'id' ];
				$menu->position 	= 9;
				$menu->save();

				// Categorías de Alumno
				$parent = Menu::where( 'title_menu', 'Alumnos Posgrado' )->first();
				$menu = new Menu();
				$menu->title_menu = 'Categorías de Alumno';
				$menu->title_tab 	= 'Categorías de Alumno';
				$menu->title_page = 'Categorías de Alumno';
				$menu->icon 			= 'fas fa-id-badge';
				$menu->parent_id 	= $parent[ 'id' ];
				$menu->position 	= 1;
				$menu->save();

				// Categorías de Alumno Listar
				$parent = Menu::where( 'title_menu', 'Categorías de Alumno' )->first();
				$route 	= WebRoute::where( 'name', 'student_category_list' )->first();
				$menu = new Menu();
				$menu->title_menu = 'Listado Categorías';
				$menu->title_tab 	= 'Listado de Categorías de Alumno';
				$menu->title_page = 'Categorías de Alumno';
				$menu->icon 			= 'fas fa-id-badge';
				$menu->parent_id 	= $parent[ 'id' ];
				$menu->route_id 	= $route[ 'id' ];
				$menu->position 	= 1;
				$menu->save();

				// Categorías de Alumno Crear
				$parent = Menu::where( 'title_menu', 'Categorías de Alumno' )->first();
				$route 	= WebRoute::where( 'name', 'student_category_create' )->first();
				$menu = new Menu();
				$menu->title_menu = 'Crear Categoría';
				$menu->title_tab 	= 'Crear Categoría de Alumno';
				$menu->title_page = 'Categoría de Alumno';
				$menu->icon 			= 'fa fa-plus-square';
				$menu->parent_id 	= $parent[ 'id' ];
				$menu->route_id 	= $route[ 'id' ];
				$menu->position 	= 2;
				$menu->save();

				// Carreras
				$menu = new Menu();
				$menu->title_menu = 'Carreras Posgrado';
				$menu->title_tab 	= 'Carreras Posgrado';
				$menu->title_page = 'Carreras Posgrado';
				$menu->icon 			= 'fas fa-award';
				$menu->position 	= 40;
				$menu->save();

				// Carreras Listar
				$parent = Menu::where( 'title_menu', 'Carreras Posgrado' )->first();
				$route 	= WebRoute::where( 'name', 'career_list' )->first();
				$menu = new Menu();
				$menu->title_menu = 'Listado de Carreras';
				$menu->title_tab 	= 'Listado de Carreras';
				$menu->title_page = 'Carreras';
				$menu->icon 			= 'fas fa-award';
				$menu->parent_id 	= $parent[ 'id' ];
				$menu->route_id 	= $route[ 'id' ];
				$menu->position 	= 1;
				$menu->save();

				// Carreras Grupos
				$parent = Menu::where( 'title_menu', 'Carreras Posgrado' )->first();
				$menu = new Menu();
				$menu->title_menu = 'Grupos de Carreras';
				$menu->title_tab 	= 'Grupos de Carreras';
				$menu->title_page = 'Grupos de Carreras';
				$menu->icon 			= 'fa fa-sitemap';
				$menu->parent_id 	= $parent[ 'id' ];
				$menu->position 	= 1;
				$menu->save();

				// Carreras Grupos Listar
				$parent = Menu::where( 'title_menu', 'Grupos de Carreras' )->first();
				$route 	= WebRoute::where( 'name', 'career_group_list' )->first();
				$menu = new Menu();
				$menu->title_menu = 'Listado de Grupos';
				$menu->title_tab 	= 'Listado de Grupos';
				$menu->title_page = 'Grupos de Carreras';
				$menu->icon 			= 'fas fa-sitemap';
				$menu->parent_id 	= $parent[ 'id' ];
				$menu->route_id 	= $route[ 'id' ];
				$menu->position 	= 1;
				$menu->save();

				// Carreras Grupos Crear
				$parent = Menu::where( 'title_menu', 'Grupos de Carreras' )->first();
				$route 	= WebRoute::where( 'name', 'career_group_create' )->first();
				$menu = new Menu();
				$menu->title_menu = 'Crear';
				$menu->title_tab 	= 'Crear Grupo de Carreras';
				$menu->title_page = 'Grupo de Carreras';
				$menu->icon 			= 'fa fa-plus-square';
				$menu->parent_id 	= $parent[ 'id' ];
				$menu->route_id 	= $route[ 'id' ];
				$menu->position 	= 2;
				$menu->save();

				// Importaciones
				$route 	= WebRoute::where( 'name', 'import_list' )->first();
				$menu = new Menu();
				$menu->title_menu = 'Importaciones Guarani';
				$menu->title_tab 	= 'Importaciones Guarani';
				$menu->title_page = 'Importaciones';
				$menu->icon 			= 'fas fa-download';
				$menu->route_id 	= $route[ 'id' ];
				$menu->position 	= 50;
				$menu->save();


				// Configuración
				$menu = new Menu();
				$menu->title_menu = 'Configuración';
				$menu->title_tab 	= 'Configuración';
				$menu->title_page = 'Configuración';
				$menu->icon 			= 'fa fa-gears';
				$menu->position 	= 99;
				$menu->save();

				// Usuarios
				$parent = Menu::where('title_menu', 'Configuración')->first();
				$menu = new Menu();
				$menu->title_menu = 'Usuarios';
				$menu->title_tab 	= 'Usuarios';
				$menu->title_page = 'Usuarios';
				$menu->icon 			= 'fa fa-user';
				$menu->parent_id 	= $parent['id'];
				$menu->position 	= 1;
				$menu->save();

				// Usuarios Listar
				$parent = Menu::where('title_menu', 'Usuarios')->first();
				$route 	= WebRoute::where('name', 'user_list')->first();
				$menu = new Menu();
				$menu->title_menu = 'Listado';
				$menu->title_tab 	= 'Listado de Usuarios';
				$menu->title_page = 'Usuarios';
				$menu->icon 			= 'fa fa-user';
				$menu->parent_id 	= $parent['id'];
				$menu->route_id 	= $route['id'];
				$menu->position 	= 1;
				$menu->save();

				// Usuarios Crear
				$parent = Menu::where('title_menu', 'Usuarios')->first();
				$route 	= WebRoute::where('name', 'user_create')->first();
				$menu = new Menu();
				$menu->title_menu = 'Crear';
				$menu->title_tab 	= 'Crear Usuario';
				$menu->title_page = 'Usuario';
				$menu->icon 			= 'fa fa-plus-square';
				$menu->parent_id 	= $parent['id'];
				$menu->route_id 	= $route['id'];
				$menu->position 	= 2;
				$menu->save();

				// Perfiles
				$parent = Menu::where('title_menu', 'Configuración')->first();
				$menu = new Menu();
				$menu->title_menu = 'Perfiles';
				$menu->title_tab 	= 'Perfiles';
				$menu->title_page = 'Perfiles';
				$menu->icon 			= 'fa fa-key';
				$menu->parent_id 	= $parent['id'];
				$menu->position 	= 2;
				$menu->save();

				// Perfiles Listar
				$parent = Menu::where('title_menu', 'Perfiles')->first();
				$route 	= WebRoute::where('name', 'role_list')->first();
				$menu = new Menu();
				$menu->title_menu = 'Listado';
				$menu->title_tab 	= 'Listado de Perfiles';
				$menu->title_page = 'Perfiles';
				$menu->icon 			= 'fa fa-key';
				$menu->parent_id 	= $parent['id'];
				$menu->route_id 	= $route['id'];
				$menu->position 	= 1;
				$menu->save();

				// Perfiles Crear
				$parent = Menu::where('title_menu', 'Perfiles')->first();
				$route 	= WebRoute::where('name', 'role_create')->first();
				$menu = new Menu();
				$menu->title_menu = 'Crear';
				$menu->title_tab 	= 'Crear Perfil';
				$menu->title_page = 'Perfil';
				$menu->icon 			= 'fa fa-plus-square';
				$menu->parent_id 	= $parent['id'];
				$menu->route_id 	= $route['id'];
				$menu->position 	= 2;
				$menu->save();

				// Rutas
				$parent = Menu::where('title_menu', 'Configuración')->first();
				$menu = new Menu();
				$menu->title_menu = 'Rutas';
				$menu->title_tab 	= 'Rutas';
				$menu->title_page = 'Rutas';
				$menu->icon 			= 'fa fa-map-signs';
				$menu->parent_id 	= $parent['id'];
				$menu->position 	= 3;
				$menu->save();

				// Rutas Listar
				$parent = Menu::where('title_menu', 'Rutas')->first();
				$route 	= WebRoute::where('name', 'route_list')->first();
				$menu = new Menu();
				$menu->title_menu = 'Listado';
				$menu->title_tab 	= 'Listado de Rutas';
				$menu->title_page = 'Rutas';
				$menu->icon 			= 'fa fa-map-signs';
				$menu->parent_id 	= $parent['id'];
				$menu->route_id 	= $route['id'];
				$menu->position 	= 1;
				$menu->save();

				// Rutas Crear
				$parent = Menu::where('title_menu', 'Rutas')->first();
				$route 	= WebRoute::where('name', 'route_create')->first();
				$menu = new Menu();
				$menu->title_menu = 'Crear';
				$menu->title_tab 	= 'Crear Ruta';
				$menu->title_page = 'Ruta';
				$menu->icon 			= 'fa fa-plus-square';
				$menu->parent_id 	= $parent['id'];
				$menu->route_id 	= $route['id'];
				$menu->position 	= 2;
				$menu->save();

				// Menues
				$parent = Menu::where('title_menu', 'Configuración')->first();
				$menu = new Menu();
				$menu->title_menu = 'Menues';
				$menu->title_tab 	= 'Menues';
				$menu->title_page = 'Menues';
				$menu->icon 			= 'fa fa-list-ul';
				$menu->parent_id 	= $parent['id'];
				$menu->position 	= 4;
				$menu->save();

				// Menues Listar
				$parent = Menu::where('title_menu', 'Menues')->first();
				$route 	= WebRoute::where('name', 'menu_list')->first();
				$menu = new Menu();
				$menu->title_menu = 'Listado';
				$menu->title_tab 	= 'Listado de Menues';
				$menu->title_page = 'Menues';
				$menu->icon 			= 'fa fa-list-ul';
				$menu->parent_id 	= $parent['id'];
				$menu->route_id 	= $route['id'];
				$menu->position 	= 1;
				$menu->save();

				// Menues Crear
				$parent = Menu::where('title_menu', 'Menues')->first();
				$route 	= WebRoute::where('name', 'menu_create')->first();
				$menu = new Menu();
				$menu->title_menu = 'Crear';
				$menu->title_tab 	= 'Crear Menu';
				$menu->title_page = 'Menu';
				$menu->icon 			= 'fa fa-plus-square';
				$menu->parent_id 	= $parent['id'];
				$menu->route_id 	= $route['id'];
				$menu->position 	= 2;
				$menu->save();

				// Middlewares
				$parent = Menu::where('title_menu', 'Configuración')->first();
				$menu = new Menu();
				$menu->title_menu = 'Middlewares';
				$menu->title_tab 	= 'Middlewares';
				$menu->title_page = 'Middlewares';
				$menu->icon 			= 'fa fa-lock';
				$menu->parent_id 	= $parent['id'];
				$menu->position 	= 4;
				$menu->save();

				// Middlewares Listar
				$parent = Menu::where('title_menu', 'Middlewares')->first();
				$route 	= WebRoute::where('name', 'middleware_list')->first();
				$menu = new Menu();
				$menu->title_menu = 'Listado';
				$menu->title_tab 	= 'Listado de Middlewares';
				$menu->title_page = 'Middlewares';
				$menu->icon 			= 'fa fa-lock';
				$menu->parent_id 	= $parent['id'];
				$menu->route_id 	= $route['id'];
				$menu->position 	= 1;
				$menu->save();

				// Middlewares Crear
				$parent = Menu::where('title_menu', 'Middlewares')->first();
				$route 	= WebRoute::where('name', 'middleware_create')->first();
				$menu = new Menu();
				$menu->title_menu = 'Crear';
				$menu->title_tab 	= 'Crear Middleware';
				$menu->title_page = 'Middleware';
				$menu->icon 			= 'fa fa-plus-square';
				$menu->parent_id 	= $parent['id'];
				$menu->route_id 	= $route['id'];
				$menu->position 	= 2;
				$menu->save();
    }
}
