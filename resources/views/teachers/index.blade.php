@extends('layouts.app')



@section('content')
@if (Session::has('message'))
    <div class="alert alert-success"> <h5 class="m-0"> {{ Session::get('message') }} </h5> </div>
@endif



@include('layouts.adminnav',['active' => "teachers"])
@include('layouts.teachernav')
<div class="container">



<h1 class="mt-5">Teachers</h1>



<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <td>ID</td>
            <td>Name</td>
            <td>Email</td>
            <td>Password</td>
            <td>Actions</td>
        </tr>
    </thead>
    <tbody>
    @foreach($teachers as $key => $value)
        <tr>
            <td>{{ $value->id }}</td>
            <td>{{ $value->name }}</td>
            <td>{{ $value->email }}</td>
            <td>{{ $value->password }}</td>

           
            <td>

            
                <a class="btn btn-small btn-info" href="{{ URL::to('teachers/' . $value->id) }}">Show</a>

                
                <a class="btn btn-small btn-warning" href="{{ URL::to('teachers/' . $value->id . '/edit') }}">Edit</a>
<a>
                {{ Form::open(array('url' => 'teachers/' . $value->id, 'class' => 'pull-right')) }}
                    {{ Form::hidden('_method', 'DELETE') }}
                    {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                {{ Form::close() }}
</a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

            {!! Form::open(['route' => 'admin.upload', 'files' => true]) !!}

            {!! Form::file('excel') !!}
       
            {!! Form::submit('Aanmaken', ['class' => 'btn btngreen mb-5 white']) !!}

            {!! Form::close() !!}

</div>
@endsection