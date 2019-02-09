<?php

use Illuminate\Support\Facades\Schema;

use Illuminate\Database\Schema\Blueprint;

use Illuminate\Database\Migrations\Migration;

class CreateStudentCategoriesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create( 'student_categories', function( Blueprint $table )
				{

            $table->increments( 'id' );

						$table->string( 'name' );

            $table->string( 'description' )->nullable();

						$table->unsignedInteger( 'foreign_id' );

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

        Schema::dropIfExists( 'student_categories' );

    }
}
