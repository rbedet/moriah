<?php

use Illuminate\Database\Seeder;

class PaymentsSeederTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		$payment = rand(999, 9999);
		$amount = $payment * 0.7575757576;
        $pcf = $payment * 0.1515151515;
        $vat = $payment* 0.0909090909;
		$time = rand( 0, time() );
		
        DB::table('payments')->insert([
            'customer_id' => 1,
            'purchase_detail_id' => 1,
            'payment_date' => date("Y-m-d", $time),
          
            'amount' =>  $amount,
            'pcf' => $pcf,
            'vat' => $vat,
            'total_amount' => $payment,
        ]);
    }
}
