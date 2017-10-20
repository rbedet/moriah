<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class Sales_peopleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		DB::table('sales_people')->insert(array(
			array (
				'first_name' => 'Rita',
				'middle_name' => 'R',
				'last_name' => 'Davis',
			),			
			array (
				'first_name' => 'William',
				'middle_name' => 'M',
				'last_name' => 'Gunter',
			),			
			array (
				'first_name' => 'Linda',
				'middle_name' => 'R',
				'last_name' => 'Troche',
			),
			
        ));	        
    }
}
