<?php

use Illuminate\Database\Seeder;
use App\Models\Middleware;

class MiddlewaresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

				$middleware = new Middleware();
				$middleware->name = 'userexist';
				$middleware->class = '\App\Http\Middleware\UserExist';
				$middleware->save();

				$middleware = new Middleware();
				$middleware->name = 'checkrole';
				$middleware->class = '\App\Http\Middleware\CheckRole';
				$middleware->save();

				$middleware = new Middleware();
				$middleware->name = 'checkpermission';
				$middleware->class = '\App\Http\Middleware\CheckPermission';
				$middleware->save();

				$middleware = new Middleware();
				$middleware->name = 'usercanbeedited';
				$middleware->class = '\App\Http\Middleware\UserCanBeEdited';
				$middleware->save();

    }

}
