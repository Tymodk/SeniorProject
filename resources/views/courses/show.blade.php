@extends('layouts.app')



@section('content')
@include('layouts.adminnav',['active' => "courses"])
@include('layouts.teachernav')
<div class="container">



<h1>Showing {{ $course->name }}</h1>

    <div class="jumbotron text-center">
        <h2>{{ $course->name }}</h2>
        
    </div>

</div>
@endsection