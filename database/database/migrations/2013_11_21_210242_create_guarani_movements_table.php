<?php

use Illuminate\Support\Facades\Schema;

use Illuminate\Database\Schema\Blueprint;

use Illuminate\Database\Migrations\Migration;

class CreateGuaraniMovementsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

				if( !Schema::hasTable( 'guarani_movements' ) )
				{

						Schema::create( 'guarani_movements', function( Blueprint $table )
						{

								$table->increments( 'id' );

								$table->unsignedInteger( 'registro' )->nullable();

								$table->string( 'unidad_academica' )->nullable();

								$table->string( 'carrera' )->nullable();

								$table->unsignedInteger( 'legajo' )->nullable();

								$table->string( 'prefijo' )->nullable();

								$table->string( 'legajo_completo' )->nullable();

								$table->unsignedInteger( 'talon' )->nullable();

								$table->char( 'movimiento', 1 )->nullable();

								$table->unsignedInteger( 'cuota' )->nullable();

								$table->unsignedInteger( 'estalon' )->nullable();

								$table->unsignedInteger( 'escobro' )->nullable();

								$table->unsignedInteger( 'cobro' )->nullable();

								$table->unsignedInteger( 'comprobante' )->nullable();

								$table->string( 'referencia' )->nullable();

								$table->date( 'vencimiento' )->nullable();

								$table->dateTime( 'fecha' )->nullable();

								$table->decimal( 'importe', 10, 2 )->nullable();

								$table->integer( 'signo' );

								$table->boolean( 'error' )->nullable();

								$table->timestamps();

								$table->index( 'registro' );

								$table->index( 'prefijo' );

								$table->index( 'legajo' );

						});

				}

				Illuminate\Support\Facades\DB::setDefaultConnection( 'posgrado_aux' );


				if( !Schema::connection( 'posgrado_aux' )->hasTable( 'guarani_movements' ) )
				{

		        Schema::connection( 'posgrado_aux' )->create( 'guarani_movements', function( Blueprint $table )
						{

		            $table->increments( 'id' );

								$table->unsignedInteger( 'registro' )->nullable();

								$table->string( 'unidad_academica' )->nullable();

								$table->string( 'carrera' )->nullable();

								$table->unsignedInteger( 'legajo' )->nullable();

								$table->string( 'prefijo' )->nullable();

								$table->string( 'legajo_completo' )->nullable();

								$table->unsignedInteger( 'talon' )->nullable();

								$table->char( 'movimiento', 1 )->nullable();

								$table->unsignedInteger( 'cuota' )->nullable();

								$table->unsignedInteger( 'estalon' )->nullable();

								$table->unsignedInteger( 'escobro' )->nullable();

								$table->unsignedInteger( 'cobro' )->nullable();

								$table->unsignedInteger( 'comprobante' )->nullable();

								$table->string( 'referencia' )->nullable();

								$table->date( 'vencimiento' )->nullable();

								$table->date( 'fecha' )->nullable();

								$table->decimal( 'importe', 10, 2 )->nullable();

								$table->integer( 'signo' );

		            $table->timestamps();

								$table->index( 'registro' );

								$table->index( 'prefijo' );

								$table->index( 'legajo' );

		        });

				}

				Illuminate\Support\Facades\DB::setDefaultConnection( 'mysql' );

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

				Illuminate\Support\Facades\DB::setDefaultConnection( 'posgrado_aux' );

        Schema::dropIfExists( 'guarani_movements' );

				Schema::connection( 'posgrado_aux' )->dropIfExists( 'guarani_movements' );

				Illuminate\Support\Facades\DB::setDefaultConnection( 'mysql' );

    }

}
