@extends('layouts.app')

@section('content')

    <div class="container mt-3">
        <a href="{{route('user.archive')}}">Terug gaan</a>
    </div>

    <div class="container mt-3">
        <div class="row">
            <div class="col-md-10">
                <h1> Web Research - <span class="text-success">{{$class->created_at}}</span></h1>
            </div>

        </div>
    </div>
    <div class="container mt-5">
        <h3>
            <a class="btn btn-primary" data-toggle="collapse" href="#present" role="button"
               aria-expanded="false" aria-controls="collapseExample">
                Aanwezig ( {{count($present)}} )
            </a>
        </h3>
        <div class="collapse show" id="present">
            <div class="card card-body p-3">

                <table class="table table-borderless ">
                    <thead>
                    <tr>
                        <td><strong>Naam </strong></td>
                        <td><strong> Studentennummer</strong></td>
                        <td><strong>Ingescanned om </strong></td>
                    </tr>

                    </thead>
                    <tbody>
                    @foreach($present as $student)
                    <tr>
                        <td>
                            {{$student->student->name}}
                        </td>
                        <td>{{$student->student->card_id}}</td>
                        <td>14:38u</td>
                        <td><a href=""><i class="fas fa-times text-danger float-right"></i></a></td>
                    </tr>
                        @endforeach

                    </tbody>
                </table>

            </div>
        </div>
        <h3 class="mt-5">
            <a class="btn btn-primary" data-toggle="collapse" href="#absent" role="button"
               aria-expanded="false" aria-controls="collapseExample">
                Nog niet gescand ( {{count($absent)}} )
            </a>
        </h3>

        <div class="collapse" id="absent">
            <div class="card card-body p-3">

                <table class="table table-borderless">

                    <tbody>
                    @foreach($absent as $student)
                    <tr>
                        <td>{{$student->student->name}} <span class="float-right"><a href=""><i
                                        class="fas fa-plus text-success pr-2"></i></a><a
                                    href=""><i class="fas fa-ambulance text-danger"></i></a></span></td>
                    </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>

        <h3 class="mt-5">
            <a class="btn btn-primary" data-toggle="collapse" href="#ill" role="button"
               aria-expanded="false" aria-controls="collapseExample">
                Zieken ( {{count($ill)}} )
            </a>
        </h3>

        <div class="collapse" id="ill">
            <div class="card card-body p-3">

                <table class="table table-borderless">

                    <tbody>
                    @foreach($ill as $student)
                    <tr>
                        <td>{{$student->student->name}} <i class="fas fa-ambulance text-danger"></i></td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>
    </div>



@endsection
