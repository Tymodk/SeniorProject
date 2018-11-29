@extends('layouts.app')

@section('content')
<div class="contianer mt-5">
    <h2>
        Student:
        <span class="text-info">
            <strong>
                {{ $student->name }}
            </strong>
        </span>
    </h2>
    <h3>
        Following courses:
    </h3>
    @if(isset($followed))	
@foreach($followed as $fol)


<div class="container p-2">
{{ $fol->name }}
<a href="" class="btn btn-danger float right">delete course</a>
</div>

@endforeach
@else
student has no courses yet
@endif
    <h3 class="pt-3">
        Add courses to student
    </h3>
    @if(isset($courses))


	{{ Form::open(array('url' => 'admin/test')) }}
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


	   {{ Form::submit('Submit!', array('class' => 'btn btn-success')) }}

{{ Form::close() }}
	@endif
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
