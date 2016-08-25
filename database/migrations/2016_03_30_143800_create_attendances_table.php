<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAttendancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attendances', function (Blueprint $table) {
            $table->increments('attendanceID');
            $table->integer('studentID'); //student has many attendance
            $table->date('date'); //date of attendance
            $table->string('communion'); //Yes or No
            $table->string('BSAttendance'); //Yes or No
            $table->string('DAttendance');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('attendances');
    }
}
