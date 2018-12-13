@extends('layouts.app')

@section('content')
    <div class="container">

        <h1>Komende lessen</h1>

        @if(isset($active))
            @foreach($active  as $act)

                <p> {{$act->Course->name}} is active</p>

                <a href="/class">bekijken</a>
            @endforeach
        @endif


        @foreach($classes as $class)

            <div class="card p-1 mt-5" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title mb-5"><b>{{$class->Course->name}}</b></h5>
                    <p>Begins in {{$class->difference()}} </p>
                    <p class="card-text"><span class="text-success"> <b>START</b></span> at <span
                            class="text-primary"> {{$class->start_time}}</span></p>
                    <p class="card-text"><span class="text-danger"> <b>END</b></span> at <span
                            class="text-primary"> {{$class->end_time}}</span></p>
                    <div class="row">
                        {{ Form::open(array('route' => 'user.start-course')) }}
                        {{Form::hidden('classid',$class->id)}}



                        {{ Form::submit('Start this class', array('class' => 'btn btn-success mt-0 ml-2 mr-2')) }}

                        {{ Form::close() }}


                        <a href="#" class="card-link btn btn-warning mt-0 ml-0 ">Edit this class</a>
                    </div>
                </div>
            </div>

        @endforeach


    </div>








@endsection

