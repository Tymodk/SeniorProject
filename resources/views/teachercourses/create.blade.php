@extends('layouts.app')



@section('content')
@if (Session::has('message'))
    <div class="alert alert-info">{{ Session::get('message') }}</div>
@endif
@include('layouts.adminnav',['active'=> null])
<div class="container mt-5">

<h1>Add a course(s) to {{$teacher->name}} </h1>

    {{ Form::open(array('route' => 'tc.store')) }}
    {{Form::hidden('id',$teacher->id)}}
    <div class="form-group">

        {{ Form::select('courses', $courses,null, array('class' => 'form-control','multiple'=>'multiple','name'=>'courses[]','id'=>'courses')) }}
    </div>



{{ Form::submit('Submit', array('class' => 'kdg btn btn-success')) }}

{{ Form::close() }}
</div>
@endsection
