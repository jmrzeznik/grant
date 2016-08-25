@extends('layouts.app')

@section('content')

<h1 class="text-center">Worship Attendance</h1>
<p class="text-center" style="color:#F00;">*Shows attendance for current term only</p>
@foreach($students as $student)
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading text-center"><h4>{{ $student->firstName }} {{ $student->lastName }}</h4></div>

                    <div class="panel-body">
                        <table class="table table-striped">
                            <tr>
                                <th>#</th>
                                <th>Date</th>
                                <th>Communion</th>
                                <th>Bible Study</th>
                                <th>Discipleship</th>
                            </tr>
                            @if(count($studentEntries[$count]) >= 1)
                                @foreach($studentEntries[$count] as $entry)
                                <tr>
                                    <td>{{ $ecount + 1 }}</td>
                                    
                                    <td>{{ $entry->date }}</td>
                                    <td>{{ $entry->communion }}</td>
                                    @if($entry->BSAttendance == 'no')
                                    <td>None</td>
                                    @else
                                    <td>{{ $entry->type }} <br> {{ $entry->week }}</td>
                                    @endif

                                    @if($entry->DAttendance == 'no')
                                    <td>None</td>
                                    @else
                                    <td>{{ $entry->activity }} <br> {{ $entry->discWeek }}</td>
                                    @endif
                                </tr>
                                {{--*/ $ecount++ /*--}}
                                {{--*/ $place++ /*--}}

                                @endforeach
                            @else
                            <td>No Records</td>
                            @endif
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{--*/ $count++ /*--}}
    {{--*/ $ecount = 0 /*--}}

@endforeach
@endsection
