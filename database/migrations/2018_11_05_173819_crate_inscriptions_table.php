<?php

use Illuminate\Support\Facades\Schema;

use Illuminate\Database\Schema\Blueprint;

use Illuminate\Database\Migrations\Migration;

class CrateInscriptionsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

				Schema::create( 'inscriptions', function( Blueprint $table )
				{

						$table->increments( 'id' );

						$table->unsignedInteger( 'student_id' );

						$table->foreign( 'student_id' )->references( 'id' )->on( 'students' );

						// $table->unsignedInteger( 'group_id' )->nullable();
						//
						// $table->foreign( 'group_id' )->references( 'id' )->on( 'career_groups' );

						$table->unsignedInteger( 'career_id' )->nullable();

						$table->foreign( 'career_id' )->references( 'id' )->on( 'careers' );

						$table->unsignedInteger( 'category_id' )->nullable();

						$table->foreign( 'category_id' )->references( 'id' )->on( 'student_categories' );

						$table->string( 'enrollment_code' )->nullable();

						$table->char( 'status', 1 )->default( 'P' );

						$table->timestamps();

						$table->index( 'student_id' );

						$table->index( 'enrollment_code' );

				});

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

        Schema::dropIfExists( 'inscriptions' );

    }

}
