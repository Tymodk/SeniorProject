@extends('layouts.app')



@section('content')
@if (Session::has('message'))
    <div class="alert alert-success"><h5>{{ Session::get('message') }}</h5></div>
@endif

@include('layouts.adminnav',['active' => "courses"])
@include('layouts.coursenav')
<div class="container">
  <div class='mt-5'>
    <h1 class="float-left">Courses</h1>
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

            <td>Actions</td>
        </tr>
    </thead>
    <tbody>
    @foreach($courses as $key => $value)
        <tr>
            <td>{{ $value->id }}</td>
            <td>{{ $value->name }}</td>

            <td>



                <a class="btn btn-small btn-info" href="{{ URL::to('admin/courses/' . $value->id) }}">Show</a>

                <a class="btn btn-small btn-warning" href="{{ URL::to('admin/courses/' . $value->id . '/edit') }}">Edit</a>

                {{ Form::open(array('url' => 'admin/courses/' . $value->id, 'class' => 'float-right')) }}
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
