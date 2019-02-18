<?php

use Illuminate\Support\Facades\Schema;

use Illuminate\Database\Schema\Blueprint;

use Illuminate\Database\Migrations\Migration;

class CreateCustomersTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create( 'customers', function( Blueprint $table )
        {

            $table->increments( 'id' );

            $table->unsignedInteger( 'company_id' )->nullable();

            $table->foreign( 'company_id' )->references( 'id' )->on( 'companies' );

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

        Schema::dropIfExists( 'customers' );

    }

}
