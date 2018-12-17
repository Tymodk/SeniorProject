@extends('layouts.app')

@section('content')
    <div class="container mt-5">

        <a class="btn btn-success" href="{{route('classes.create')}}">Add class</a>

        <table class="table table-bordered mt-5">
            <thead>
            <tr>
                <td>Start</td>
                <td>End</td>
                <td>Course</td>
                <td>Actions</td>
            </tr>
            </thead>
            <tbody>
            @foreach($classes as $class)
                <tr>
                    <td>
                        {{$class->start_time}}
                    </td>
                    <td>
                        {{$class->end_time}}
                    </td>
                    <td>
                        {{$class->course->name}}
                    </td>
                  <td>
                      <a href="{!! route('classes.edit',['id'=>$class->id]) !!}" class="btn btn-warning">Edit class</a>
                      <a href="{!! route('classes.delete',['id'=>$class->id]) !!}" class="btn btn-danger" onclick = "alert('are you sure to delete this class?')">Delete class</a>
                  </td>
                </tr>
            @endforeach
            </tbody>

        </table>


    </div>
@endsection
