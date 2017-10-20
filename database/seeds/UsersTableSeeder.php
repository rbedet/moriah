<?php

use Illuminate\Database\Seeder;
use Moriah\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'name' => 'Administrator',
                'username' => 'admin',
                'password' => bcrypt('admin')
            ],
            [
                'name' => 'Manager',
                'username' => 'manager',
                'password' => bcrypt('manager')
            ],
			[
                'name' => 'Staff 1',
                'username' => 'staff1',
                'password' => bcrypt('staff1')
            ]
        ];

        foreach ($users as $key => $value) {
            User::create($value);
        }		
    }
}
