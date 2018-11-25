@extends('layouts.app')



@section('content')
@include('layouts.adminnav',['active' => "teachers"])
@include('layouts.teachernav')
<div class="container">



<h1 class="mt-5">Edit {{ $teacher->name }}</h1>

<!-- if there are creation errors, they will show here -->


{{ Form::model($teacher, array('route' => array('teachers.update', $teacher->id), 'method' => 'PUT')) }}

    <div class="form-group">
        {{ Form::label('name', 'Name') }}
        {{ Form::text('name', null, array('class' => 'form-control')) }}
    </div>
   <div class="form-group">
        {{ Form::label('email', 'Email') }}
        {{ Form::email('email', null , array('class' => 'form-control')) }}
    </div>
       <div class="form-group">
        {{ Form::label('password', 'Password') }}
        {{ Form::password('password', null , array('class' => 'form-control')) }}
    </div>
   

    {{ Form::submit('Save', array('class' => 'btn btn-primary')) }}

{{ Form::close() }}

</div>
@endsection