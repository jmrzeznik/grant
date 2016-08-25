@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <form class="form-horizontal" method="POST" action="{{ url('/entry') }}">
                    <fieldset>

                    <!-- Form Name -->
                    <legend>New Worship Attendance</legend>
                    {{ csrf_field() }}
                    <!-- Select Basic -->
                    <div class="form-group">
                      <label class="col-md-4 control-label" for="student">Select Student</label>
                      <div class="col-md-4">
                        <select id="studentID" name="studentID" class="form-control">
                          @foreach($students as $student)
                          <option value="{{ $student->studentID }}">{{ $student->firstName }}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                    
                    <div class="form-group">
                      <label class="col-md-4 control-label" for="date"></label>  
                      <div class="col-md-4">
                      <input id="date" name="date" type="text" placeholder="Enter Date" class="form-control input-md" required>
                        
                      </div>
                    </div>

                    <!-- Multiple Radios -->
                    <div class="form-group">
                      <label class="col-md-4 control-label" for="communion">Did you take Communion?</label>
                      <div class="col-md-4">
                      <div class="radio">
                        <label for="communion-0">
                          <input type="radio" name="communion" id="communion-0" value="yes" checked="checked">
                          Yes
                        </label>
                      </div>
                      <div class="radio">
                        <label for="communion-1">
                          <input type="radio" name="communion" id="communion-1" value="no">
                          No
                        </label>
                      </div>
                      </div>
                    </div>

                    <!-- Multiple Radios -->
                    <div class="form-group">
                      <label class="col-md-4 control-label" for="communion">Did you Attend Bible Study?</label>
                      <div class="col-md-4">
                      <div class="radio">
                        <label for="biblestudy-0">
                          <input type="radio" name="biblestudy" id="biblestudy-0" value="yes">
                          Yes
                        </label>
                      </div>
                      <div class="radio">
                        <label for="biblestudy-1">
                          <input type="radio" name="biblestudy" id="biblestudy-1" value="no" checked="checked">
                          No
                        </label>
                      </div>
                      </div>
                    </div>

                    <!-- Multiple Radios -->
                    <div class="form-group">
                      <label class="col-md-4 control-label" for="communion">Did you Attend a Discipleship Activity?</label>
                      <div class="col-md-4">
                      <div class="radio">
                        <label for="discipleship-0">
                          <input type="radio" name="discipleship" id="discipleship-0" value="yes">
                          Yes
                        </label>
                      </div>
                      <div class="radio">
                        <label for="discipleship-1">
                          <input type="radio" name="discipleship" id="discipleship-1" value="no" checked="checked">
                          No
                        </label>
                      </div>
                      </div>
                    </div>
                    <div id="bsatt">

                    <h3 class="text-center">Bible Study</h3>

                    <!-- Text input-->
                    <div class="form-group">
                      <label class="col-md-4 control-label" for="week"></label>  
                      <div class="col-md-4">
                      <input id="week" name="week" type="text" placeholder="Enter Date" class="form-control input-md">
                        
                      </div>
                    </div>

                    <!-- Select Basic -->
                    <div class="form-group">
                      <label class="col-md-4 control-label" for="type">Select Type</label>
                      <div class="col-md-4">
                        <select id="type" name="type" class="form-control">
                          <option value="Youth Bible Study">Youth Bible Study</option>
                          <option value="Discipleship Hour">Discipleship Hour</option>
                          <option value="Promises of Grace">Promises of Grace</option>
                          <option value="Weekly Bible Study">Weekly Bible Study</option>
                        </select>
                      </div>
                    </div>

                    </div>
                    <div id="datt">

                    <h3 class="text-center">Discipleship</h3>

                     <!-- Text input-->
                    <div class="form-group">
                      <label class="col-md-4 control-label" for="discWeek"></label>  
                      <div class="col-md-4">
                      <input id="discWeek" name="discWeek" type="text" placeholder="Enter Date" class="form-control input-md">
                        
                      </div>
                    </div>

                    <!-- Text input-->
                    <div class="form-group">
                      <label class="col-md-4 control-label" for="activity"></label>  
                      <div class="col-md-4">
                      <input id="activity" name="activity" type="text" placeholder="Activity" class="form-control input-md">
                        
                      </div>
                    </div>

                    </div>

                    <!-- Button -->
                    <div class="form-group">
                      <label class="col-md-4 control-label" for="submit"></label>
                      <div class="col-md-4">
                        <button id="submit" name="submit" class="btn btn-primary">Submit</button>
                      </div>
                    </div>

                    </fieldset>
                </form>

            </div>
        </div>
    </div>
@endsection
