@extends('layouts.app')

@section('content')

    <div class="container mt-3">
        <a href="{!! route('user.home') !!}">Terug gaan</a>
    </div>

    <div class="container mt-5">
        <h2>Mijn lessen</h2>

        <table class="table table-hover">
            <tbody>
            @foreach($courses as $course)
                <tr>

                    <td>{{$course->name}} </td>
                    <td><a href="{!! route('user.statistics',['coursename'=> $course->slug]) !!}"> Bekijk
                            statistieken </a></td>

                </tr>
            @endforeach

            </tbody>
        </table>

    </div>



@endsection
