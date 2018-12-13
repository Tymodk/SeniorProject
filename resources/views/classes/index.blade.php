@extends('layouts.app')

@section('content')
    <div class="container mt-5">
    <a class="btn btn-success" href="{{route('classes.create')}}">Add class</a>

    @foreach($classes as $class)
    <p>{{$class->name}}</p>

    @endforeach
    </div>
@endsection
