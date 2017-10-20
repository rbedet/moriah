<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePurchasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchases', function (Blueprint $table) {
            $table->increments('id');
			$table->string('sales_number')->unique();
			$table->date('transaction_date');
			$table->integer('customer_id')->unsigned()->index();
			$table->decimal('total_amount',10,2);
			$table->decimal('downpayment',10,2);
			$table->decimal('balance',10,2);
			$table->date('downpayment_date');
            $table->string('status');
			$table->integer('installment_id')->unsigned();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('customer_id')->references('id')->on('customers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('purchases');
    }
}
