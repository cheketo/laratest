<?php

use Illuminate\Support\Facades\Schema;

use Illuminate\Database\Schema\Blueprint;

use Illuminate\Database\Migrations\Migration;

class CreateStudentsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create( 'students', function( Blueprint $table )
				{

						$table->increments( 'id' );

						$table->string( 'foreign_id' )->unique();

						$table->decimal( 'balance', 10, 2 )->default( '0' );

						$table->unsignedInteger( 'last_movement_id' )->nullable();

						$table->unsignedInteger( 'category_id' )->nullable();

						$table->foreign( 'category_id' )->references( 'id' )->on( 'student_categories' );

						$table->timestamps();

						$table->index( 'foreign_id' );

        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

        Schema::dropIfExists( 'students' );

    }

}
