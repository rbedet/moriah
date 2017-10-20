<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        //$this->call(CustomersTableSeeder::class);
        //$this->call(Sales_peopleTableSeeder::class);
        //$this->call(DeceasedsTableSeeder::class);
        $this->call(Lot_groupsTableSeeder::class);
        $this->call(Lot_typesTableSeeder::class);
        //$this->call(LotsTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(PermissionsTableSeeder::class);
    }
}
