<?php

use Illuminate\Database\Seeder;

class BibleStudiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('bible_studies')->insert([
            'attendanceID' => 1,
            'date' => date("Y-m-d"),
            'type' => '',
            'activity' => '',
            'comments' => ''
        ]);
    }
}
