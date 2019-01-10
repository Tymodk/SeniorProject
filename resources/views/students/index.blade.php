@extends('layouts.app')



@section('content')
@if (Session::has('message'))
    <div class="alert alert-info">{{ Session::get('message') }}</div>
@endif
@include('layouts.adminnav',['active' => "students"])
@include('layouts.studentnav')
<div class="container">
  <div class='mt-5'>
    <h1 class="float-left">Students</h1>
    <div class="dropdown ml-2 float-left">
      <button aria-expanded="false" aria-haspopup="true" class="btn btn-secondary dropdown-toggle"
              data-toggle="dropdown" id="dropdownMenuButton" type="button">
          Filter
      </button>
      <div aria-labelledby="dropdownMenuButton" class="dropdown-menu">
          <a class="dropdown-item" href="{{ Request::url() . '?filter=name' }}">
              Naam
          </a>
          <a class="dropdown-item" href="{{ Request::url() . '?filter=created-first' }}">
              Datum aflopend
          </a>
          <a class="dropdown-item" href="{{ Request::url() . '?filter=created-last' }}">
              Datum oplopend
          </a>
      </div>
    </div>
  </div>

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

            <td><a href="{{ 'studentcourses/'.$value->id }}" class="btn btn-success kdg ">show / add </a></td>

            <td>

                <a class="btn btn-small btn-info" href="{{ URL::to('admin/students/' . $value->id) }}">Show</a>


                <a class="btn btn-small btn-warning" href="{{ URL::to('admin/students/' . $value->id . '/edit') }}">Edit</a>

                {{ Form::open(array('url' => 'students/' . $value->id, 'class' => 'float-right')) }}
                    {{ Form::hidden('_method', 'DELETE') }}
                    {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                {{ Form::close() }}

            </td>

        </tr>

    @endforeach
    </tbody>
</table>


</div>
@endsection
