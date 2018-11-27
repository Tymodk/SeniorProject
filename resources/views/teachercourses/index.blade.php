@extends('layouts.app')



@section('content')
@include('layouts.adminnav',['active' => "courses"])
@include('layouts.teachernav')
<div class="container">


<h1>Courses overview</h1>

<!-- will be used to show any messages -->
@if (Session::has('message'))
    <div class="alert alert-info">{{ Session::get('message') }}</div>
@endif



@foreach($data2 as $key => $value )

<p>{{ $key }} wordt gegeven door: {{ $value }}</p>


@endforeach
<p>lengte: {{ count($data) }}</p>

</div>
@endsection