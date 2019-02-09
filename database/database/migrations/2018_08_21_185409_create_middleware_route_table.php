<?php

use Illuminate\Support\Facades\Schema;

use Illuminate\Database\Schema\Blueprint;

use Illuminate\Database\Migrations\Migration;

class CreateMiddlewareRouteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create( 'middleware_route', function ( Blueprint $table )
				{

						$table->integer( 'route_id' )->unsigned()->index();

						$table->foreign( 'route_id' )->references( 'id' )->on( 'routes' )->onDelete( 'cascade' );

						$table->integer( 'middleware_id' )->unsigned()->index();

						$table->foreign( 'middleware_id' )->references( 'id' )->on( 'middlewares' )->onDelete( 'cascade' );

						$table->integer( 'position' )->unsigned()->default( '0' );
						
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

        Schema::dropIfExists( 'middleware_route' );

    }

}
