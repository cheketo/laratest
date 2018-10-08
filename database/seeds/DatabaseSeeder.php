<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

				$this->call(FileTableSeeder::class);
				$this->call(MiddlewareTableSeeder::class);
				$this->call(RoutesTableSeeder::class);
        $this->call(RolesTableSeeder::class);
				$this->call(UsersTableSeeder::class);
				$this->call(MenuTableSeeder::class);

    }

}
