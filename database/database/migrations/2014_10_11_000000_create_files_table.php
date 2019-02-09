<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('files', function (Blueprint $table)
				{

            $table->increments('id');
						$table->string('route')->nullable();
						$table->string('name')->nullable();
						$table->string('original_name')->nullable();
						$table->string('type')->nullable();
						$table->string('size')->nullable();
            $table->timestamps();

						// $table->morphs('fileable');

        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

        Schema::dropIfExists('files');

    }

}
