@extends('layouts.app')

@section('content')

<h1>Komende lessen</h1>



    @foreach($classes as $class)
    <p>{{$class->start_time}}</p>
    @endforeach
    {{dd($classes)}}

@endsection
