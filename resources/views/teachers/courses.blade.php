@extends('layouts.app')

@section('content')

<div class="container">

	<h3 class="mt-5 mb-3">Teacher: <span class="text-success">{{ $teacher->name }}</span></h3>

    <a class="btn btn-success" href="{{route('tc.create',['id'=>$teacher->id])}}">Add course</a>
<table class="table table-striped table-bordered">
	<thead>
		<tr>
			<td>id</td>
			<td>course</td>
			<td>actions</td>
		</tr>
	</thead>
	<tbody>
			@foreach($courses as $value)
		<tr>
			<td>{{ $value->id }}</td>
			<td>{{ $value->name }}</td>
			<td><a class="btn btn-danger" href="{{ '/admin/teachercourses/' . $teacher->id . '/' . $value->id}}" onclick="return confirm('Are you sure to delete this item?')">delete</a></td>
		</tr>
		@endforeach 
	</tbody>
</table>



	
</div>

@endsection
