@extends('layouts.app')

@section('content')
    <div class="contianer">

<h2>Add new class</h2>

        {{ Form::open(array('route' => 'classes.store')) }}




        {{ Form::submit('Submit!', array('class' => 'btn btn-success')) }}

        {{ Form::close() }}
    </div>
@endsection
