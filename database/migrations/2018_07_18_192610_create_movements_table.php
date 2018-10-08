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
        Schema::create('movements', function (Blueprint $table) {
            $table->increments('id');
						$table->unsignedInteger('payment_id')->nullable();
						$table->unsignedInteger('parent_id')->nullable();
						$table->char('type',1);
						$table->decimal('amount',10,2);
						$table->text('concept')->nullable();
						$table->date('due_date')->nullable();
						$table->unsignedInteger('created_by');
						$table->unsignedInteger('updated_by');
            $table->timestamps();

        });

				Schema::table('movements', function (Blueprint $table) {
				    $table->foreign('payment_id')->references('id')->on('payments');
						$table->foreign('parent_id')->references('id')->on('movements');
				});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('movements');
    }
}
