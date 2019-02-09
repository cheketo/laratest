<?php

use Illuminate\Support\Facades\Schema;

use Illuminate\Database\Schema\Blueprint;

use Illuminate\Database\Migrations\Migration;

class CreateMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create( 'menus', function ( Blueprint $table )
				{

            $table->increments( 'id' );

						$table->unsignedInteger( 'parent_id' )->nullable();

						$table->unsignedInteger( 'route_id' )->nullable();

						$table->string( 'title_menu' );

						$table->string( 'title_page' )->nullable();

						$table->string( 'title_tab' )->nullable();

						$table->string( 'icon' );

						$table->unsignedInteger( 'position' )->nullable();

						$table->char('status', 1)->default('A');

            $table->timestamps();

        });

				Schema::table( 'menus', function ( Blueprint $table )
				{

						$table->foreign( 'route_id' )->references( 'id' )->on( 'routes' )->onDelete( 'cascade' );

						$table->foreign( 'parent_id' )->references( 'id' )->on( 'menus' )->onDelete( 'cascade' );

				});

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

        Schema::dropIfExists( 'menus' );

    }
}
