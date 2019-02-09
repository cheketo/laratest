<?php

use Illuminate\Database\Seeder;

use App\Models\File;

class FilesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

				$file = new File();

				$file->route = '/views/users/images/default/default.jpg';

				$file->name = 'default';

				$file->type = 'jpg';

				$file->original_name = 'default';

				$file->save();

    }

}
