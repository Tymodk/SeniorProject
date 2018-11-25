@extends('layouts.app')



@section('content')
@include('layouts.adminnav',['active' => "teachers"])
@include('layouts.teachernav')

<div class="container">



<h1>Create a teacher</h1>

<!-- if there are creation errors, they will show here -->


{{ Form::open(array('url' => 'teachers')) }}

    <div class="form-group">
        {{ Form::label('name', 'Name') }}
        {{ Form::text('name', null , array('class' => 'form-control')) }}
    </div>
   <div class="form-group">
        {{ Form::label('email', 'Email') }}
        {{ Form::email('email', null , array('class' => 'form-control')) }}
    </div>
       <div class="form-group">
        {{ Form::label('password', 'Password') }}
        {{ Form::password('password', null , array('class' => 'form-control')) }}
    </div>
   

    {{ Form::submit('Create the teacher!', array('class' => 'btn btn-primary')) }}

{{ Form::close() }}

</div>
@endsection