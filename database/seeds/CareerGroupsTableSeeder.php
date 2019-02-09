<?php

use Illuminate\Database\Seeder;

use App\Models\CareerGroup;

use App\Models\StudentCategory;

class CareerGroupsTableSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

				// Inserting Career Groups

				$groups = array();

        $careerGroup = new CareerGroup();

				$careerGroup->name = 'Maestrias';

				$careerGroup->save();

				$groups[] = $careerGroup;

				$careerGroup = new CareerGroup();

				$careerGroup->name = 'Doctorados';

				$careerGroup->save();

				$groups[] = $careerGroup;

				$careerGroup = new CareerGroup();

				$careerGroup->name = 'Carreras de Especialización';

				$careerGroup->save();

				$groups[] = $careerGroup;

				$careerGroup = new CareerGroup();

				$careerGroup->name = 'Especializaciones';

				$careerGroup->save();

				$groups[] = $careerGroup;

				$careerGroup = new CareerGroup();

				$careerGroup->name = 'Programas de Actualización';

				$careerGroup->save();

				$groups[] = $careerGroup;

				$careerGroup = new CareerGroup();

				$careerGroup->name = 'Seminarios';

				$careerGroup->save();

				$groups[] = $careerGroup;

				// Saving Categories Relations

				$categories = StudentCategory::status( 'A' )->get();

				foreach( $groups as $group )
				{

						foreach( $categories as $category )
						{

								$ids[ $category->id ] = [ 'enrollment_amount' => '0', 'enrollment_price' => '0', 'fee_amount' => '0', 'fee_price' => '0' ];

						}

						$group->categories()->sync( $ids );

				}

    }

}
