@extends('layouts.app')

@section('content')


    <div class="container mt-3">
        <a href="{{route('user.index')}}">Terug gaan</a>
    </div>

    <div class="container">
        <h3>Wijzigen van <span style="border: 1px solid black"><strong>{{$class->course->name}}</strong></span> op

            <span style="border: 1px solid black"><strong>{{$class->start_time}}</strong></span></h3>

        <form action="{!! route('user.saveClass') !!}" method="post">

            @csrf
            <input type="hidden" name="classid" value="{{$class->id}}">
            <div class="form-group">

                <label for="start">Start</label>

                <input type="datetime-local" id="start" name="start" class="form-control" value="{{$class->start()}}">
            </div>

            <div class="form-group">

                <label for="end">Eind</label>

                <input type="datetime-local" id="end" name="end" class="form-control" value="{{$class->end()}}">
            </div>

            <button type="submit" class="btn btn-primary kdg"> Wijziging opslaan</button>
        </form>


    </div>

@endsection

