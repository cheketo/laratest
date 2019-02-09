<?php

use Illuminate\Support\Facades\Schema;

use Illuminate\Database\Schema\Blueprint;

use Illuminate\Database\Migrations\Migration;

class CreatePriceHistoryTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create( 'price_history', function( Blueprint $table )
				{

						$table->increments( 'id' );

						$table->integer( 'group_id' )->unsigned();

						$table->foreign( 'group_id' )->references( 'id' )->on( 'career_groups' );

						$table->integer( 'category_id' )->unsigned();

						$table->foreign( 'category_id' )->references( 'id' )->on( 'student_categories' );

						$table->integer( 'user_id' )->unsigned();

						$table->foreign( 'user_id' )->references( 'id' )->on( 'users' );

						$table->integer( 'enrollment_amount' )->unsigned();

						$table->decimal( 'enrollment_price', 10, 2 )->unsigned();

						$table->integer( 'fee_amount' )->unsigned();

						$table->decimal( 'fee_price', 10, 2 )->unsigned();

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

        Schema::dropIfExists( 'price_history' );

    }
}
