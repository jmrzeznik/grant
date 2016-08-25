<?php

use Illuminate\Database\Seeder;

class AttendancesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        DB::table('attendances')->insert([
            'date' => date("Y-m-d"),
            'studentID' => 1,
            'communion' => 'yes',
            'BSAttendance' => 'no'
        ]);

        DB::table('attendances')->insert([
        	'date' => date("Y-m-d"),
        	'studentID' => 2,
            'communion' => 'yes',
            'BSAttendance' => 'yes'
        ]);

        DB::table('attendances')->insert([
            'date' => date("Y-m-d"),
            'studentID' => 1,
            'communion' => 'no',
            'BSAttendance' => 'yes'
        ]);
    }
}
