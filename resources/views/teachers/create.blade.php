@extends('layouts.app')



@section('content')
@include('layouts.adminnav',['active' => "teachers"])
@include('layouts.teachernav')

<div class="container mt-5">



<h1 class="mt-5">Create a Teacher</h1>

<!-- if there are creation errors, they will show here -->


{{ Form::open(array('url' => 'admin/teachers')) }}

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
   

    {{ Form::submit('Submit', array('class' => 'btn btn-success')) }}

{{ Form::close() }}

</div>
@endsection
