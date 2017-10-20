<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class Lot_groupsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
				
		DB::table('lot_groups')->insert(array (
			array(
				'name' => 'Lawn Lots',
				'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam blandit sodales ipsum et ultricies.',
			),			
			array (
				'name' => 'Garden Estate',
				'description' => 'Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Aliquam non risus purus.',
			),			
			array (
				'name' => 'Family Estate',
				'description' => 'Sed id diam at urna dapibus varius. Proin quis odio turpis.',
			),	
        ));	
		

		
    }
}
