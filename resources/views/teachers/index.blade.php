@extends('layouts.app')
@section('content')


    @include('layouts.adminnav',['active' => "teachers"])
    @include('layouts.teachernav')
    <div class="container mb-5">
      <div class='mt-5'>
        <h1 class="float-left">
            Teachers
        </h1>
        <div class="dropdown ml-2 float-left">
            <button aria-expanded="false" aria-haspopup="true" class="btn btn-secondary dropdown-toggle"
                    data-toggle="dropdown" id="dropdownMenuButton" type="button">
                Filter
            </button>
            <div aria-labelledby="dropdownMenuButton" class="dropdown-menu">
                <a class="dropdown-item" href="{{ Request::url() . '?filter=name' }}">
                    Naam
                </a>
                <a class="dropdown-item" href="{{ Request::url() . '?filter=email' }}">
                    Email
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
                    Courses
                </td>
                <td>
                    Actions
                </td>
            </tr>
            </thead>
            <tbody>
            @foreach($teachers as $key => $value)
                <tr>
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
                        <a href="{{ route('tc.teacher',['id'=>$value->id])}}" class="btn btn-success ">
                            show / add
                        </a>
                    </td>
                    <td>
                        {{ Form::open(array('url' => '/admin/teachers/' . $value->id, 'class' => 'btn float-left')) }}
                        {{ Form::hidden('_method', 'DELETE') }}
                        <a class="btn btn-small btn-info" href="{{ URL::to('admin/teachers/' . $value->id) }}">
                            <i class="far fa-eye">
                            </i>
                        </a>
                        <a class="btn btn-small btn-warning"
                           href="{{ URL::to('admin/teachers/' . $value->id . '/edit') }}">
                            <i class="far fa-edit">
                            </i>
                        </a>
                        {{ Form::submit('Delete', array('class' => 'btn btn-small w-50 btn-danger')) }}
                        {{ Form::close() }}

                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
