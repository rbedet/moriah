<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DeceasedsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		
		DB::table('deceaseds')->insert(array(
			array (
				'first_name' => 'Jack D',
				'middle_name' => 'D',
				'last_name' => 'Shoulders',
				'birthdate' => '1939-04-04',
				'deathdate' => '2017-09-01',
				'lot_id' => '1',
			),			
			array (
				'first_name' => 'Anastasia',
				'middle_name' => 'Garza',
				'last_name' => 'Oliver',
				'birthdate' => '1940-06-12',
				'deathdate' => '2016-11-02',
				'lot_id' => '2',
			),			
			array (
				'first_name' => 'Edwin',
				'middle_name' => 'Pichardo',
				'last_name' => 'Irizarry',
				'birthdate' => '1989-11-10',
				'deathdate' => '2000-04-20',
				'lot_id' => '3',
			),
			
        ));	
    }
}
