@extends('layouts.app')
@section('content')


    @include('layouts.adminnav',['active' => "teachers"])
    @include('layouts.teachernav')
    <div class="container mb-5">
        <h1 class="mt-5">
            Teachers
        </h1>
        @if(isset($excel))
            <?= var_dump($excel)?>
        @endif
        <div class="dropdown mt-5 mb-3 ">
            <button aria-expanded="false" aria-haspopup="true" class="btn btn-secondary dropdown-toggle"
                    data-toggle="dropdown" id="dropdownMenuButton" type="button">
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
                        <a href="{{ route('tc.teacher',['id'=>$value->id])}}">
                            view
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
                        {{ Form::submit('Delete', array('class' => 'btn btn-small btn-danger')) }}
                        {{ Form::close() }}

                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
