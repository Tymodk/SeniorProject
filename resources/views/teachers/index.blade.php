@extends('layouts.app')



@section('content')
@if (Session::has('message'))
    <div class="alert alert-success"> <h5 class="m-0"> {{ Session::get('message') }} </h5> </div>
@endif



@include('layouts.adminnav',['active' => "teachers"])
@include('layouts.teachernav')
<div class="container mb-5">



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
            <td><span class="custom-checkbox">
                                <input type="checkbox" id="checkbox1" name="options[]" value="1">
                                <label for="checkbox1"></label>
                            </span></td>
            <td>{{ $value->id }}</td>
            <td>{{ $value->name }}</td>
            <td>{{ $value->email }}</td>
            <td>{{ $value->password }}</td>

           
            <td>

            
                <a class="btn btn-small btn-info" href="{{ URL::to('admin/teachers/' . $value->id) }}"><i class="far fa-eye"></i></a>

                
                <a class="btn btn-small btn-warning" href="{{ URL::to('admin/teachers/' . $value->id . '/edit') }}"><i class="far fa-edit"></i></a>
<a class="btn btn-small btn-danger p-0">
                {{ Form::open(array('url' => '/admin/teachers/' . $value->id, 'class' => 'pull-right')) }}
                    {{ Form::hidden('_method', 'DELETE') }}

                    {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                {{ Form::close() }}

            </td>
        </tr>
    @endforeach
    </tbody>
</table>

            {!! Form::open(['route' => 'admin.upload', 'files' => true]) !!}

            {!! Form::file('excel') !!}
       
            {!! Form::submit('Excel uploaden', ['class' => 'btn btn-outline-primary']) !!}

            {!! Form::close() !!}

</div>
@endsection