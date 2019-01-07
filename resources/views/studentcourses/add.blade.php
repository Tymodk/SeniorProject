@extends('layouts.app')

@section('content')

@include('layouts.adminnav',['active' => "students"])
<div class="contianer mt-5 courses">
    <h2>
        Student:
        <span class="text-info">
            <strong>
                {{ $student->name }}
            </strong>
        </span>
    </h2>
    <div class="container mt-5 p-0">
        <h3>
            Following courses:
        </h3>
        @if(isset($followed))
        <table class="table table-striped table-bordered ">
            <tbody>
                @foreach($followed as $fol)
                <tr>
                    <td>
                        <strong>
                            {{ $fol->name }}
                        </strong>
                        <a class="btn btn-danger float-right" href="{{ '/admin/studentcourses/'. $student->id .'/'. $fol->id }}">
                            delete course
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @else
        <span>student has no courses yet</span>
        @endif
    </div>
    <div class="container mt-5 p-0">
        <h3 class="pt-3">
            Add courses to student
        </h3>
        @if(isset($courses))

        {{ Form::open(array('url' => 'admin/studentcourses/store')) }}
        {{ Form::hidden('userid',  $student->id) }}
        @foreach($courses as $course)
        <div class="checkbox">
            <label class="col-md-3" style="border: solid 1px black">
                <i class="fas fa-check text-success" style="font-size: 100px">
                </i>
                {{ Form::checkbox($course->name,$course->id ) }}
                <div class="mt-5 text-center notselect">
                    <h3>
                        {{ $course->name }}
                    </h3>
                </div>
            </label>
        </div>
        @endforeach
        {{ Form::submit('Submit!', array('class' => 'btn btn-success w-25 d-inline-block')) }}
        {{ Form::close() }}
        @endif
    </div>
</div>
<script>
    $(document).ready(function () {

$('input:checkbox').change(function(){

    if($(this).is(":checked")) {

        $(this).parent().addClass("checked");

    } else {
        $(this).parent().removeClass("checked");
    }
});




});
</script>
@endsection
