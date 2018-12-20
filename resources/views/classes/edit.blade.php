@extends('layouts.app')




@section('content')
    <div class="contianer m-5">

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
             aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Info creating class</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <ul>
                            <li>
                                <p>First select a <span class="text-primary">date</span>. Example: <span
                                        class="text-primary">15/12/2018</span></p>
                            </li>
                            <li>
                                <p>Select the <span class="text-primary">moment</span> the class starts, example: <span
                                        class="text-primary">15:00</span></p>
                            </li>
                            <li>
                                <p>Duration of the class: <span class="text-primary">hours</span> and <span
                                        class="text-primary">minutes </span>.
                                    Example: <span class="text-primary">1</span> hour, <span
                                        class="text-primary">15</span> minutes </p>
                            </li>
                            <li>
                                <p><strong>Result:</strong> <span
                                        class="text-primary">15/12/2018 from 15:00h - 16:15h</span></p>
                            </li>
                        </ul>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Understood</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">

            <h2>Edit class:</h2>
            <div class="jumbotron">
                <h4 class="m-0"><span class=""><strong>{{$class->course->name}}</strong></span></h4>
                <p class="m-0"><span class="text-success"> {{$class->start_time}}</span></p>
                <p><span class="text-danger">{{$class->end_time}}</span></p>
            </div>
            <button type="button" class="btn " data-toggle="modal" data-target="#exampleModal">
                <i class="fas fa-info-circle text-primary"></i>
            </button>

            {{ Form::open(array('route' => 'classes.store')) }}

            <div class="form-group">
                {{Form::label('Select course')}}
                {{Form::select('course',$courses,$class->course_id,array('class'=>'form-control'))}}
            </div>
            <div class="form-group">

                <label for="start">Start</label>

                <input type="datetime-local" id="start" class="form-control" value="{{date_format(date_create($class->start_time),"Y-m-d\TH:i")}}">
            </div>

            <div class="form-group">

                <label for="end">Start</label>

                <input type="datetime-local" id="end" class="form-control" value="{{date_format(date_create($class->end_time),"Y-m-d\TH:i")}}">
            </div>

            {{ Form::submit('Save class',array('class' => 'btn btn-success col-md-2 mt-5')) }}


            {{ Form::close() }}
        </div>
    </div>
@endsection
