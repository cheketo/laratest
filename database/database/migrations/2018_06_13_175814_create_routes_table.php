<?php

use Illuminate\Support\Facades\Schema;

use Illuminate\Database\Schema\Blueprint;

use Illuminate\Database\Migrations\Migration;

class CreateRoutesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create( 'routes', function ( Blueprint $table )
				{

            $table->increments( 'id' );

						$table->string( 'verb' );

						$table->string( 'route' );

						$table->string( 'controller' )->nullable();

						$table->string( 'method' )->nullable();

						$table->string( 'view' )->nullable();

						$table->string( 'name' )->nullable();

						$table->string( 'permission' )->default( 'private' ); // public, private, role

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

        Schema::dropIfExists( 'routes' );

    }
}
