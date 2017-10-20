<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInstallmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('installments', function (Blueprint $table) {
            $table->increments('id');
			$table->integer('purchase_detail_id')->unsigned()->index();
			$table->string('payment_term')->default(0);
			$table->decimal('interest_rate',10,2)->default(0);
			$table->decimal('monthly_amortization',10,2)->default(0);
			$table->decimal('principal',10,2)->default(0);
			$table->decimal('interest',10,2)->default(0);
			$table->date('start_date')->nullable();
			$table->date('end_date')->nullable();
			$table->string('status')->default("unpaid");
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
        Schema::dropIfExists('installments');
    }
}
