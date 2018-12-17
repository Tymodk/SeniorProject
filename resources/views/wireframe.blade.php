@extends('layouts.app')

@section('content')


    <div class="container-fluid justify-content-center text-center mt-5">
        <div class="row">
            <div class="col-md-4">
<<<<<<< HEAD
        <h2 class="text-center pt-3">Welcome {{ $user->name }}!</h2>
            </div>
            <div class="col-md-4">
            <h2 class="text-center"> <p><?php date_default_timezone_set("Europe/Brussels"); echo date("H:i"); ?></p>  <p>{{ date("d/m/Y") }}</p> </h2>
=======
                <h2 class="text-center pt-3">Welkom Sam!</h2>
            </div>
            <div class="col-md-4">
                <h2 class="text-center"><p>14:22 </p>
                    <p>17/12/2018</p></h2>
>>>>>>> aa3a444d10dff328c68e6d326cc4b24217caaa0a
            </div>
            <div class="col-md-4">
                <h2 class="pull-right  active">Volgende les start in 10 min.
                    <br><span><strong>Senior Project</strong></span></h2>
            </div>
        </div>
    </div>

    <div class="mt-5 mb-5">
        <h3 class=" m-5 "><strong>Vandaag</strong></h3>
        <div class="container-fluid m-0 pl-5 pr-5">
            <!-- start agenda -->
            <table class="table   text-center p-5">
                <thead></thead>
                <tbody>
                <tr>
                    <td><i class="fas fa-satellite-dish text-success"></i></td>
                    <td>
                        9u-10u
                    </td>

                    <td>Senior Project</td>
                    <td>A102 - IWT/PB-MT 3 WP a</td>
                    <td style="max-width: 15px"><a href="" class="btn btn-success active btn-block ">Bekijk
                            resultaten</a></td>
                </tr>
                <tr>
                    <td><i class="fas fa-satellite-dish" style="color: lightgray;"></i></td>
                    <td>
                        9u-10u
                    </td>

                    <td>Senior Project</td>
                    <td>A102 - IWT/PB-MT 3 WP a</td>
                    <td><a href="" class="btn btn-outline-success btn-block">Les starten</a></td>
                </tr>
                </tbody>
            </table>


        </div>

    </div>
    <div class="mt-5 mb-5">
        <h3 class=" m-5 "><strong>Morgen</strong></h3>
        <div class="container-fluid m-0 pl-5 pr-5">
            <!-- start agenda -->
            <table class="table   text-center p-5">
                <thead></thead>
                <tbody>
                <tr>
                    <td><i class="fas fa-satellite-dish" style="color: lightgray;"></i></td>
                    <td>
                        9u-10u
                    </td>

                    <td>Senior Project</td>
                    <td>A102 - IWT/PB-MT 3 WP a</td>
                    <td style="max-width: 15px"><a href="" class="btn btn-outline-light ">Les starten</a></td>
                </tr>
                <tr>
                    <td><i class="fas fa-satellite-dish" style="color: lightgray;"></i></td>
                    <td>
                        9u-10u
                    </td>

                    <td>Senior Project</td>
                    <td>A102 - IWT/PB-MT 3 WP a</td>
                    <td><a href="" class="btn btn-outline-light btn-block">Les starten</a></td>
                </tr>
                </tbody>
            </table>


        </div>
    </div>
@endsection
