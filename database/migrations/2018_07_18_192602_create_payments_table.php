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
        Schema::create('payments', function (Blueprint $table) {
            $table->increments('id');
						$table->unsignedInteger('type_id');
						$table->unsignedInteger('ref_id')->nullable();
						$table->string('student')->nullable();
						$table->decimal('amount',10,2);
						$table->unsignedInteger('fees')->nullable();
						$table->char('status',1)->default('P');
						$table->text('concept')->nullable();
						$table->unsignedInteger('created_by')->nullable();
						$table->unsignedInteger('updated_by')->nullable();
            $table->timestamps();
        });

				Schema::table('payments', function (Blueprint $table) {
				    $table->foreign('type_id')->references('id')->on('payment_types');
				});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payments');
    }
}
