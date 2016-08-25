<?php

use Illuminate\Database\Seeder;

class StudentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('students')->insert([
            'familyID' => 3,
            'lastName' => 'Jones',
            'firstName' => 'Tommy',
            'email' => 'tommy@test.com'
        ]);

        DB::table('students')->insert([
            'familyID' => 3,
            'lastName' => 'Jones',
            'firstName' => 'Jerry',
            'email' => 'jerry@test.com'
        ]);
    }
}
