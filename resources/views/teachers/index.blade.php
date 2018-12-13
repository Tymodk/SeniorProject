@extends('layouts.app')
@section('content')
@if (Session::has('message'))
<div class="alert alert-success">
    <h5 class="m-0">
        {{ Session::get('message') }}
    </h5>
</div>
@endif
@include('layouts.adminnav',['active' => "teachers"])
@include('layouts.teachernav')
<div class="container mb-5">
    <h1 class="mt-5">
        Teachers
    </h1>
    <div class="dropdown mt-5 mb-3 ">
        <button aria-expanded="false" aria-haspopup="true" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" id="dropdownMenuButton" type="button">
            Filter
        </button>
        <div aria-labelledby="dropdownMenuButton" class="dropdown-menu">
            <a class="dropdown-item" href="{{ Request::fullUrl() . '?filter=name' }}">
                Naam
            </a>
            <a class="dropdown-item" href="{{ Request::fullUrl() . '?filter=email' }}">
                Email
            </a>
            <a class="dropdown-item" href="{{ Request::fullUrl() . '?filter=created-first' }}">
                Datum aflopend
            </a>
            <a class="dropdown-item" href="{{ Request::fullUrl() . '?filter=created-last' }}">
                Datum oplopend
            </a>
        </div>
    </div>
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <td>
                    ID
                </td>
                <td>
                    Name
                </td>
                <td>
                    Email
                </td>
                <td>
                    Password
                </td>
                <td>
                    Courses
                </td>
            </tr>
        </thead>
        <tbody>
            @foreach($teachers as $key => $value)
            <tr>
                <td>
                    <span class="custom-checkbox">
                        <input id="checkbox1" name="options[]" type="checkbox" value="1">
                            <label for="checkbox1">
                            </label>
                        </input>
                    </span>
                </td>
                <td>
                    {{ $value->id }}
                </td>
                <td>
                    {{ $value->name }}
                </td>
                <td>
                    {{ $value->email }}
                </td>
                <td>
                    <a href="{{ route('tc.teacher',['id'=>$value->id])}}">
                        view
                    </a>
                </td>
                <td>
                    <a class="btn btn-small btn-info" href="{{ URL::to('admin/teachers/' . $value->id) }}">
                        <i class="far fa-eye">
                        </i>
                    </a>
                    <a class="btn btn-small btn-warning" href="{{ URL::to('admin/teachers/' . $value->id . '/edit') }}">
                        <i class="far fa-edit">
                        </i>
                    </a>
                    
                        {{ Form::open(array('url' => '/admin/teachers/' . $value->id, 'class' => 'float-right')) }}
                    {{ Form::hidden('_method', 'DELETE') }}

                    {{ Form::submit('Delete', array('class' => 'btn btn-danger float-right')) }}
                {{ Form::close() }}
                   
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $teachers->links() }}

            {!! Form::open(['route' => 'admin.upload', 'files' => true]) !!}

            {!! Form::file('excel') !!}
       
            {!! Form::submit('Excel uploaden', ['class' => 'btn btn-outline-primary']) !!}

            {!! Form::close() !!}
</div>
@endsection
