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
			$table->integer('customer_id')->unsigned()->index();
			$table->integer('purchase_detail_id')->unsigned()->nullable();
			$table->date('payment_date')->nullable();
			$table->string('AR_no')->unique()->nullable();
			$table->string('OR_no')->unique()->nullable();
			$table->string('OR_status')->default("to issue");
			$table->decimal('amount',10,2)->default(0);
			$table->decimal('fee_amount',10,2)->default(0);
			$table->decimal('pcf',10,2)->default(0);
			$table->decimal('vat',10,2)->default(0);
			$table->decimal('total_amount',10,2)->default(0);
			$table->string('details')->nullable();
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
        Schema::dropIfExists('payments');
    }
}
