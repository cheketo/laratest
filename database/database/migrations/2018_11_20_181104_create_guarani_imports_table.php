<?php

use Illuminate\Support\Facades\Schema;

use Illuminate\Database\Schema\Blueprint;

use Illuminate\Database\Migrations\Migration;

class CreateGuaraniImportsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create( 'guarani_imports', function( Blueprint $table )
				{

            $table->increments( 'id' );

						$table->unsignedInteger( 'students' )->default( '0' );

						$table->unsignedInteger( 'inscriptions' )->default( '0' );

						$table->unsignedInteger( 'fees' )->default( '0' );

						$table->unsignedInteger( 'enrollments' )->default( '0' );

						$table->unsignedInteger( 'payments' )->default( '0' );

						$table->unsignedInteger( 'movements' )->default( '0' );

						$table->unsignedInteger( 'user_id' );

						$table->foreign( 'user_id' )->references( 'id' )->on( 'users' );

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

        Schema::dropIfExists( 'guarani_imports' );

    }

}
