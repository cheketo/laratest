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
				$user->first_name = 'Alejandro';
				$user->last_name = 'Romero';
				$user->user = 'aromero';
				$user->email = 'aromero@gmail.com';
				$user->password = bcrypt('123456');
				$user->image_id = $image->id;
				$user->save();
				$user->roles()->attach($role);
				$user->image();



				$user = new User();
				$user->first_name = 'Mariano';
				$user->last_name = 'Alonso';
				$user->user = 'malonso';
				$user->email = 'malonso@gmail.com';
				$user->password = bcrypt('123456');
				$user->image_id = $image->id;
				$user->save();
				$user->roles()->attach($role);
				// $user->image()->associate($image);

				$role = Role::where('name', 'Profesor')->first();

				$user = new User();
				$user->first_name = 'Carlos';
				$user->last_name = 'Archundia';
				$user->user = 'carchundia';
				$user->email = 'carchundia@gmail.com';
				$user->password = bcrypt('123456');
				$user->image_id = $image->id;
				$user->save();
				$user->roles()->attach($role);

				$role = Role::where('name', 'Alumno')->first();

				$user = new User();
				$user->first_name = 'Adolfo';
				$user->last_name = 'Gonzalez';
				$user->user = 'agonzalez';
				$user->email = 'agonzalez@gmail.com';
				$user->password = bcrypt('123456');
				$user->image_id = $image->id;
				$user->save();
				$user->roles()->attach($role);

				$user = new User();
				$user->first_name = 'Natalia';
				$user->last_name = 'Cohen';
				$user->user = 'ncohen';
				$user->email = 'ncohen@gmail.com';
				$user->password = bcrypt('123456');
				$user->image_id = $image->id;
				$user->save();
				$user->roles()->attach($role);

				$user = new User();
				$user->first_name = 'Laura';
				$user->last_name = 'Zapiola';
				$user->user = 'lzapiola';
				$user->email = 'lzapiola@gmail.com';
				$user->password = bcrypt('123456');
				$user->image_id = $image->id;
				$user->save();
				$user->roles()->attach($role);

				$user = new User();
				$user->first_name = 'Marco';
				$user->last_name = 'Rapio';
				$user->user = 'mrapio';
				$user->email = 'mrapio@gmail.com';
				$user->password = bcrypt('123456');
				$user->image_id = $image->id;
				$user->save();
				$user->roles()->attach($role);

				$user = new User();
				$user->first_name = 'Diana';
				$user->last_name = 'Alvarez';
				$user->user = 'dalvarez';
				$user->email = 'dalvarez@gmail.com';
				$user->password = bcrypt('123456');
				$user->image_id = $image->id;
				$user->save();
				$user->roles()->attach($role);

				$user = new User();
				$user->first_name = 'Jonathan';
				$user->last_name = 'Mercado';
				$user->user = 'jmercado';
				$user->email = 'jmercado@gmail.com';
				$user->password = bcrypt('123456');
				$user->image_id = $image->id;
				$user->save();
				$user->roles()->attach($role);

				$user = new User();
				$user->first_name = 'Ariel';
				$user->last_name = 'Colombo';
				$user->user = 'acolombo';
				$user->email = 'acolombo@gmail.com';
				$user->password = bcrypt('123456');
				$user->image_id = $image->id;
				$user->save();
				$user->roles()->attach($role);

				$user = new User();
				$user->first_name = 'Ivanna';
				$user->last_name = 'Abrigo';
				$user->user = 'iabrigo';
				$user->email = 'iabrigo@gmail.com';
				$user->password = bcrypt('123456');
				$user->image_id = $image->id;
				$user->save();
				$user->roles()->attach($role);

				$user = new User();
				$user->first_name = 'Lautaro';
				$user->last_name = 'Saenz';
				$user->user = 'lsaenz';
				$user->email = 'lsaenz@gmail.com';
				$user->password = bcrypt('123456');
				$user->image_id = $image->id;
				$user->save();
				$user->roles()->attach($role);

				$user = new User();
				$user->first_name = 'Lucía';
				$user->last_name = 'Ochoa';
				$user->user = 'lochoa';
				$user->email = 'lochoa@gmail.com';
				$user->password = bcrypt('123456');
				$user->image_id = $image->id;
				$user->save();
				$user->roles()->attach($role);

				$user = new User();
				$user->first_name = 'Raúl';
				$user->last_name = 'Martí';
				$user->user = 'rmarti';
				$user->email = 'rmarti@gmail.com';
				$user->password = bcrypt('123456');
				$user->image_id = $image->id;
				$user->save();
				$user->roles()->attach($role);

				$user = new User();
				$user->first_name = 'Agustín';
				$user->last_name = 'Acosta';
				$user->user = 'aacosta';
				$user->email = 'aacosta@gmail.com';
				$user->password = bcrypt('123456');
				$user->image_id = $image->id;
				$user->save();
				$user->roles()->attach($role);

				$user = new User();
				$user->first_name = 'Mariano';
				$user->last_name = 'Rosales';
				$user->user = 'mrosales';
				$user->email = 'mrosales@gmail.com';
				$user->password = bcrypt('123456');
				$user->image_id = $image->id;
				$user->save();
				$user->roles()->attach($role);

				$user = new User();
				$user->first_name = 'María Eva';
				$user->last_name = 'Mingorance';
				$user->user = 'memingorance';
				$user->email = 'memingorance@gmail.com';
				$user->password = bcrypt('123456');
				$user->image_id = $image->id;
				$user->save();
				$user->roles()->attach($role);

				$user = new User();
				$user->first_name = 'Roberto';
				$user->last_name = 'Hajjar';
				$user->user = 'rhajjar';
				$user->email = 'rhajjar@gmail.com';
				$user->password = bcrypt('123456');
				$user->image_id = $image->id;
				$user->save();
				$user->roles()->attach($role);

				$user = new User();
				$user->first_name = 'Florencia';
				$user->last_name = 'Marone';
				$user->user = 'fmarone';
				$user->email = 'fmarone@gmail.com';
				$user->password = bcrypt('123456');
				$user->image_id = $image->id;
				$user->save();
				$user->roles()->attach($role);

				$user = new User();
				$user->first_name = 'Claudio';
				$user->last_name = 'Pal';
				$user->user = 'cpal';
				$user->email = 'cpal@gmail.com';
				$user->password = bcrypt('123456');
				$user->image_id = $image->id;
				$user->save();
				$user->roles()->attach($role);

				$user = new User();
				$user->first_name = 'Junior';
				$user->last_name = 'Riokuma';
				$user->user = 'jriokuma';
				$user->email = 'jriokuma@gmail.com';
				$user->password = bcrypt('123456');
				$user->image_id = $image->id;
				$user->save();
				$user->roles()->attach($role);

				$user = new User();
				$user->first_name = 'Yuriko';
				$user->last_name = 'Otamendi';
				$user->user = 'yotamendi';
				$user->email = 'yotamendi@gmail.com';
				$user->password = bcrypt('123456');
				$user->image_id = $image->id;
				$user->save();
				$user->roles()->attach($role);

				$user = new User();
				$user->first_name = 'Nicolás';
				$user->last_name = 'Rolón';
				$user->user = 'nrolon';
				$user->email = 'nrolon@gmail.com';
				$user->password = bcrypt('123456');
				$user->image_id = $image->id;
				$user->save();
				$user->roles()->attach($role);

				// $user->image()->associate($image);

        // DB::table('users')->insert([
        //   	'first_name' => 'Alejandro',
				// 		'last_name' => 'Romero',
				// 		'user' => 'aromero',
        //   	'email' => 'aromero@gmail.com',
        // 	  'password' => bcrypt('123456'),
        // ]);
    }
}
