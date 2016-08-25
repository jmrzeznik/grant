@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <form class="form-horizontal" method="POST" action="{{ url('/student') }}">
                    <fieldset>

                        <!-- Form Name -->
                        <legend>New Student</legend>
                        {{ csrf_field() }}
                        <!-- Text input-->
                        <div class="form-group">
                          <label class="col-md-4 control-label" for="firstName"></label>  
                          <div class="col-md-4">
                          <input id="firstName" name="firstName" type="text" placeholder="Enter First Name Only" class="form-control input-md" required="">
                            
                          </div>
                        </div>

                        <!-- Text input-->
                        <div class="form-group">
                          <label class="col-md-4 control-label" for="email"></label>  
                          <div class="col-md-4">
                          <input id="email" name="email" type="text" placeholder="Enter Email" class="form-control input-md" required="">
                            
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
