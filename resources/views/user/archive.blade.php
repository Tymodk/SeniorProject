@extends('layouts.app')

@section('content')

    <div class="container mt-3">
        <a href="{!! route('user.home') !!}">Terug gaan</a>
    </div>

    <div class="container mt-5">
        <h2>Mijn archief</h2>

        <table class="table table-hover">
            <tbody>
            @foreach($classes as $class)
                <tr>

                    <td>{{$class->course->name}} - {{$class->created_at}} </td>
                    <td><a href="{!! route('user.archiveDetail',['class'=> $class->id]) !!}"> Bekijk
                            statistieken </a></td>

                </tr>
            @endforeach

            </tbody>
        </table>

    </div>



@endsection
