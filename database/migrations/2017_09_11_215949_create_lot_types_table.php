<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLotTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lot_types', function (Blueprint $table) {
            $table->increments('id');
			$table->unique(['name', 'lot_group_id']);
            $table->string('name');
			$table->integer('lot_group_id')->unsigned()->index();
            $table->string('description')->nullable();
			$table->decimal('price',10,2)->default(0);
			$table->decimal('pcf_percent',4,2)->default(0);
			$table->decimal('vat_percent',4,2)->default(0);
            $table->timestamps();
            $table->softDeletes();
			
			$table->foreign('lot_group_id')->references('id')->on('lot_groups');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lot_types');
    }
}
