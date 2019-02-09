<?php

use Illuminate\Database\Seeder;

use App\Http\Controllers\MovementController;

use App\Models\Aux\Movement as AuxMovement;

class OldGuaraniMovementsSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

				if( file_exists( 'public/u806f_cuota.txt' ) )
				{

						if( $this->command->confirm( 'Do you wish to import movement data from siu_postmig261_cap2 file to posgrado_aux? This may took a while to complete') )
						{

								$this->command->info( 'Deleting posgrado_aux.guarani_movements' );

								\DB::statement( "DROP TABLE posgrado_aux.guarani_movements;" );

								$this->command->info( 'Exporting posgrado.guarani_movements structure to posgrado_aux.guarani_movements' );

								\DB::statement( "CREATE TABLE posgrado_aux.guarani_movements LIKE posgrado.guarani_movements;" );

								$this->command->info( 'Importing movement data from siu_postmig261_cap2 file to posgrado.guarani_movements. Relax and drink some mate, this will take a while.' );

								MovementController::createOldMovementTable( $this->command );

								$this->command->info( 'Exporting posgrado.guarani_movements data to posgrado_aux.guarani_movements' );

								\DB::statement( "INSERT posgrado_aux.guarani_movements SELECT * FROM posgrado.guarani_movements;" );

								$this->command->info( 'Dropping posgrado.guarani_movements' );

								\DB::statement( "DROP TABLE posgrado.guarani_movements;" );
						}

				}else{

						$this->command->info( 'File located at public/u806f_cuota.txt not found. Movements from siu_postmig261_cap2 file cannot be imported. If this is the first time you run migrations, this could cause several errors. Please, create the file with Guarani movement data and try again.' );

				}

        // MovementController::createOldMovementTable();

    }

}
