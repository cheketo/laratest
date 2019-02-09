<?php

use Illuminate\Support\Facades\Schema;

use Illuminate\Database\Schema\Blueprint;

use Illuminate\Database\Migrations\Migration;

class CreatePricesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create( 'prices', function( Blueprint $table )
				{

						$table->integer( 'group_id' )->unsigned()->index();

						$table->foreign( 'group_id' )->references( 'id' )->on( 'career_groups' )->onDelete( 'cascade' );

						$table->integer( 'category_id' )->unsigned()->index();

						$table->foreign( 'category_id' )->references( 'id' )->on( 'student_categories' )->onDelete( 'cascade' );

						$table->integer( 'enrollment_amount' )->unsigned()->default( '0' );

						$table->decimal( 'enrollment_price', 10, 2 )->unsigned()->default( '0' );

						$table->integer( 'fee_amount' )->unsigned()->default( '0' );

						$table->decimal( 'fee_price', 10, 2 )->unsigned()->default( '0' );

						$table->timestamps();

						$table->primary( [ 'group_id', 'category_id' ] );

        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

        Schema::dropIfExists( 'prices' );

    }
}
