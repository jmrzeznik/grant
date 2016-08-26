<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBibleStudiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bible_studies', function (Blueprint $table) {
            $table->increments('bibleStudyID');
            $table->integer('attendanceID'); //bible study is an attendance
            $table->date('week');
            $table->string('type'); //selection of 4 options
            $table->date('discWeek');
            $table->string('activity');
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
        Schema::drop('bible_studies');
    }
}
