<?php

namespace App\Http\Controllers;

use Auth;
use App\Student;
use App\Attendance;
use App\BibleStudy;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */

    public function index($year = NULL, $term = NULL, $sort = NULL)
    {
        //set today
        //$today = date('m-d', strtotime('4/6'));
        $today = date('m-d');
        //$prev = true;
        

        //set year
        //$year = date('Y');
        if($year == NULL){
            $year = date('Y') -1;
        }else{
            $year = $year;
        }

        if($sort == NULL){
            $sort = 'lastName';
        }

        //set term dates
        $nextYear = $year + 1;
        $lastYear = $year - 1;
        $place = 0;
        $termOneStart = date('m-d', strtotime('5/1'));
        $termOneEnd = date('m-d', strtotime('10/31'));
        $termTwoStart = date('m-d', strtotime('11/1'));
        $termTwoEnd = date('m-d', strtotime('4/30'));
        $yearEnd = date('m-d', strtotime('12/31'));
        $yearBegin = date('m-d', strtotime('01/1'));
        
        //set term start and end based on values
        if($term == NULL){
            if($today >= $termOneStart && $today <= $termOneEnd){
              $term = 1;
              $termStart = date('Y-m-d', strtotime('5/1/' . $nextYear));
              $termEnd = date('Y-m-d', strtotime('10/31/' . $nextYear));
            }elseif($today >= $termTwoStart && $today <= $yearEnd){
                $term = 2;
                $termStart = date('Y-m-d', strtotime('11/1/'  . $year));
                $termEnd = date('Y-m-d', strtotime('04/30/' . $nextYear));
            }elseif($today >= $yearBegin && $today <= $termTwoEnd){
                $term = 2;
                $termStart = date('Y-m-d', strtotime('11/1/' . $lastYear));
                $termEnd = date('Y-m-d', strtotime('4/30/' . $year));
            }else{
                die('Can not establish term');
            }
        }elseif($term == 1){
            $term = 1;
            $termStart = date('Y-m-d', strtotime('5/1/' . $year));
              $termEnd = date('Y-m-d', strtotime('10/31/' . $year));
        }elseif($term == 2){
            $today = date('Y-m-d', strtotime('11/1'));
            $termStart = date('Y-m-d', strtotime('11/1/'  . $year));
            $termEnd = date('Y-m-d', strtotime('04/30/' . $nextYear));
        }else{
            die('Cannot establish term');
        }

        $user = Auth::user();

        //get all students (admin) or students of family (family)
        if(Auth::user()->type == 'admin'){
            //$students = Student::orderBy('lastName')->get();
            $students = Attendance::select('students.firstName', 'students.lastName', 'students.email', 'attendances.attendanceID', 'attendances.date', 'attendances.communion', 'bible_studies.week', 'bible_studies.type', 'bible_studies.discWeek', 'bible_studies.activity')
                                        ->join('students', 'students.studentID', '=', 'attendances.studentID')
                                        ->join('bible_studies', 'bible_studies.attendanceID', '=', 'attendances.attendanceID')
                                        //->where('attendances.studentID', $student->studentID)
                                        ->whereBetween('attendances.date', [$termStart, $termEnd])
                                        ->orderBy('students.lastName', 'asc')
                                        ->orderBy('students.firstName', 'asc')
                                        //->when($role, function ($query) use ($sort) {
                                        //    return $query->orderBy($sort);
                                                            //->orderBy('students.lastName');
                                        //})
                                        ->get();
            $role = true;
        }elseif(Auth::user()->type == 'family'){
            $students = Student::where('familyID', $user->familyID)->orderBy('created_at', 'asc')->orderBy('firstName', 'asc')->get();
            $role = false;
        }else{
            die('unknown user type');
        }

        //$studentOfFamily = count($students);
            
            $studentEntries = array();
            //loop through and get entries for each student - add to array
            //makes an array of objects - each item in the array is an object
            //of all of a student's entries
            foreach($students as $student){
                $entries = Attendance::join('students', 'students.studentID', '=', 'attendances.studentID')
                                        ->join('bible_studies', 'bible_studies.attendanceID', '=', 'attendances.attendanceID')
                                        ->where('attendances.studentID', $student->studentID)
                                        ->whereBetween('attendances.date', [$termStart, $termEnd])
                                        ->orderBy('attendances.date')
                                        ->when($role, function ($query) use ($sort) {
                                            return $query->orderBy($sort);
                                                            //->orderBy('students.lastName');
                                        })
                                        ->get();
                array_push($studentEntries, $entries);
            }

            $count = 0;
            $ecount = 0;

            $pass = ['studentEntries' => $studentEntries,
                                    'students' => $students,
                                    'user' => $user,
                                    'year' => $year,
                                    'term' => $term,
                                    'count' => $count,
                                    'ecount' => $ecount,
                                    'place' => $place,
                                    'today' => $today,
                                    'termStart' => $termStart,
                                    'termEnd' => $termEnd/*,
                                    'termOneStart' => $termOneStart,
                                    'termOneEnd' => $termOneEnd,
                                    'termTwoStart' => $termTwoStart,
                                    'termTwoEnd' => $termTwoEnd*/];

        if($user->type == 'admin'){
            //return redirect()->action('HomeController@adminView');
            
            return view('admin.view', $pass);

        }else if($user->type == 'family'){
            
            return view('student.view', $pass);
        }else{
            die('cannot connect to database');
        }
    }

    public function newStudent(){
        return view('student.student');
    }

    public function postStudent(){
        $data = Input::all();
        Student::newD($data, Auth::user());
        return redirect('/home');
    }

    public function newEntry(){
        $user = Auth::user();
        $students = Student::where('familyID', $user->familyID)->orderBy('firstName', 'asc')->get();

        return view('student.attendance', ['students' => $students]);
    }

    public function postEntry(){
        $data = Input::all();
        Attendance::newD($data, Auth::user());
        return redirect('/home');
    }

    public function selectTerm(){
        return view('term');
    }

    public function postTerm(){
        $year = Input::get('year');
        $term = Input::get('term');
        $sort = Input::get('sort');

        //return redirect('/home/' . $year . '/' . $term . '/' . $sort);
        return redirect('/home/' . $year . '/' . $term);
        //return redirect()->action('HomeController@index', ['year' => $year, 'term' => $term]);
    }

    public function deleteRecord($attID){
        $bdel = BibleStudy::where('attendanceID', $attID)->first();
        $adel = Attendance::find($attID);
        $bdel->delete();
        $adel->delete();
        return redirect('/home');
    }
}
