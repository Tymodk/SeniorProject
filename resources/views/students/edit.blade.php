@extends('layouts.app')



@section('content')
@include('layouts.adminnav',['active' => "students"])
@include('layouts.teachernav')
<div class="container">


<h1>Edit {{ $student->name }}</h1>

<!-- if there are creation errors, they will show here -->


{{ Form::model($student, array('route' => array('students.update', $student->id), 'method' => 'PUT')) }}

    <div class="form-group">
        {{ Form::label('name', 'Name') }}
        {{ Form::text('name', null, array('class' => 'form-control')) }}
    </div>

    

    {{ Form::submit('Edit the Nerd!', array('class' => 'btn btn-primary')) }}

{{ Form::close() }}

</div>
@endsection