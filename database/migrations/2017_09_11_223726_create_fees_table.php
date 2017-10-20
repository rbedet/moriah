<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fees', function (Blueprint $table) {
            $table->increments('id');
			$table->integer('purchase_detail_id')->unsigned();
			$table->string('name');
			$table->string('description')->nullable();
			$table->decimal('amount',10,2)->default(0);
            $table->timestamps();
			$table->softDeletes();
			
			$table->foreign('purchase_detail_id')->references('id')->on('purchase_details');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fees');
    }
}
