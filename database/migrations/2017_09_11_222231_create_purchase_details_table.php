<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePurchaseDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchase_details', function (Blueprint $table) {
            $table->increments('id');
			//$table->string('sales_number')->unique();
			$table->date('transaction_date')->default(date("Y/m/d"))->nullable();			
			//$table->integer('purchase_id')->unsigned();
            $table->integer('lot_id')->unsigned()->index();
			$table->integer('customer_id')->unsigned()->index()->nullable();
            $table->decimal('lot_price',10,2)->default(0);
            $table->decimal('pcf_amount',10,2)->default(0);
            $table->decimal('vat_amount',10,2)->default(0);
            $table->decimal('fee_amount',10,2)->default(0);
            $table->decimal('total_lot_price',10,2)->default(0);
			$table->integer('sales_person_id')->unsigned()->nullable();
			$table->decimal('downpayment',10,2)->default(0);
			$table->decimal('balance',10,2)->default(0);
			$table->date('downpayment_date')->nullable();
            $table->string('status')->nullable();
			$table->integer('installment_id')->unsigned()->nullable();
            $table->timestamps();
			$table->softDeletes();
			
			//$table->foreign('purchase_id')->references('id')->on('purchases');
			$table->foreign('customer_id')->references('id')->on('customers');
			$table->foreign('lot_id')->references('id')->on('lots');
			$table->foreign('sales_person_id')->references('id')->on('sales_people');
			
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('purchase_details');
    }
}
