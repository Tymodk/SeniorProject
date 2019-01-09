@extends('layouts.app')



@section('content')
@include('layouts.adminnav',['active' => "students"])
@include('layouts.teachernav')
<div class="container">



<h1 class="mt-5">Create a Student</h1>




{{ Form::open(array('url' => 'admin/students')) }}

    <div class="form-group">
        {{ Form::label('name', 'Name') }}
        {{ Form::text('name', null , array('class' => 'form-control')) }}
    </div>
    <div class="form-group">
        {{ Form::label('card id', 'card id') }}
        {{ Form::text('card_id', null , array('class' => 'form-control')) }}
    </div>
   

    {{ Form::submit('Submit!', array('class' => 'kdg btn btn-success')) }}

{{ Form::close() }}

</div>
@endsection
