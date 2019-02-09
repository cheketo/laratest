<?php

use Illuminate\Support\Facades\Schema;

use Illuminate\Database\Schema\Blueprint;

use Illuminate\Database\Migrations\Migration;

class CreateCareerGroupsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create( 'career_groups', function( Blueprint $table )
				{

            $table->increments( 'id' );

						$table->string( 'name' );

						$table->string( 'description' )->nullable();

						$table->char( 'status', 1 )->default( 'A' );

            $table->softDeletes();

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

        Schema::dropIfExists( 'career_groups' );

    }

}
