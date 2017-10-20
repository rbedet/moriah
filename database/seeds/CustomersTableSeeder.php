<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class CustomersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		
		DB::table('customers')->insert(array(
			array (
				'first_name' => 'Adelle',
				'middle_name' => 'D',
				'last_name' => 'Nagle',
			),			
			array (
				'first_name' => 'David',
				'middle_name' => 'L',
				'last_name' => 'Murray',
			),			
			array (
				'first_name' => 'Donna',
				'middle_name' => 'D',
				'last_name' => 'Dawes',
			),
			
        ));		
		     
    }
}
