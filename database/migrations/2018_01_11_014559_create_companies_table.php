<?php

use Illuminate\Support\Facades\Schema;

use Illuminate\Database\Schema\Blueprint;

use Illuminate\Database\Migrations\Migration;

class CreateCompaniesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create( 'companies', function( Blueprint $table )
        {

            $table->increments( 'id' );

            $table->unsignedInteger( 'profile_id' )->nullable();

            $table->foreign( 'profile_id' )->references( 'id' )->on( 'company_profiles' );

            $table->string( 'name' )->nullable();

            $table->decimal( 'balance', 20, 2 );

            $table->char( 'status', 1 )->default( 'A' );

            $table->unsignedInteger( 'last_movement_id' )->nullable();

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

        Schema::dropIfExists( 'companies' );

    }

}
