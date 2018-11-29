@extends('layouts.app')



@section('content')
@if (Session::has('message'))
    <div class="alert alert-info">{{ Session::get('message') }}</div>
@endif
@include('layouts.adminnav',['active' => "students"])
@include('layouts.studentnav')
<div class="container">



<h1 class="mt-5">Students</h1>


<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <td>ID</td>
            <td>Name</td>
            
            <td>Courses</td>
            <td>Actions</td>
        </tr>
    </thead>
    <tbody>
    @foreach($students as $key => $value)
        <tr>
            <td>{{ $value->id }}</td>
            <td>{{ $value->name }}</td>
            
            <td><a href="{{ 'studentcourses/'.$value->id }}" class="btn btn-success ">show / add </a></td>

            <td>

                <a class="btn btn-small btn-success" href="{{ URL::to('students/' . $value->id) }}">Show</a>

                <!-- edit this nerd (uses the edit method found at GET /nerds/{id}/edit -->
                <a class="btn btn-small btn-info" href="{{ URL::to('students/' . $value->id . '/edit') }}">Edit</a>

                {{ Form::open(array('url' => 'students/' . $value->id, 'class' => 'display:inline-block')) }}
                    {{ Form::hidden('_method', 'DELETE') }}
                    {{ Form::submit('Delete', array('class' => 'btn btn-warning')) }}
                {{ Form::close() }}

            </td>
         
        </tr>

    @endforeach
    </tbody>
</table>

           
</div>
@endsection