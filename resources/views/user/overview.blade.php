@extends('layouts.app')

@section('content')
    <div class="container mt-3">
        <a href="{!! route('user.index') !!}">Terug gaan</a>
    </div>
    <div class="container mt-3">
        <div class="row">
            <div class="col-md-10">

                <h1> {{$class->course->name}} - <span class="text-success">Live</span></h1>
            </div>
            <div class="col-md-2">

                <a href="{!! route('user.class.stop',['class'=>$class->id]) !!}"
                   class="btn btn-danger center-block delete" onclick="alert('bent u zeker om de les te stoppen?')">Stoppen
                    <span class="deleteIcon"> <i class="fas fa-exclamation-circle pl-2 "></i></span> </a>
            </div>
        </div>
    </div>
    <presence classid="{{json_encode($class->id)}}"></presence>

    <!-- :classid={{json_encode($class)}} -->
@endsection
