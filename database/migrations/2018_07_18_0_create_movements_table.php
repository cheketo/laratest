<?php

use Illuminate\Support\Facades\Schema;

use Illuminate\Database\Schema\Blueprint;

use Illuminate\Database\Migrations\Migration;

class CreateMovementsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create( 'movements', function( Blueprint $table )
				{

            $table->increments( 'id' );

						$table->morphs( 'reference' ); // Polymorphic relation width Payments and Inscriptions ( creates reference_type and reference_id )

						$table->unsignedInteger( 'student_id' )->nullable();

						// $table->unsignedInteger( 'parent_id' )->nullable();

						// $table->unsignedInteger( 'guarani_id' )->nullable();

						// $table->foreign( 'guarani_id' )->references( 'id' )->on( 'guarani_movements' );

						// $table->unsignedInteger( 'type_id' );

						// $table->foreign( 'type_id' )->references( 'id' )->on( 'movement_types' );

						$table->decimal( 'amount', 20, 2 );

						$table->decimal( 'student_balance', 20, 2 );

						// $table->decimal( 'student_credit_balance', 10, 2 )->unsigned();
						//
						// $table->decimal( 'student_debit_balance', 10, 2 )->unsigned();

						$table->decimal( 'total_balance', 20, 2 );

						// $table->decimal( 'total_credit_balance', 10, 2 )->unsigned();
						//
						// $table->decimal( 'total_debit_balance', 10, 2 )->unsigned();

						// $table->text( 'concept' )->nullable();

						// $table->date( 'due_date' )->nullable();

						// $table->date( 'creation_date' )->nullable();

						$table->unsignedInteger( 'created_by' )->nullable();

						$table->foreign( 'created_by' )->references( 'id' )->on( 'users' );

						// $table->unsignedInteger( 'updated_by' )->nullable();
						//
						// $table->foreign( 'updated_by' )->references( 'id' )->on( 'users' );

            $table->timestamps();

						// $table->index( 'guarani_id' );

        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

        Schema::dropIfExists( 'movements' );

    }

}
