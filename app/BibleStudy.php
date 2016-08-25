<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BibleStudy extends Model
{
    protected $primaryKey = 'bibleStudyID';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
         'attendanceID', 'date', 'type', 'activity', 'comments', 'discWeek'
    ];

    public static function newD(Array $data, User $user){
        $n = new Self;

        $attendances = count(Attendance::get());

        $n->attendanceID = $attendances;

        if($data['biblestudy'] == 'yes'){
        	$n->week = date('Y-m-d', strtotime($data['week']));
        	$n->type = $data['type'];
        }elseif($data['biblestudy'] == 'no'){
        	$n->week = date('Y-m-d', strtotime($data['date']));
        	$n->type = '';
        }else{
        	die('Check Bible Study Value');
        }
        if($data['discipleship'] == 'yes'){
            $n->discWeek = date('Y-m-d', strtotime($data['discWeek']));
            $n->activity = $data['activity'];
        }elseif($data['discipleship'] == 'no'){
            $n->discWeek = date('Y-m-d', strtotime($data['date']));
            $n->activity = '';
        }else{
            die('Check Bible Study Value');
        }

        $n->save();
    }
}
