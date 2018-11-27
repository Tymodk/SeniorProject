@extends('layouts.app')



@section('content')
@include('layouts.adminnav',['active'=> null])

<div class="container mt-5">


<h1>Courses overview</h1>
<p>List of courses and teachers</p>

<!-- will be used to show any messages -->
@if (Session::has('message'))
    <div class="alert alert-info">{{ Session::get('message') }}</div>
@endif




<table class="table table-striped table-bordered">
	<thead>
	<tr class="text-center">
		
		<td>Course</td>
		<td>Teachers</td>
		<td>Actions</td>

	</tr>
	</thead>
	<tbody>
		@foreach($data2 as $key => $value )
		<tr>
			
			<td>{{ $key }}</td>
			<td>{{ $value }}</td>
			<td>add</td>
			
		</tr>
		@endforeach
	</tbody>

</table>







</div>
@endsection