<?php

use Illuminate\Support\Facades\Schema;

use Illuminate\Database\Schema\Blueprint;

use Illuminate\Database\Migrations\Migration;

class CreateCareersTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create( 'careers', function( Blueprint $table )
				{

            $table->increments('id');

						$table->integer( 'group_id' )->unsigned()->nullable();

						$table->foreign( 'group_id' )->references( 'id' )->on( 'career_groups' );

						$table->string( 'code' );

						$table->string( 'name' );

						$table->string( 'short_name' );

						$table->char( 'status', 1 )->default( 'A' );

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
        Schema::dropIfExists('careers');
    }
}
