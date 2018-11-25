@extends('layouts.app')



@section('content')
@include('layouts.adminnav',['active' => "students"])
@include('layouts.teachernav')
<div class="container">



<h1>Create a Student</h1>

<!-- if there are creation errors, they will show here -->


{{ Form::open(array('url' => 'students')) }}

    <div class="form-group">
        {{ Form::label('name', 'Name') }}
        {{ Form::text('name', null , array('class' => 'form-control')) }}
    </div>
    <div class="form-group">
        {{ Form::label('card id', 'card id') }}
        {{ Form::text('card_id', null , array('class' => 'form-control')) }}
    </div>
   

    {{ Form::submit('Create the Course!', array('class' => 'btn btn-primary')) }}

{{ Form::close() }}

</div>
@endsection