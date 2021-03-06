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

				$this->call( FilesTableSeeder::class );

				$this->call( MiddlewaresTableSeeder::class );

				$this->call( RoutesTableSeeder::class );

        $this->call( RolesTableSeeder::class );

				$this->call( UsersTableSeeder::class );

				$this->call( MenusTableSeeder::class );

        $this->call( CompanyProfilesTableSeeder::class );

        $this->call( CompanyTypesTableSeeder::class );

				$this->call( PaymentMethodsTableSeeder::class );

    }

}
