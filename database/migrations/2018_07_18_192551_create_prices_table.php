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
        Schema::create('prices', function (Blueprint $table) {
            $table->increments('id');
						$table->integer('category_id');
						$table->string('career');
						$table->decimal('enrollment_price',10,2);
						$table->decimal('career_price',10,2);
						$table->integer('max_fees')->nullable();
						$table->char('status',1)->default('A');
						$table->text('description')->nullable();
						$table->integer('created_by')->nullable();
						$table->integer('updated_by')->nullable();
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
        Schema::dropIfExists('prices');
    }
}
