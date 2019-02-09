<?php

use Illuminate\Database\Seeder;

use App\Models\StudentCategory;

class StudentCategoriesTableSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

				$studentCategory = new StudentCategory();
				$studentCategory->name = 'Egresados de la Universidad de Buenos Aires';
				$studentCategory->foreign_id = '17';
				$studentCategory->save();

				$studentCategory = new StudentCategory();
				$studentCategory->name = 'Egresados de Universidades Nacionales Estatales';
				$studentCategory->foreign_id = '18';
				$studentCategory->save();

				$studentCategory = new StudentCategory();
				$studentCategory->name = 'Egresados de Universidades Privadas o Extranjeras';
				$studentCategory->foreign_id = '19';
				$studentCategory->save();

				$studentCategory = new StudentCategory();
				$studentCategory->name = 'Extranjeros Cursando en el Exterior';
				$studentCategory->foreign_id = '7';
				$studentCategory->save();

				$studentCategory = new StudentCategory();
				$studentCategory->name = 'Exentos';
				$studentCategory->foreign_id = '16';
				$studentCategory->save();

		}

}
