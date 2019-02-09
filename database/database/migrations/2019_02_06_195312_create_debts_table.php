<?php

use Illuminate\Support\Facades\Schema;

use Illuminate\Database\Schema\Blueprint;

use Illuminate\Database\Migrations\Migration;

class CreateDebtsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create( 'debts', function( Blueprint $table )
				{

						$table->increments( 'id' );

						$table->unsignedInteger( 'student_id' );

						$table->foreign( 'student_id' )->references( 'id' )->on( 'students' );

						$table->unsignedInteger( 'movement_id' )->nullable();

						$table->foreign( 'movement_id' )->references( 'id' )->on( 'movements' );

						$table->morphs( 'reference' ); // Polymorphic relation width Fees and Enrollments ( creates reference_type and reference_id )

						$table->text( 'concept' )->nullable();

						$table->decimal( 'amount', 20, 2 );

						$table->decimal( 'student_balance', 20, 2 );

						$table->decimal( 'total_balance', 20, 2 );

						$table->date( 'creation_date' );

						$table->unsignedInteger( 'created_by' )->nullable();

						$table->foreign( 'created_by' )->references( 'id' )->on( 'users' );

						$table->timestamps();

        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

        Schema::dropIfExists( 'debts' );

    }

}
