@extends('layouts.app')



@section('content')
@include('layouts.adminnav',['active' => "students"])
@include('layouts.teachernav')
<div class="container">



<h1>Showing {{ $student->name }}</h1>

    <div class="jumbotron text-center">
        <h2>{{ $student->name }}</h2>
        
    </div>

</div>
@endsection