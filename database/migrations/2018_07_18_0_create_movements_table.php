<?php

use Illuminate\Support\Facades\Schema;

use Illuminate\Database\Schema\Blueprint;

use Illuminate\Database\Migrations\Migration;

class CreateMovementsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create( 'movements', function( Blueprint $table )
				{

            $table->increments( 'id' );

						$table->morphs( 'reference' ); // Polymorphic relation ( creates reference_type and reference_id )

						$table->unsignedInteger( 'company_id' )->nullable();

            $table->foreign( 'company_id' )->references( 'id' )->on( 'companies' );

						$table->decimal( 'amount', 20, 2 );

						$table->decimal( 'company_balance', 20, 2 );

						$table->decimal( 'total_balance', 20, 2 );

						$table->unsignedInteger( 'created_by' )->nullable();

						$table->foreign( 'created_by' )->references( 'id' )->on( 'users' );

            $table->timestamps();

        });

        Schema::table( 'companies', function( Blueprint $table )
				{

						$table->foreign( 'last_movement_id' )->references( 'id' )->on( 'movements' );

				});

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

        Schema::dropIfExists( 'movements' );

    }

}
