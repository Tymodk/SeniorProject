@extends('layouts.app')

@section('content')
    
    <h2>List of teachers from {{$course->name}}</h2>
<table class="table table-striped table-bordered">
    <thead>
    <tr>
        <td>Id</td>
        <td>Name</td>
        <td>Actions</td>
    </tr>
    </thead>
    <tbody>
    @foreach($teachers as $teacher)




    <tr>
        <td>
            {{$teacher->name}}
        </td>
        <td>
            <p>{{$teacher->id}}</p>
        </td>
        <td>
            <a class="btn btn-info" href="/admin/teachers/{{$teacher->id}}">view teacher</a>
        </td>
    </tr>
    @endforeach
    </tbody>
</table>

@endsection
