<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInstallmentPaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('installment_payments', function (Blueprint $table) {
            $table->increments('id');
			$table->integer('installment_id')->unsigned()->index();
			$table->integer('payment_id')->unsigned()->index();
            $table->timestamps();
			$table->softDeletes();
			
            $table->foreign('installment_id')->references('id')->on('installments');
            $table->foreign('payment_id')->references('id')->on('payments');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('installment_payments');
    }
}
