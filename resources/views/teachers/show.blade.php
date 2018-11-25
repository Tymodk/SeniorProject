@extends('layouts.app')



@section('content')
@include('layouts.adminnav',['active' => "teachers"])
@include('layouts.teachernav')
<div class="container">



<h1>Showing {{ $teacher->name }}</h1>

    <div class="jumbotron text-center">
        <h2>{{ $teacher->name }}</h2>
        
    </div>

</div>
@endsection