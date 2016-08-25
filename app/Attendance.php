<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    protected $primaryKey = 'attendanceID';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'studentID', 'date', 'communion', 'BSAttendance', 'DAttendance'
    ];

    public static function newD(Array $data, User $user){
        $n = new Self;

        $n->studentID = $data['studentID'];
        $n->date = date('Y-m-d', strtotime($data['date']));
        $n->communion = $data['communion'];
        $n->BSAttendance = $data['biblestudy'];
        $n->DAttendance = $data['discipleship'];

        $n->save();

        BibleStudy::newD($data, $user);
    }
}
