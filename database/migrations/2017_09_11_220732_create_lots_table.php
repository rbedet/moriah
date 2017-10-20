<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLotsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lots', function (Blueprint $table) {
            $table->increments('id');
			$table->string('block');
			$table->string('lot');
			$table->string('status')->default('Available');
			$table->string('description')->nullable();
			$table->integer('lot_type_id')->unsigned()->index();
			$table->integer('lot_group_id')->unsigned()->index();
            $table->timestamps();
			$table->softDeletes();
			
			$table->foreign('lot_type_id')->references('id')->on('lot_types');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lots');
    }
}
