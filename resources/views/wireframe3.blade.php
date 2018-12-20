@extends('layouts.app')

@section('content')

    <div class="container mt-3">
        <a href="">Terug gaan</a>
    </div>

    <div class="container mt-3">
        <div class="row">
            <div class="col-md-10">
                <h1> Web Research - <span class="text-success">Live</span></h1>
            </div>
            <div class="col-md-2">
                <a href="" class="btn btn-danger center-block delete" onclick="alert('bent u zeker?')">Stoppen <span class="deleteIcon"> <i class="fas fa-exclamation-circle pl-2 " ></i></span> </a>
            </div>
        </div>
    </div>
    <div class="container mt-5">
        <h3>
            <a class="btn btn-primary" data-toggle="collapse" href="#present" role="button"
               aria-expanded="false" aria-controls="collapseExample">
                Aanwezig ( 5 )
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
                    <tr>
                        <td>
                            Arthur Van Passel
                        </td>
                        <td>0123456789</td>
                        <td>14:38u</td>
                        <td><a href=""><i class="fas fa-times text-danger float-right"></i></a></td>
                    </tr>
                    <tr>
                        <td>
                            Maxim Ganses
                        </td>
                        <td>987456312</td>
                        <td>14:40u</td>
                        <td><a href=""><i class="fas fa-times text-danger float-right"></i></a></td>
                    </tr>
                    <tr>
                        <td>
                            Tymo de Kock
                        </td>
                        <td>54698731524</td>
                        <td>14:49u</td>
                        <td><a href=""><i class="fas fa-times text-danger float-right"></i></a></td>
                    </tr>
                    </tbody>
                </table>

            </div>
        </div>
        <h3 class="mt-5">
            <a class="btn btn-primary" data-toggle="collapse" href="#absent" role="button"
               aria-expanded="false" aria-controls="collapseExample">
                Nog niet gescand ( 17 )
            </a>
        </h3>

        <div class="collapse" id="absent">
            <div class="card card-body p-3">

                <table class="table table-borderless">

                    <tbody>
                    <tr>
                        <td>Niels van Nimmen <span class="float-right"><a href=""><i
                                        class="fas fa-plus text-success pr-2"></i></a><a
                                    href=""><i class="fas fa-ambulance text-danger"></i></a></span></td>
                    </tr>
                    </tbody>
                </table>

            </div>
        </div>

        <h3 class="mt-5">
            <a class="btn btn-primary" data-toggle="collapse" href="#ill" role="button"
               aria-expanded="false" aria-controls="collapseExample">
                Zieken ( 1 )
            </a>
        </h3>

        <div class="collapse" id="ill">
            <div class="card card-body p-3">

                <table class="table table-borderless">

                    <tbody>
                    <tr>
                        <td>Dieter Engels <i class="fas fa-ambulance text-danger">
                    </tr>
                    </tbody>
                </table>

            </div>
        </div>
    </div>
    </div>



@endsection
