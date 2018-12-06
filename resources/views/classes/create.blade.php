@extends('layouts.app')


@section('content')
    <div class="contianer">

<h2>Add new class</h2>

        {{ Form::open(array('route' => 'classes.store')) }}

        {{Form::label('Select course')}}

        {{Form::select('course',$courses)}}

        <br>

        {{Form::label('Select start date')}}

        {{Form::date('startdate',null,array('class'=>'form-control'))}}

        {{Form::label('Select start hour')}}

        {{Form::time('starthour',null,array('class'=>'form-control'))}}



        {{Form::label('Select end date')}}

        {{Form::date('enddate',null,array('class'=>'form-control'))}}

        {{Form::label('Select end hour')}}

        {{Form::time('endhour',null,array('class'=>'form-control'))}}
        {{ Form::submit('Save class',array('class' => 'btn btn-success mt-5')) }}

        {{ Form::close() }}
    </div>
@endsection
