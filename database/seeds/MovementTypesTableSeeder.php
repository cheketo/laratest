<?php

use Illuminate\Database\Seeder;

use App\Models\MovementType;

class MovementTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

				$movementType 						= new MovementType();
				$movementType->name 			= 'Débito';
				$movementType->type 			= 'D';
				$movementType->save();

				$movementType 						= new MovementType();
				$movementType->name 			= 'Crédito';
				$movementType->type 			= 'C';
				$movementType->save();

				$movementType 						= new MovementType();
				$movementType->name 			= 'Cuota';
				$movementType->type 			= 'D';
				$movementType->save();

				$movementType 						= new MovementType();
				$movementType->name 			= 'Matrícula';
				$movementType->type 			= 'D';
				$movementType->save();

				$movementType 						= new MovementType();
				$movementType->name 			= 'Pago de Cuota';
				$movementType->type 			= 'C';
				$movementType->save();

				$movementType 						= new MovementType();
				$movementType->name 			= 'Pago de Matrícula';
				$movementType->type 			= 'C';
				$movementType->save();

    }

}
