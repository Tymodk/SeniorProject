@extends('layouts.app')

@section('content')

    <div class="container mt-5">


        <h1>{{ $class->course->name}} </h1>

            <p>{{$class->start_time}}</p>

        <div class="jumbotron ">
            @foreach($teachers as $teacher)
                <div class="container">
                    <h3>Teachers</h3>
                    <p>
                        <a href="{!! route('teachers.show',['id'=>$teacher->id]) !!}"
                           class="">{{ $teacher->name }}</a>
                    </p>
                    @endforeach
                </div>
                <div class="container">
                    <h3>Total students</h3>
                    <p>{{$students}}</p>
                </div>
        </div>

    </div>

@endsection
