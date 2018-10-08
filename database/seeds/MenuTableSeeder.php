<?php

use App\Models\WebRoute;
use App\Models\Menu;
use Illuminate\Database\Seeder;

class MenuTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

				// Inicio
				$route 	= WebRoute::where('name', 'dashboard')->first();
				$menu = new Menu();
				$menu->title_menu = 'Inicio';
				$menu->title_tab 	= 'Inicio';
				$menu->title_page = 'Inicio';
				$menu->icon 			= 'fa fa-home';
				$menu->position 	= 1;
				$menu->route_id 	= $route['id'];
				$menu->save();

				// Alumnos
				$menu = new Menu();
				$menu->title_menu = 'Alumnos';
				$menu->title_tab 	= 'Alumnos';
				$menu->title_page = 'Alumnos';
				$menu->icon 			= 'far fa-address-book';
				$menu->position 	= 10;
				$menu->save();

				// Alumnos Listar
				$parent = Menu::where('title_menu', 'Alumnos')->first();
				$route 	= WebRoute::where('name', 'student_list')->first();
				$menu = new Menu();
				$menu->title_menu = 'Listado';
				$menu->title_tab 	= 'Listado de Alumnos';
				$menu->title_page = 'Alumnos';
				$menu->icon 			= 'fa fa-address-book';
				$menu->parent_id 	= $parent['id'];
				$menu->route_id 	= $route['id'];
				$menu->position 	= 1;
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
