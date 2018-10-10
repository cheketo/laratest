<?php

use Illuminate\Support\Facades\Schema;

use Illuminate\Database\Schema\Blueprint;

use Illuminate\Database\Migrations\Migration;

class CreateMiddlewaresTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create( 'middlewares', function ( Blueprint $table )
				{

						$table->increments( 'id' );

						$table->string( 'name' );

						$table->string( 'class' );

						$table->string( 'description' )->nullable();

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

        Schema::dropIfExists( 'middlewares' );

    }

}
