@extends('layouts.app')

@section('content')

    <div class="container mt-3">
        <a href="">Terug gaan</a>
    </div>
    <div class="container mt-5">
        <h2><strong>{{$course->name}}</strong></h2>

        @if($total > 0)

            <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample"
                    aria-expanded="false" aria-controls="collapseExample">
                Klik voor algemene statistieken
            </button>
            <div class="collapse" id="collapseExample">
                <div class="col-md-9 mt-2">
                    <div class="row">
                        <div class="col-md-5 pt-3 pl-0">
                            <h4>Aanwezigheden over {{$total}} @if($total > 1)lessen @else les @endif</h4>

                            Totaal<span class="pull-right strong"></span>
                            <div class="progress">
                                <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="85"
                                     aria-valuemin="0" aria-valuemax="100" style="width:85%">85%
                                </div>
                            </div>

                            Gem. per les<span class="pull-right strong"></span>
                            <div class="progress">
                                <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="80"
                                     aria-valuemin="0" aria-valuemax="100" style="width:80%">80%
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <h4 class="mt-5 pb-2">Overzicht studenten</h4>


            @foreach($students as $student)


                <div class="row pt-2">
                    <div class="col-md-6">
                        <h5><strong>{{$student->student->name}}</strong></h5>
                    </div>
                    <div class="col-md-6">
                        @if(($student->countPresence($course->id) / $total * 100) == 0)
                            <p class="alert-danger p-1">Student is geen enkele keer aanwezig geweest</p>
                        @else
                        <span class="pull-right">{{$total}}   </span>

                        <div class="progress">

                                <div
                                    class="progress-bar @if(($student->countPresence($course->id) / $total * 100) == 0) bg-danger @else bg-success @endif"
                                    role="progressbar" aria-valuenow="4"
                                    aria-valuemin="0" aria-valuemax="100"
                                    style="width:{{$student->countPresence($course->id) / $total * 100}}%">{{$student->countPresence($course->id)}}
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach

        @else
            <p class="alert-danger p-2">Er zijn nog geen afwezigheden opgenomen</p>
        @endif
    </div>
    </div>



@endsection
