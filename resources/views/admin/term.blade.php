@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <form class="form-horizontal">
                    <fieldset>

                    <!-- Form Name -->
                    <legend>Select Term</legend>

                    <!-- Select Basic -->
                    <div class="form-group">
                      <label class="col-md-4 control-label" for="year">Select Year</label>
                      <div class="col-md-4">
                        <select id="year" name="year" class="form-control">
                          <option value="2016">2016</option>
                        </select>
                      </div>
                    </div>

                    <!-- Select Basic -->
                    <div class="form-group">
                      <label class="col-md-4 control-label" for="term">Select Term</label>
                      <div class="col-md-4">
                        <select id="term" name="term" class="form-control">
                          <option value="1">1</option>
                          <option value="2">2</option>
                        </select>
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
