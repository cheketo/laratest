<?php

use Illuminate\Support\Facades\Schema;

use Illuminate\Database\Schema\Blueprint;

use Illuminate\Database\Migrations\Migration;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create( 'payments', function( Blueprint $table )
				{

            $table->increments( 'id' );

						$table->unsignedInteger( 'method_id' );

						$table->foreign( 'method_id' )->references( 'id' )->on( 'payment_methods' );

						$table->unsignedInteger( 'movement_id' )->nullable();

						$table->foreign( 'movement_id' )->references( 'id' )->on( 'movements' );

						$table->unsignedInteger( 'company_id' );

						$table->foreign( 'company_id' )->references( 'id' )->on( 'companies' );

						$table->decimal( 'amount', 20, 2 )->unsigned();

						$table->decimal( 'company_balance', 20, 2 )->unsigned();

						$table->decimal( 'total_balance', 20, 2 )->unsigned();

						$table->char( 'status', 1 )->default( 'P' );

						$table->text( 'concept' )->nullable();

						$table->date( 'creation_date' );

						$table->unsignedInteger( 'created_by' )->nullable();

						$table->foreign( 'created_by' )->references( 'id' )->on( 'users' );

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

        Schema::dropIfExists( 'payments' );

    }
}
