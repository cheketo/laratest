<?php

use Illuminate\Support\Facades\Schema;

use Illuminate\Database\Schema\Blueprint;

use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create( 'users', function ( Blueprint $table )
				{

            $table->increments( 'id' );

						$table->integer( 'image_id' )->unsigned()->nullable();

            $table->string( 'first_name' )->nullable();

						$table->string( 'last_name' )->nullable();

            $table->string( 'user' )->unique();

            $table->string( 'email' )->unique();

            $table->string( 'password' );

            $table->char( 'status', 1 )->default( 'A' );

						$table->string( 'skin' )->default( 'skin-blue' );

            $table->softDeletes();

            $table->rememberToken();

            $table->timestamps();

						$table->foreign( 'image_id' )->references( 'id' )->on( 'files' );

        });

				// Schema::table('users', function (Blueprint $table)
				// {
				//
				// 		$table->foreign('image_id')->references('id')->on('files');
				//
				// });



    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

        Schema::dropIfExists( 'users' );

    }

}
