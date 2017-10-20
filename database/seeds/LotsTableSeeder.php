<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class LotsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

				
		DB::table('lots')->insert(array(
			array (
				'block' => 'L1',
				'lot' => '1',
				'description' => 'Duis auctor pharetra ',
				'lot_type_id' => '1',
				'lot_group_id' => '1',
				'status' => 'Available',
			),			
			array (
				'block' => 'L1',
				'lot' => '2',
				'description' => 'Neque porro quisquam est qui dolorem ipsum quia dolor',
				'lot_type_id' => '2',
				'lot_group_id' => '1',
				'status' => 'Available',
			),			
			array (
				'block' => 'L1',
				'lot' => '3',
				'description' => 'Lorem Ipsum leva a uma distribuição mais ',
				'lot_type_id' => '3',
				'lot_group_id' => '1',
				'status' => 'Available',
			),			
			array (
				'block' => 'L2',
				'lot' => '1',
				'description' => 'Porque é que o usamos',
				'lot_type_id' => '4',
				'lot_group_id' => '1',
				'status' => 'Available',
			),			
			array (
				'block' => 'L3',
				'lot' => '1',
				'description' => 'Existem muitas variações das passagens do ',
				'lot_type_id' => '5',
				'lot_group_id' => '1',
				'status' => 'Available',
			),			
			array (
				'block' => 'L3',
				'lot' => '2',
				'description' => 'Usa um dicionário de 200 palavras em Latim, combinado com uma',
				'lot_type_id' => '6',
				'lot_group_id' => '1',
				'status' => 'Available',
			),			
			array (
				'block' => 'GE1',
				'lot' => '1',
				'description' => 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium',
				'lot_type_id' => '7',
				'lot_group_id' => '2',
				'status' => 'Available',
			),				
			array (
				'block' => 'GE1',
				'lot' => '2',
				'description' => '',
				'lot_type_id' => '7',
				'lot_group_id' => '2',
				'status' => 'Available',
			),			
			array (
				'block' => 'FE1',
				'lot' => '1',
				'description' => 'iste natus error sit voluptatem accusantium ',
				'lot_type_id' => '8',
				'lot_group_id' => '3',
				'status' => 'Available',
			),			
			array (
				'block' => 'FE2',
				'lot' => '1',
				'description' => '',
				'lot_type_id' => '8',
				'lot_group_id' => '3',
				'status' => 'Available',
			),	
        ));					
    }
}
