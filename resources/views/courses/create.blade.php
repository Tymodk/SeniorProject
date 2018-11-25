@extends('layouts.app')



@section('content')
@include('layouts.adminnav',['active' => "courses"])
@include('layouts.teachernav')
<div class="container">


<h1>Create a Course</h1>

<!-- if there are creation errors, they will show here -->


{{ Form::open(array('url' => 'courses')) }}

    <div class="form-group">
        {{ Form::label('name', 'Name') }}
        {{ Form::text('name', null , array('class' => 'form-control')) }}
    </div>

   

    {{ Form::submit('Create the Course!', array('class' => 'btn btn-primary')) }}

{{ Form::close() }}

</div>
@endsection