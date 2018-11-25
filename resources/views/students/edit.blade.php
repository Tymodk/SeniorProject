@extends('layouts.app')



@section('content')
@include('layouts.adminnav',['active' => "students"])
@include('layouts.studentnav')
<div class="container">


<h1 class="mt-5">Edit {{ $student->name }}</h1>




{{ Form::model($student, array('route' => array('students.update', $student->id), 'method' => 'PUT')) }}

    <div class="form-group">
        {{ Form::label('name', 'Name') }}
        {{ Form::text('name', null, array('class' => 'form-control')) }}
    </div>

    

    {{ Form::submit('Save', array('class' => 'btn btn-success')) }}

{{ Form::close() }}

</div>
@endsection