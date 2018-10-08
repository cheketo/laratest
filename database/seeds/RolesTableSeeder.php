<?php

use App\Models\WebRoute;
use App\Models\Role;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
				// $routes = WebRoute::whereNotIn('id', [1,2,3])->get();
				$routes = WebRoute::whereNotIn('id', [1])->get();

				$role = new Role();
				$role->name = 'Administrador';
				$role->description = 'Perfil para administradores del sistema';
				$role->save();
				$role->routes()->attach($routes);

				$role = new Role();
				$role->name = 'Director';
				$role->description = 'Perfil para profesores del sistema';
				$role->save();

				$role = new Role();
				$role->name = 'Profesor';
				$role->description = 'Perfil para profesores del sistema';
				$role->save();

				$role = new Role();
				$role->name = 'Alumno';
				$role->description = 'Perfil para alumnos del sistema';
				$role->save();


    }
}
