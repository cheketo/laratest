<?php

use Illuminate\Support\Facades\Schema;

use Illuminate\Database\Schema\Blueprint;

use Illuminate\Database\Migrations\Migration;

class SetMovementRelations extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

				Schema::table( 'movements', function( Blueprint $table )
				{

						$table->foreign( 'student_id' )->references( 'id' )->on( 'students' );

						// $table->foreign( 'parent_id' )->references( 'id' )->on( 'movements' );

				});

				Schema::table( 'students', function( Blueprint $table )
				{

						$table->foreign( 'last_movement_id' )->references( 'id' )->on( 'movements' );

				});

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

        //

    }
		
}
