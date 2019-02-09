<?php

use Illuminate\Support\Facades\Schema;

use Illuminate\Database\Schema\Blueprint;

use Illuminate\Database\Migrations\Migration;

class CreateFeesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create( 'fees', function( Blueprint $table )
				{

            $table->increments( 'id' );

						$table->unsignedInteger( 'student_id' );

						$table->foreign( 'student_id' )->references( 'id' )->on( 'students' );

						$table->unsignedInteger( 'inscription_id' );

						$table->foreign( 'inscription_id' )->references( 'id' )->on( 'inscriptions' );

						$table->unsignedInteger( 'movement_id' )->nullable();

						$table->foreign( 'movement_id' )->references( 'id' )->on( 'movements' );

						$table->unsignedInteger( 'number' );

						$table->decimal( 'amount', 20, 2 );

						$table->decimal( 'student_balance', 20, 2 );

						$table->decimal( 'total_balance', 20, 2 );

						$table->date( 'due_date' );

						$table->unsignedInteger( 'guarani_id' )->nullable();

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

        Schema::dropIfExists( 'fees' );

    }
}
