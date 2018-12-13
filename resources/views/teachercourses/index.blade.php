@extends('layouts.app')



@section('content')
@if (Session::has('message'))
    <div class="alert alert-info">{{ Session::get('message') }}</div>
@endif
@include('layouts.adminnav',['active'=> null])

<div class="container mt-5">


<h1>Courses overview</h1>
<p>List of courses and teachers</p>

<table class="table table-striped table-bordered">
	<thead>
	<tr class="text-center">
		
		<td>Course</td>
		<td>Teachers</td>
		<td>Actions</td>

	</tr>
	</thead>
	<tbody>
		@foreach($data as $key => $value )
		<tr>
			
			<td>{{ $value->name }}</td>
			<td><a href="{{route('tc.single',['id'=>$value->id])}}">View teachers</a></td>
			<td><a href="{{ route('tc.add',['id'=>$value->id]) }}" class="btn btn-success">add</a></td>
			
		</tr>
		@endforeach
	</tbody>

</table>







</div>
@endsection
