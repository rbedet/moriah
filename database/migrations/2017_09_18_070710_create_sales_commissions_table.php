<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSalesCommissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales_commissions', function (Blueprint $table) {
            $table->increments('id');
			$table->double('commission_percentage',4,2)->default(0);
			$table->double('sales',10,2)->default(0);
			$table->double('earned_commission',10,2)->default(0);
			$table->integer('sales_person_id')->unsigned()->index();
			$table->integer('purchase_detail_id')->unsigned()->index();
			//$table->double('paid_commission',10,2)->default(0);
            $table->timestamps();
			$table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sales_commissions');
    }
}
