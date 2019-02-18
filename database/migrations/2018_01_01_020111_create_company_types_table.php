<?php

use Illuminate\Support\Facades\Schema;

use Illuminate\Database\Schema\Blueprint;

use Illuminate\Database\Migrations\Migration;

class CreateCompanyTypesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create( 'company_types', function( Blueprint $table )
        {

            $table->increments( 'id' );

            $table->string( 'name' );

            $table->char( 'status', 1 )->default( 'A' );

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

        Schema::dropIfExists( 'company_types' );

    }

}
