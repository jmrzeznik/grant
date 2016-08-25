<?php

use Illuminate\Database\Seeder;

class TermsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('terms')->insert([
            'term' => 1,
            'year' => 2016
            'start' => 'May 1',
            'email' => 'October 31'
        ]);

        DB::table('terms')->insert([
            'term' => 2,
            'year' => 2017
            'start' => 'November 1',
            'email' => 'April 30'
        ]);
    }
}
