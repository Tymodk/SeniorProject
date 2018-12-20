@extends('layouts.app')



@section('content')
    @include('layouts.adminnav',['active' => "teachers"])
    @include('layouts.teachernav')
    <div class="container">


        <h1 class="mt-5">Showing {{ $teacher->name }}</h1>

        <div class="jumbotron text-center">
            <h2>{{ $teacher->name }}</h2>
            <h2>{{ $teacher->email }}</h2>

            <h2 class="mt-5">Courses</h2>
            @if(isset($courses))
                @foreach($courses as $course)
                    <p>{{$course->name}}</p>
                @endforeach
            @else
                Does not have courses
            @endif

        </div>


    </div>
@endsection
