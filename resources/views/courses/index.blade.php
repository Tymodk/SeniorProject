@extends('layouts.app')



@section('content')
@if (Session::has('message'))
    <div class="alert alert-success"><h5>{{ Session::get('message') }}</h5></div>
@endif

@include('layouts.adminnav',['active' => "courses"])
@include('layouts.coursenav')
<div class="container">


<h1 class="mt-5">All the Nerds</h1>

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