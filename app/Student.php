<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $primaryKey = 'studentID';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
         'familyID', 'firstName', 'email',
    ];

    public static function newD(Array $data, User $user){
        $n = new Self;

        $n->familyID = $user->familyID;
        $n->lastName = $user->lastName;
        $n->firstName = $data['firstName'];
        $n->email = $data['email'];

        $n->save();
    }
}
