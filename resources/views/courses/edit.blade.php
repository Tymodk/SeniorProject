@extends('layouts.app')



@section('content')
@include('layouts.adminnav',['active' => "courses"])
@include('layouts.teachernav')
<div class="container">



<h1>Edit {{ $course->name }}</h1>

<!-- if there are creation errors, they will show here -->


{{ Form::model($course, array('route' => array('courses.update', $course->id), 'method' => 'PUT')) }}

    <div class="form-group">
        {{ Form::label('name', 'Name') }}
        {{ Form::text('name', null, array('class' => 'form-control')) }}
    </div>

    

    {{ Form::submit('Edit the Nerd!', array('class' => 'kdg btn btn-primary')) }}

{{ Form::close() }}

</div>
@endsection