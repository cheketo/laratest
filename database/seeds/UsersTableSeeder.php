<?php

use App\Models\Role;
use App\Models\User;
use App\Models\File;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

				$role = Role::where( 'name', 'Administrador' )->first();

				$image = File::where( 'route', User::DEFAULT_IMAGE_URL )->first();

				$user = new User();
				$user->first_name = 'Mariano';
				$user->last_name = 'Alonso';
				$user->user = 'malonso';
				$user->email = 'malonso@filo.uba.ar';
				$user->password = bcrypt('456123');
				$user->image_id = $image->id;
				$user->save();
				$user->roles()->attach($role);

				$user = new User();
				$user->first_name = 'Alejandro';
				$user->last_name = 'Bachanian';
				$user->user = 'abachanian';
				$user->email = 'abachanian@filo.uba.ar';
				$user->password = bcrypt('456123');
				$user->image_id = $image->id;
				$user->save();
				$user->roles()->attach($role);

				$user = new User();
				$user->first_name = 'Alejandro';
				$user->last_name = 'Romero';
				$user->user = 'aromero';
				$user->email = 'aromero@filo.uba.ar';
				$user->password = bcrypt('456123');
				$user->image_id = $image->id;
				$user->save();
				$user->roles()->attach($role);


    }
}
