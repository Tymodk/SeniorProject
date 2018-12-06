@extends('layouts.app')

@section('content')

<h1>Komende lessen</h1>

    <p>
        les 1
    </p>

    @foreach($classes as $class)
    <p>{{$class->start_time}}</p>
    @endforeach
    {{dd($classes)}}

@endsection
