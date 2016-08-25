<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
        	'type' => 'admin',
            'lastName' => 'Last',
            'firstName' => 'First',
            'email' => 'email@test.com',
            'password' => bcrypt('password'),
        ]);
    }
}
