<?php

use Illuminate\Support\Facades\Schema;

use Illuminate\Database\Schema\Blueprint;

use Illuminate\Database\Migrations\Migration;

class CreateMovementRelationsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create( 'movement_relations', function( Blueprint $table )
				{

						$table->increments( 'id' );

						$table->nullableMorphs( 'credit' ); // Polymorphic relation width Payments and Bonifications ( creates credit_type and credit_id )

						$table->nullableMorphs( 'debit' ); // Polymorphic relation width Fees, Enrollments and Debts ( creates debit_type and debit_id )

						$table->unsignedInteger( 'student_id' )->nullable();

						$table->foreign( 'student_id' )->references( 'id' )->on( 'students' );

						$table->decimal( 'amount', 20, 2 )->unsigned();

						$table->unsignedInteger( 'guarani_id' )->nullable();

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

        Schema::dropIfExists( 'movement_relations' );

    }

}
