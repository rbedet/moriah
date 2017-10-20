<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class Lot_typesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

		DB::table('lot_types')->insert(array(
			
			array (
				'name' => 'Regular',
				'description' => 'Curabitur congue ex nec eros malesuada, sed blandit dui egestas.',
				'lot_group_id' => '1',
				'price' => '25200',
				'pcf_percent' => '20',
				'vat_percent' => '12',		
			),			
			array (
				'name' => 'Premium(Pink)',
				'description' => 'Duis lectus sem, lobortis id placerat sed, porttitor quis urna.',
				'lot_group_id' => '1',
				'price' => '27300',
				'pcf_percent' => '20',
				'vat_percent' => '12',	
			),			
			array (
				'name' => 'Silver(Blue)',
				'description' => 'Maecenas id iaculis tellus. ',
				'lot_group_id' => '1',
				'price' => '29400',
				'pcf_percent' => '20',
				'vat_percent' => '12',
				
			),			
			array (
				'name' => 'Gold(Orange)',
				'description' => 'Quisque ornare est ut erat tempus varius.',
				'lot_group_id' => '1',
				'price' => '31500',
				'pcf_percent' => '20',
				'vat_percent' => '12',
				
			),		
			array (
				'name' => 'Platinum(Green)',
				'description' => 'Duis ac sagittis enim. Sed nisi felis, euismod id eleifend eget',
				'lot_group_id' => '1',
				'price' => '33600',
				'pcf_percent' => '20',
				'vat_percent' => '12',
				
			),			
			array (
				'name' => 'Diamond(Yellow)',
				'description' => 'Fusce eleifend velit quis suscipit hendrerit. Integer ultricies,',
				'lot_group_id' => '1',
				'price' => '35700',
				'pcf_percent' => '20',
				'vat_percent' => '12',
				
			),			
			array (
				'name' => 'Garden with bench',
				'description' => 'Suspendisse ac lectus viverra purus interdum aliquam. Phasellus at facilisis dui, vel pretium nunc.',
				'lot_group_id' => '2',
				'price' => '189400',
				'pcf_percent' => '20',
				'vat_percent' => '12',
				
			),			
			array (
				'name' => 'Regular',
				'description' => 'Maecenas vel tempor elit, nec dictum dui. Proin convallis convallis tortor.',
				'lot_group_id' => '3',
				'price' => '358680',
				'pcf_percent' => '20',
				'vat_percent' => '12',
				
			),			
        ));			
    }
}
