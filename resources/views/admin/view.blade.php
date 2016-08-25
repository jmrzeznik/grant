@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <form class="form-horizontal" method="POST" action="{{ url('/term') }}">
                    <fieldset>

                    <!-- Form Name -->
                    <legend>Select Term</legend>
                    <div class="form-group">
                    <div class="form-inline">
                    <!--<div class="col-sm-1"></div>-->
                    <div class="col-sm-2"></div>

                    {{ csrf_field() }}

                    <!-- Select Basic -->
                    <div class="col-md-3"> <!--style="margin-left:-2%;"-->
                    <div class="form-group">
                      <label class="control-label" for="year">Select Year</label>
                        <select id="year" name="year" class="form-control">
                          <option value="2016">2016</option>
                          <option value="2015">2015</option>
                        </select>
                    </div>
                    </div>

                    <!-- Select Basic -->
                    <div class="col-md-3">
                    <div class="form-group">
                      <label class="control-label" for="term">Select Term</label>
                        <select id="term" name="term" class="form-control">
                          <option value="1">1</option>
                          <option value="2">2</option>
                        </select>
                      </div>
                    </div>

                    <!-- Select Basic 
                    <div class="col-md-3">
                    <div class="form-group">
                      <label class="control-label" for="sort">Sort By</label>
                        <select id="sort" name="sort" class="form-control">
                          <option value="students.lastName">Name</option>
                          <option value="attendances.date">Date</option>
                        </select>
                      </div>
                    </div>-->

                    <!-- Button -->
                    <div class="col-md-1">
                    <div class="form-group">
                      <label class="col-md-4 control-label" for="submit"></label>
                        <button id="submit" name="submit" class="btn btn-primary">Submit</button>
                      </div>
                    </div>

                    <div class="col-md-1">
                    <div class="form-group">
                      <label class="col-md-4 control-label" for="submit"></label>
                        <a href="{{ url('/home') }}" class="btn btn-info" role="button">Current</a>
                      </div>
                    </div>

                </div>
            </div>

                    </fieldset>
                </form>


                <div class="panel panel-default">
                    <div class="panel-heading text-center">
                        <h4>Worship Attendance</h4>
                        <p>Start: {{ date("F j, Y" , strtotime($termStart)) }}</p>
                        <p>End: {{ date("F j, Y" , strtotime($termEnd)) }}</p>
                    </div>

                    <div class="panel-body" id="tbldata">
                        <table id="dataT" class="table table-striped">
                            <tr>
                                <th>#</th>
                                <th>Student Name</th>
                                <th>Email</th>
                                <th>Date</th>
                                <th>Communion</th>
                                <th>Bible Study</th>
                                <th>Discipleship</th>
                                <th></th>
                            </tr>
                            @foreach($students as $entry)
                                <tr>
                                    <td>{{ $count + 1 }}, {{ $entry->attendanceID }}</td>
                                    <td>{{ $entry->firstName }} {{ $entry->lastName }}</td>
                                    <td>{{ $entry->email }}</td>
                                    <td>{{ $entry->date }}</td>
                                    <td>{{ $entry->communion }}</td>
                                    @if($entry->BSAttendance == 'no')
                                    <td>None</td>
                                    @else
                                    <td>{{ $entry->type }} - {{ $entry->week }}</td>
                                    @endif
                                    @if($entry->DAttendance == 'no')
                                    <td>None</td>
                                    @else
                                    <td>{{ $entry->activity }} - {{ $entry->discWeek }}</td>
                                    @endif
                                    <td><a class="delete" style="color:red;" data-toggle="modal" data-target="#del{{ $entry->attendanceID }}" href="#">Delete</a></td>
                                </tr>
                                {{--*/ $count++ /*--}}

                                
                            @endforeach
                        </table>
                    </div>
                    @foreach($students as $entry)
                            <!-- Modal -->
                                <div id="del{{ $entry->attendanceID }}" class="modal fade" role="dialog">
                                    <div class="modal-dialog">

                                    <!-- Modal content-->
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h3>Are you sure you want to delete this?</h3>
                                            <form class="form-horizontal" role="form" method="post" action="{{ route('delete', ['attID' => $entry->attendanceID]) }}">
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <button class="btn btn-default">Yes</button>
                                                <button class="btn btn-default" data-dismiss="modal">No</button>
                                            </form>
                                        </div>
                                    </div>

                                    </div>
                                </div>

                        
                    @endforeach
                </div>
                <button type="button" class="btn btn-success" id="btndata" onclick="tableToExcel('dataT', 'Student Data')">Export to Excel</button>
            </div>
        </div>
    </div>
@endsection
