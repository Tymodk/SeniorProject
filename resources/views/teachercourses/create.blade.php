@extends('layouts.app')



@section('content')
@if (Session::has('message'))
    <div class="alert alert-info">{{ Session::get('message') }}</div>
@endif
@include('layouts.adminnav',['active'=> null])
<div class="container mt-5">

<h1>Add a teacher to </h1>

<h2>List of teachers</h2>
list

@endsection